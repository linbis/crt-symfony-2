<?php

namespace App\Entity;

/**
 * Класс заказ
 */
class Order
{
    /**
     * корзина
     * @var Basket|null
     */
    private ?Basket $basket = null;

    /**
     * цена доставки
     * @var int
     */
    private int $deliveryPrice = 0;

    public function __construct(Basket $basket, $deliveryPrice = 0)
    {
        $this->basket = $basket;
        $this->deliveryPrice = $deliveryPrice;
    }

    /**
     * возвращает объект-корзину, которая хранится в заказе.
     * @return Basket
     */
    public function getBasket(): Basket
    {
        return $this->basket;
    }

    /**
     * возвращает стоимость доставки
     * @return int
     */
    public function getDeliveryPrice(): int
    {
        return $this->deliveryPrice;
    }

    /**
     * возвращает общую стоимость заказа. Сумма стоимости корзины и стоимости доставки заказа.
     * @return int
     */
    public function getPrice(): int
    {
        return $this->getDeliveryPrice() +
            $this->getBasket()->getPrice();
    }
}