<?php

use core\Authenticator;
use core\Session;
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

// PRG (Post Redirect Get)
Session::flash('errors', $form->getErrors());
redirect('/login');
