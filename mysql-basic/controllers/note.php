<?php

$db = new Database($config['database']);

$id = $_GET['id'];

dd($id);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();


$heading = 'Note Detail';
require 'views/note.view.php';