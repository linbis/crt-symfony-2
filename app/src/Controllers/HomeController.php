<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function render(): string
    {
        $content = '<p><a href="/task1">Задание №1</a></p>';
        $content .= '<p><a href="/task2">Задание №2</a></p>';
        $content .= '<p><a href="/task3">Задание №3</a></p>';
        return $content;
    }
}