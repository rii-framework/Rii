<?php

namespace Rii\Core\Validator;

class Validator
{
    private $type = '';
    private $set = null;

    function __construct($function, $param)
    {
        $this->type = $function;
        $this->set = $param;
    }

    function exec($value)
    {
        $validator = $this->type;
        return $this->$validator($value);
    }

    function minLength($value)
    {
        return strlen($value) > $this->set;
    }

    function maxLength($value)
    {
        return strlen($value) < $this->set;
    }

    function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    function required($value)
    {
        if ($this->set === true) {
            if ($value == null) {
                return false;
            } else {
                return true;
            }
        } else return true;
    }

    function regexp($value)
    {
        if (!preg_match($this->set, $value)) {
            return false;
        } else {
            return true;
        }
    }

    function compare($value)
    {
        return $value == $this->set;
    }
}