<?php

use core\App;
use core\Authenticator;
use core\Database;
use core\Validator;

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
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->fetch();

if ($user) {
    // User already exists. Redirect to login page
    redirect('/login');
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    new Authenticator()->login([
        'email' => $email
    ]);

    redirect('/');
}