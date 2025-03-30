<?php

use core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);
$currentUserId = 1;

$id = $_GET['id'];
$note = $db->query('select * from notes where id = :id', ['id' => $id])->fetch();

view('notes/show.view.php', [
    'heading' => 'Note Detail',
    'note' => $note
]);

