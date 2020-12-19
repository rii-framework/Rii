<?php namespace Rii\Core\Page;

    class Page
    {
        private static $instances = [];
        private $property = [];
        private $addList = [];
        private $macros = [];
        
        //Скрытие конструктора
        protected function __construct() { }
        
        //Скрытие клонирования
        protected function __clone() { }
        
        //Скрытие востановления  
        public function __wakeup() { }

        static function getInstance(): Page
        {
            $cls = static::class;

            if (!isset(self::$instances[$cls])) {
                self::$instances[$cls] = new static();
            }

            return self::$instances[$cls];
        }

        //Получение свойства по ключу
        public function getProperty(string $id): string
        {
            return $this->$property[$id];
        }

        //Добавление свойства для хранение по ключу
        public function setProperty($id, $value): void
        {
            $this->$property[$id] = $value;
        }

        //Выводит макрос для будущей замены #RII_PAGE_PROPERY_{$id}#
        public function showProperty($id): string
        {
            return "#RII_PAGE_PROPERY_{$id}#";
        }
        
        //Добавляет src в массив сохраняя уникальность
        static function addJs(string $path): void
        {
            $this->$addList[$path] = true;
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