<?php

use core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);
$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the note from the DB
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->fetch();

    authorize($note['user_id'] === $currentUserId);

    // Delete note
    $db->query('delete from notes where id = :id', ['id' => $_GET['id']]);

    // Redirect to notes list
    header('Location: /notes');
    exit();
} else {
    $id = $_GET['id'];
    $note = $db->query('select * from notes where id = :id', ['id' => $id])->fetch();

    view('notes/show.view.php', [
        'heading' => 'Note Detail',
        'note' => $note
    ]);
}

