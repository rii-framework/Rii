<?php namespace Rii\Core\Config;

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

    public static function get(string $requestData)
    {
        self::init();
        $requestKey = explode("/", $requestData);
        $searchData = self::$data;

        for ($i = 0; $i < count($requestKey); $i++) {
            if (array_key_exists($requestKey[$i], $searchData)) {
                if (is_array($searchData[$requestKey[$i]])) {
                    $result = $searchData = $searchData[$requestKey[$i]];
                } else {
                    $result = $searchData[$requestKey[$i]];
                    break;
                }
            }
        }
        return $result;
    }
}