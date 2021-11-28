<?php

namespace App\Entity\FirstTask;

/**
 * Класс корзины
 */
class Basket implements \Countable
{
    /**
     * @var array
     */
    private array $items = [];

    public function addProduct(Product $product, $quantity)
    {
        $this->items[] = new BasketPosition($product, $quantity);
    }

    /**
     * возвращает стоимость всех позиций в корзине.
     * @return int
     */
    public function getPrice(): int
    {
        $price = 0;
        if ($this->count() > 0) {
            array_map(function(BasketPosition $item) use (&$price) {
                $price += $item->getPrice() * $item->getQuantity();
            }, $this->items);
        }
        return $price;
    }

    /**
     * выводит или возвращает информацию о корзине в виде строки:
     */
    public function describe()
    {
        if ($this->count() > 0) {
            return array_map(function(BasketPosition $item) {
                return $item->getProduct() . ' - '
                    . number_format($item->getPrice()/100, 2, '.', '') . ' - '
                    . $item->getQuantity();
            }, $this->items);
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }
}