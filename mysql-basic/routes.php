<?php

$router->get('/', 'controllers/index.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/note', 'controllers/notes/show.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->delete('/note', 'controllers/notes/destroy.php');

// Registration
$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');