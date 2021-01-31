<?php

namespace Rii\Core\Validator;

class Validator
{
    private $type = '';
    private $set = null;
    private $valid = null;

    function __construct($function, $param = null, $valid = null)
    {
        $this->type = $function;
        $this->set = $param;
        $this->valid = $valid;
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
        $this->set = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';
        return self::regexp($value);
    }

    function phone($value)
    {
        $this->set = '/^\+?([0-9]{1,3})-?([0-9]{2})-?([0-9]{7})$/';
        return self::regexp($value);
    }

    function regexp($value)
    {
        return (bool)preg_match($this->set, $value);
    }

    function required($value)
    {
//        var_dump($this->valid);
        if ($value == null) {
            if ($this->set === true) {
                return false;
            } else return true;
        } else {
            foreach ($this->valid as $rule) {
                if ($rule == false) {
                    return false;
                } else return true;
            }
        }
    }
}