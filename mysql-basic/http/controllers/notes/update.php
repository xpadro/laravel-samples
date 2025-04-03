<?php

use core\Validator;
use core\App;
use core\Database;

$db = App::resolve(Database::class);
$errors = [];

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->fetch();

authorize($note['user_id'] === $currentUserId);

if (!Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = 'A body with no more than 10 characters is required';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
} else {
    $db->query("UPDATE notes set body = :body WHERE id = :id", [
        'body' => $_POST['body'],
        'id' => $note['id']
    ]);

    // Redirect to notes view
    header("location: /notes");
    die();
}