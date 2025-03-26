<?php

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/
require BASE_PATH . 'functions.php';

// Loads requested classes that have not yet been explicitly required (e.g. Database or Validator)
spl_autoload_register(function ($class) {
    require basePath($class . '.php');
});

require basePath('router.php');