<?php

namespace App\Entity\SecondTask;

use App\Exceptions\UserException;

class User
{
    /**
     * @var int $id Ид-р пользователя
     */
    private int $id;
    /**
     * @var string $name Имя пользователя
     */
    private string $name;
    /**
     * @var int $age Возраст
     */
    private int $age = 0;
    /**
     * @var string $email Email адрес пользователя
     */
    private string $email;

    /**
     * @var UserFormValidator $validator
     */
    private UserFormValidator $validator;

    public function __construct()
    {
        $this->validator = new UserFormValidator();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @param $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return UserFormValidator
     */
    public function getValidator(): UserFormValidator
    {
        return $this->validator;
    }
    /**
     * @param int $id Ид-р пользователя
     * @throws UserException
     */
    public function load(int $id)
    {
        $rand = rand(1, 10);
        if ($rand % 2 === 0) {
            throw new UserException('Пользователь не найден в базе данных');
        }
    }

    /**
     * метод имитирует сохранение пользователя в базе данных и возвращает true, если сохранение прошло
     * успешно, или false, если произошла ошибка. Для имитации работы метод
     * должен возвращать случайное значение true или false.
     * @param array $data
     * @return bool
     */
    public function save(array $data): bool
    {
        $rand = rand(0, 1);
        return ($rand % 2 === 0);
    }
}