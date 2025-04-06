<?php

use core\Authenticator;
use http\forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = LoginForm::validate($attributes = [
    'email' => $email,
    'password' => $password,
]);

$authenticated = new Authenticator()->authenticate($attributes['email'], $attributes['password']);

if (!$authenticated) {
    $form->addError('email', 'No matching user found')->throw();
}

redirect('/');
