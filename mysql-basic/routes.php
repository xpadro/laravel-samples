<?php

$router->get('/', 'http/controllers/index.php');

$router->get('/notes', 'http/controllers/notes/index.php')->only('auth');
$router->get('/notes/create', 'http/controllers/notes/create.php');
$router->get('/notes/edit', 'http/controllers/notes/edit.php');
$router->post('/notes', 'http/controllers/notes/store.php');

$router->get('/note', 'http/controllers/notes/show.php');
$router->patch('/note', 'http/controllers/notes/update.php');

$router->delete('/note', 'http/controllers/notes/destroy.php');

// Registration
$router->get('/register', 'http/controllers/registration/create.php')->only('guest');
$router->post('/register', 'http/controllers/registration/store.php')->only('guest');

// Session
$router->get('/login', 'http/controllers/session/create.php')->only('guest');

$router->post('/sessions', 'http/controllers/session/store.php')->only('guest');
$router->delete('/sessions', 'http/controllers/session/destroy.php')->only('auth');