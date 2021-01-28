<?php

namespace Rii\Core\Mail;

class Template
{
    private $__path; // F:/OpenServer/domains/Rii/rii/mail/templates/default
    private $__pathTemp; // Путь к файлу шаблона - /template.html
    private $__pathSett; // Путь к файлу настроек - /settings.json
    private $__pathAtta; // Путь к папке с подключаемыми файлами - /attachments/

    private $id; //Имя шаблона
    private $fields; //Параметры
    private $macros = []; //Массив макросов
    private $result;

    public function __construct($id, $fields)
    {
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . "/rii/mail/templates/" . $id;

        if (!file_exists($this->__path)) {
            throw new \Exception("Папка с шаблоном не найдена!");
        }

        $this->__pathTemp = $this->__path . "/template.html";

        if (!file_exists($this->__pathTemp)) {
            throw new \Exception("Файл с шаблоном не найдена!");
        }

        $this->__pathSett = $this->__path . "/settings.json";

        if (!file_exists($this->__pathSett)) {
            throw new \Exception("Файла с настройками не найден!");
        }

        $this->__pathAtta = $this->__path . "/attachments/";

        $this->id = $id;
        $this->fields = $fields;
    }

    //Сборный метод
    public function render() {
        $this->setMacros();

        $this->result["sett"] = $this->getSettings();

        $this->getAttachFile();

        $this->result["mess"] = $this->getTemplate();

        return $this->result;
    }

    //Формирование массива макросов из параметров
    private function setMacros()
    {
        foreach ($this->fields as $key => $value) {
            $this->macros["#$key#"] = $value;
        }
    }

    //Получаем настройки и заменяем макросы
    private function getSettings()
    {
        return json_decode(str_replace(array_keys($this->macros), $this->macros, file_get_contents($this->__pathSett)), true)[0];
    }

    //Если есть файлы для подключения к шаблопу, то записываем в result["file"]
    private function getAttachFile()
    {
        if (file_exists($this->__pathAtta) && (count($fileAtta = scandir($this->__pathAtta)) > 2)) {
            foreach ($fileAtta as $key => $nameFile) {
                if ($nameFile != "." && $nameFile != "..") {
                    $this->result["file"][] = $this->__pathAtta . $nameFile;
                }
            }
        }
    }

    //Подключение шаблона
    private function getTemplate()
    {
        return str_replace(array_keys($this->macros), $this->macros, file_get_contents($this->__pathTemp));
    }
}