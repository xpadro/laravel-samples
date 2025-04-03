<?php

use core\Validator;
use core\App;
use core\Database;

$db = App::resolve(Database::class);
$errors = [];

if (!Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = 'A body with no more than 10 characters is required';
}

if (!empty($errors)) {
    view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
} else {
    $db->query('INSERT INTO notes (body, user_id) VALUES ( :body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);

    // Redirect to notes view
    header("location: /notes");
    die();
}