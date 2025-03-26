<?php

require __DIR__ . '/../../Validator.php';

$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!Validator::string($_POST['body'], 1, 10)) {
        $errors['body'] = 'A body with no more than 10 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES ( :body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);