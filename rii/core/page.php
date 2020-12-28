<?php namespace Rii\Core\Page;

    final class Page
    {
        private static $instance = null; //Поле для хранения экземпляра класса
        private $property = []; //Массив свойств
        private $scripts = []; //Массив скриптов
        private $links = []; //Массив стилей
        private $strings = []; //Массив строк
        
        //Скрытие конструктора
        private function __construct() { }
        
        //Скрытие клонирования
        private function __clone() { }
        
        //Скрытие востановления  
        private function __wakeup() { }

        //Пользовательский конструктор (singleton)
        static function getInstance(): Page
        {
            if (is_null(self::$instance)) {
                self::$instance = new static();
            }

            return self::$instance;
        }

        //Добавление свойства для хранение по ключу
        public function setProperty($key, $value): void
        {
            $this->property[$key] = $value;
        }

        //Получение свойства по ключу
        public function getProperty($key)
        {
            return $this->property[$key];
        }

        //Вывод макрос для будущей замены #RII_PAGE_PROPERY_{$key}#
        public function showProperty($key): void
        {
            if (is_null($this->getProperty($key))) {
                $this->setProperty($key, "");
            }

            echo $this->getMacro("PROPERY_{$key}");
        }

        //Добавление src в массив сохраняя уникальность
        public function addJs(string $src): void
        {
            $this->scripts[$src] = "<script src=\"{$src}\"></script>";
        }

        //Вывод макрос для будущей замены js #RII_PAGE_JS#
        public function showJs(): void
        {
            echo $this->getMacro("JS");
        }

        //Добавление link сохраняя уникальность
        public function addCss(string $href): void
        {
            $this->links[$href] = "<link href=\"{$href}\" rel=\"stylesheet\">";
        }

        //Вывод макрос для будущей замены css #RII_PAGE_CSS#
        public function showCss(): void
        {
            echo $this->getMacro("CSS");
        }

        //Добавление text в массив
        public function addString(string $text): void
        {
            $this->strings[] = $text;
        }

        //Вывод макрос для будущей замены string #RII_PAGE_STR#
        public function showStrings(): void
        {
            echo $this->getMacro("STR");
        }

        //Формирование макроса для будущей замены #RII_PAGE_{$param}#
        private function getMacro($param): string
        {
            return "#RII_PAGE_{$param}#";
        }

        {
        }

        {
    }

?>