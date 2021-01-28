<?php

namespace Rii\Core\Mail;

class Template
{
    private $__path = ""; // абсолютный путь к шаблону письма
    private $__pathTemp = ""; // Путь к файлу шаблона - /template.html
    private $__pathSett = ""; // Путь к файлу настроек - /settings.json
    private $__pathAtta = ""; // Путь к папке с подключаемыми файлами - /attachments/

    private $id = ""; //Имя шаблона
    private $fields; //Поля
    
    private $macros = []; //Массив макросов
    private $settings = []; //Настройки
    private $pathFiles = []; //Массив путей подключаемых файлов шаблона
    private $message = ""; //Шаблон письма

    public function __construct($id, $fields = [])
    {
        $this->__path = $_SERVER['DOCUMENT_ROOT'] . "/rii/mail/templates/" . $id;

        if (!file_exists($this->__path)) {
            throw new \Exception("Папка с шаблоном не найдена!");
        }

        $this->__pathTemp = $this->__path . "/template.html";

        if (!file_exists($this->__pathTemp)) {
            throw new \Exception("Файл с шаблоном не найден!");
        }

        $this->__pathSett = $this->__path . "/settings.json";

        if (!file_exists($this->__pathSett)) {
            throw new \Exception("Файл с настройками не найден!");
        }

        $this->__pathAtta = $this->__path . "/attachments/";

        $this->id = $id;
        $this->fields = $fields;

        $this->init();
    }

    //Инициализация свойств
    private function init()
    {
        $this->setMacros();

        $this->setSettings();

        $this->setAttachFile();

        $this->setTemplate();
    }

    //Формирование массива макросов из параметров
    private function setMacros()
    {
        if (!empty($this->fields)) {
            foreach ($this->fields as $key => $value) {
                $this->macros["#$key#"] = $value;
            }
        }
    }

    //Формирование настроек шаблона письма
    private function setSettings()
    {
        $jsonSettings = file_get_contents($this->__pathSett);

        if (!empty($this->macros)) {
            $jsonSettings = str_replace(array_keys($this->macros), $this->macros, $jsonSettings);
        }

        $this->settings = json_decode($jsonSettings, true)[0];
    }

    //Получение настроек шаблона письма
    public function getSettings()
    {
        return $this->settings;
    }

    //Формирование путей подключаемых файлов в шаблоне письма
    private function setAttachFile()
    {
        $attachFiles = [];

        if (file_exists($this->__pathAtta) && (count($fileAtta = scandir($this->__pathAtta)) > 2)) {
            foreach ($fileAtta as $key => $nameFile) {
                if ($nameFile != "." && $nameFile != "..") {
                    $attachFiles[] = $this->__pathAtta . $nameFile;
                }
            }
        }

        $this->pathFiles = $attachFiles;
    }

    //Получение путей подключаемых файлов в шаблоне письма
    public function getAttachFile()
    {
        return $this->pathFiles;
    }

    //Формирование шаблона письма
    private function setTemplate()
    {
        $template = file_get_contents($this->__pathTemp);

        if (!empty($this->macros)) {
            $template = str_replace(array_keys($this->macros), $this->macros, $template);
        }

        $this->message = $template;
    }

    //Получение шаблона письма
    public function getTemplate()
    {
        return $this->message;
    }
}