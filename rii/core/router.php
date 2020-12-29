<?php

namespace Rii\Core\Config;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'rii/router.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function name()
    {
        echo "Work!";
    }
}