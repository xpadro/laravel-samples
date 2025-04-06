<?php

namespace http\forms;

use core\ValidationException;
use core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes) {

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please enter a valid email address';
        }

        if (!Validator::string($attributes['password'], 3, 255)) {
            $this->errors['password'] = 'Please enter a valid password';
        }
    }

    public static function validate($attributes) {
        $instance = new static($attributes);

        if ($instance->hasErrors()) {
            $instance->throw();
        }

        return $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function hasErrors() {
        return count($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($field, $message) {
        $this->errors[$field] = $message;
        return $this;
    }
}