<?php

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/

require BASE_PATH . 'functions.php';
require basePath('Database.php');
$config = require basePath('config.php');

require basePath('router.php');