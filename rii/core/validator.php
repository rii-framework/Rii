<?php

namespace Rii\Core;

class Validator
{
    private $type = '';
    private $set = null;
    private $validation = null;
    private $value = null;

    function __construct($function, $param = null, $validation = null)
    {
        $this->type = $function;
        $this->set = $param;
        $this->validation = $validation;
    }

    function exec($value)
    {
        $this->value = $value;
        $validator = $this->type;
        return $this->$validator($value);
    }

    function required()
    {
        $ret = true;

        if ($this->set === true && $this->value == null) {
            $ret = false;
        }

        if ($this->value != null) {
            foreach ($this->validation as $rule) {
                if (!$rule->exec($this->value)) {
                    $ret = false;
                    break;
                }
            }
        }

        return $ret;
    }

    function minLength()
    {
        return strlen($this->value) > $this->set;
    }

    function maxLength()
    {
        return strlen($this->value) < $this->set;
    }

    function email()
    {
        $this->set = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';
        return $this->regexp();
    }

    function phone()
    {
        $this->set = '/^\+?([0-9]{1,3})-?([0-9]{2})-?([0-9]{7})$/';
        return $this->regexp();
    }

    function regexp()
    {
        return (bool)preg_match($this->set, $this->value);
    }
}