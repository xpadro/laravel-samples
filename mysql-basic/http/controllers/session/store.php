<?php

use core\App;
use core\Database;
use http\forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (! $form->validate($email, $password)) {
    view('session/create.view.php', [
        'errors' => $form->getErrors()
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
