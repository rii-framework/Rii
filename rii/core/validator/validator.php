<?php

namespace Rii\Core\Validator;

class Validator
{
    private $errors = [];

    public function validate($source, $item){


        return $this->errors;
    }

    private function addError($error)
    {
        $this->errors[] = $error;
    }
}