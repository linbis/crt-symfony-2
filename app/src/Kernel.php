<?php

namespace App;

class Kernel
{
    /**
     * @var $_instance ?Kernel
     */
    protected static ?Kernel $_instance = null;

    /**
     * @var $router ?Router
     */
    private ?Router $router = null;

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

    public function setRouter($router): void
    {
        $this->router = $router;
    }

    public function getRouter(): ?Router
    {
        return $this->router;
    }

    public function run()
    {
        $this->init();
        echo $this->render();
    }

    private function init()
    {
        $this->setRouter(new Router());
    }

    /**
     * @return mixed
     * @throws Exceptions\HttpException
     * @throws \ReflectionException
     */
    private function render(): mixed
    {
        $content = file_get_contents(\dirname(__DIR__) . '/templates/view/header.html');
        $content .= $this->getRouter()
            ->getController()
            ->render();
        $content .= file_get_contents(\dirname(__DIR__) . '/templates/view/footer.html');

        return $content;
    }
}