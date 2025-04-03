<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$currentUserId = 1;

$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->fetch();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);