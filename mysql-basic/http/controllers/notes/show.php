<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);
$currentUserId = 1;

$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', ['id' => $id])->fetch();

view('notes/show.view.php', [
    'heading' => 'Note Detail',
    'note' => $note
]);

