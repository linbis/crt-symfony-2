<?php

namespace App;

use App\Exceptions\HttpException;

class Router
{
    private array $routes = [
        '/'      => 'Home',
        '/task1' => 'FirstTask',
        '/task2' => 'SecondTask',
        '/task3' => 'Database'
    ];

    /**
     * @return object
     * @throws HttpException
     * @throws \ReflectionException
     */
    public function getController(): object
    {
        foreach ($this->routes as $path => $className) {
            if ($path === (string)$_SERVER['REQUEST_URI']) {
               return (new \ReflectionClass('\\App\\Controllers\\'. $className . 'Controller'))
                   ->newInstance();
            }
        }

        throw new HttpException(404);
    }

}