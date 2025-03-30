<?php

use core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);
$currentUserId = 1;

// Get the note from the DB
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->fetch();

authorize($note['user_id'] === $currentUserId);

// Delete note
$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

// Redirect to notes list
header('Location: /notes');
exit();