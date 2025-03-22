<?php

require 'Database.php';

$config = require 'config.php';

$database = new Database($config['database']);
$posts = $database->query("select * from posts")->fetchAll();

$heading = 'Home';
require 'views/index.view.php';