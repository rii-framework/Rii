<?php

namespace Rii\Core\Config;

class Config
{
    private static $data = [];

    protected function __construct() {}

    private static function init()
    {
        if (empty(self::$data)) {
            self::$data = include_once($_SERVER['DOCUMENT_ROOT'] . "/rii" . "/config.php");
        }
    }

    public static function get(string $path)
    {
        self::init();

        $config = self::$data;

        foreach (explode('/', $path) as $key) {
            $config = $config[$key];
        }
        return $config;
    }
}