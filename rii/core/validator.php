<?php

namespace Rii\Core;

class Validator
{
    private $type = '';
    private $set = null;
    private $value = null;
    const MAY_BE_EMPTY = 'Input_Value_Can_Be_Empty';

    function __construct($function, $param = null)
    {
        $this->type = $function;
        $this->set = $param;
    }

    function exec($value)
    {
        $this->value = $value;
        $validator = $this->type;
        return $this->$validator();
    }

    function chain()
    {
        $result = true;
        foreach ($this->set as $rule) {
            if ($rule == self::MAY_BE_EMPTY) {
                if ($this->value == null || $this->value == '') {
                    return true;
                }
                continue;
            }
            if ($rule->exec($this->value) == false || $this->value == null) {
                $result = false;
                break;
            }
        }
        return $result;
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

    function between()
    {
        if ($this->value < $this->set['under'] && $this->value > $this->set['upper']) {
            return false;
        } else return true;
    }

    function in()
    {
        echo '<pre>';
        var_dump($this->value);
        echo '</pre>';
        $result = false;
        foreach ($this->set as $value){
            if ($this->value == $value){
                return true;
            }
        }
        return $result;
    }
}