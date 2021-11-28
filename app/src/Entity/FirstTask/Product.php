<?php

namespace App\Entity\FirstTask;

/**
 * Класс товар
 */
class Product
{
    /**
     * название товара
     * @var string
     */
    private string $name;

    /**
     * цена товара
     * @var int
     */
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}