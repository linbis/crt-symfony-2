<?php

namespace App\Controllers;

use App\Entity\FirstTask\{
    Basket, Product, Order
};

class FirstTaskController extends BaseController
{
    public function render(): string
    {
        $basket = new Basket();
        $basket->addProduct(new Product('Яйцо киндер', 6000), 3);
        $basket->addProduct(new Product('Карамель Chupa Chups', 800), 10);
        $basket->addProduct(new Product('Шоколад Алёнка', 1900), 4);
        $basket->addProduct(new Product('PПирожное Конти Tim', 1800), 2);
        $basket->addProduct(new Product('Шоколадный батончик Snickers ', 5199), 1);

        $order = new Order($basket, 12000);

        $content = '<h1>Задание №1</h1><a href="/">Назад</a><br>';
        $content .= '<h2>Заказ № 1</h2><p>Состав заказа: <br><br>';
        foreach ($order->getBasket()->describe() as $itemHtml) {
            $content .= $itemHtml . '<br>';
        }
        $content .= '</p>';

        $content .= '<p>Стоимость заказа - <b>'. $order->getBasket()->getPrice() / 100 . ' ед.</b></p>';
        $content .= '<p>Стоимость доставки - <b>'. $order->getDeliveryPrice() / 100 . ' ед.</b></p>';
        $content .= '<p>Итого - <b>'. $order->getPrice() / 100 . ' ед.</b></p>';
        return $content;
    }
}