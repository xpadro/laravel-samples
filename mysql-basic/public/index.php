<?php

const BASE_PATH = __DIR__ . '/../'; // Set the root path of the app to mysql-basic/
require BASE_PATH . 'core/functions.php';

// Loads requested classes that have not yet been explicitly required (e.g. Database or Validator)
spl_autoload_register(function ($class) {
    // Example of $class as input param: core\Database
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$result}.php");
});

require basePath('core/router.php');