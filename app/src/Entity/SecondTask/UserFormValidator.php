<?php

namespace App\Entity\SecondTask;

use App\Exceptions\UserException;

class UserFormValidator
{
    /**
     * @param array $data
     * @return bool
     * @throws UserException|\Exception
     */
    public function validate(array $data): bool
    {
        if (empty($data)) {
            throw new \Exception('Пустой массив данных');
        }
        if (!array_key_exists('name', $data) || empty($data['name'])) {
            throw new UserException('Поле Имя не может быть пустым');
        }
        if (mb_strlen($data['name']) < 2) {
            throw new UserException('Поле Имя должно содержать не менее 2х символов');
        }
        if (!array_key_exists('age', $data) || empty($data['age'])) {
            throw new UserException('Поле Возраст не может быть пустым');
        }
        if ((int)$data['age'] < 18) {
            throw new UserException('Значение в Поле Возраст не должно быть меньше 18');
        }
        if (!isset($data['email']) || empty($data['email'])) {
            throw new UserException('Поле Email не может быть пустым');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new UserException('Поле Email содержит не валидный email адрес');
        }

        return true;
    }
}