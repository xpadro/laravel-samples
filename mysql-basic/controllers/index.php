<?php

require 'Database.php';

$config = require 'config.php';

$database = new Database($config['database']);

$query = "select * from posts where id = :id";
$id = $_GET['id']; // get 'id' param in query string from request

$posts = $database->query($query, ['id' => $id])->fetchAll();

// This one allows for SQL injection
// $posts = $database->query("select * from posts where id = {$id}")->fetchAll();

$heading = 'Home';
require 'views/index.view.php';