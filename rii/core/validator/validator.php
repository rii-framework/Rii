<?php

namespace Rii\Core\Validator;

class Validator
{
    public array $requiredRules = [
        'name' => [
            'type' => 'text',
            'value' => '',
            'empty' => 'n',
        ],
        'lastName' => [
            'type' => 'text',
            'value' => '',
            'empty' => 'y',
        ],
        'login' => [
            'type' => 'text',
            'value' => '',
            'empty' => 'n',
        ],
        'email' => [
            'type' => 'email',
            'value' => '',
            'empty' => 'n',
        ],
        'password' => [
            'type' => 'password',
            'value' => '',
            'empty' => 'n',
        ],
        'phone' => [
            'type' => 'text',
            'value' => '',
            'empty' => 'y',
        ],
    ];

    public function validation($inputs)
    {
        $this->requiredRules;
    }
}