<?php

use core\Authenticator;
use http\forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if (new Authenticator()->authenticate($email, $password)) {
        redirect('/');
    }

    $form->addError('email', 'No matching user found');
}

view('session/create.view.php', [
    'errors' => $form->getErrors()
]);