<?php

namespace App;

class Kernel
{
    /**
     * @var $_instance ?Kernel
     */
    protected static $_instance;

    /**
     * Запрет на создание объекта через оператор new.
     */
    protected function __construct()
    {
    }
    /**
     * Запрет на клонирование
     */
    protected function __clone()
    {
    }

    /**
     * Запрет на восстанавление из строк.
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * @return Kernel
     */
    public static function getInstance(): Kernel
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function run()
    {

    }
}