<?php

namespace App\Entity;

/**
 * Класс позиций товара в заказе
 */
class BasketPosition
{
    /**
     * товар
     * @var Product
     */
    private ?Product $product = null;

    /**
     * количество товара
     * @var int
     */
    private int $quantity = 0;

    public function __construct(Product $product, int $quantity)
    {
        $this->quantity = $quantity;
        $this->product = $product;
    }

    /**
     * возвращает наименование товара в этой позиции.
     * @return string
     */
    public function getProduct(): string
    {
        return $this->product->getName();
    }

    /**
     * возвращает стоимость позиции.
     * @return int
     */
    public function getPrice(): int
    {
        return $this->product->getPrice();
    }

    /**
     * возвращает количество товаров в этой позиции.
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}