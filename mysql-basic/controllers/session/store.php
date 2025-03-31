<?php

use core\App;
use core\Database;
use core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 3, 255)) {
    $errors['password'] = 'Please enter a valid password';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('Location: /');
        exit();
    }

    $errors['password'] = 'Please enter a valid password';
} else {
    $errors['email'] = 'No matching user found';
}

view('session/create.view.php', [
    'errors' => $errors
]);
