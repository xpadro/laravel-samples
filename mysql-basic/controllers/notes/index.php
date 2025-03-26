<?php

$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();


$heading = 'Notes';
require 'views/notes/index.view.php';