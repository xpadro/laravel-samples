<?php

$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();

view('notes/index.view.php', [
    'heading' => 'Notes',
    'notes' => $notes
]);