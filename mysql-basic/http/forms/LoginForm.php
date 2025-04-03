<?php

namespace http\forms;

use core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password) {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please enter a valid email address';
        }

        if (!Validator::string($password, 3, 255)) {
            $this->errors['password'] = 'Please enter a valid password';
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}