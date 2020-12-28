<?php namespace Rii\Core\Page;

    final class Page
    {
        private static $instance = null; //Поле для хранения экземпляра класса
        private $property = []; //Массив свойств
        
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

        {
        }
        
        //Добавляет src в массив сохраняя уникальность
        static function addJs(string $path): void
        //Формирование макроса для будущей замены #RII_PAGE_{$param}#
        private function getMacro($param): string
        {
            return "#RII_PAGE_{$param}#";
        }

        //Добавляет link сохраняя уникальность
        static function addCss(string $path): void
        {
            $this->$addList[$path] = true;
        }

        //Добавляет в массив для хранения
        /*static function addString(string $path): void
        {
            
        }*/
    }

?>