<?php

namespace App\Controllers;

use App\Entity\SecondTask\User;
use App\Exceptions\UserException;

class SecondTaskController extends BaseController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function render(): string
    {
        $errorMsg = '';
        $content = '<h1>Задание №2</h1><a href="/">Назад</a><br>';
        if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
            //try {
            $user = new User();
            try {
                $user->load((int)$_POST['id']);

                if ($user->getValidator()->validate($_POST)) {
                    if ($user->save($_POST)) {
                        return $this->getForm('', 'Форма успешно сохранена');
                    } else {
                        return $this->getForm('Ошибка сохранения формы');
                    }
                }
            } catch (UserException $exception) {
                return $this->getForm($exception->getMessage());
            }
        } else {
            $content .= $this->getForm();
        }
        return $content;
    }

    private function getForm(string $errorMsg = '', string $successMgs = ''): string
    {
        if ($successMgs !== '') {
            $_POST = [];
        }

        $content = '<h2>Введите данные пользователя</h2>';
        $content .= ($errorMsg ? '<div class="error">'.$errorMsg.'</div>': '');
        $content .= ($successMgs ? '<div class="success">'.$successMgs.'</div>': '');
        $content .= '<br/><form method="post">';
        $content .= '<p><label>ID: </label><input type="text" name="id" value="' . (!empty($_POST['id'])?$_POST['id']:'') .'"/></p>';
        $content .= '<p><label>Имя: </label><input type="text" name="name" value="' . (!empty($_POST['name'])?$_POST['name']:'') .'""/></p>';
        $content .= '<p><label>Возраст: </label><input type="text" name="age" value="' . (!empty($_POST['age'])?$_POST['age']:'').'""/></p>';
        $content .= '<p><label>Еmail: </label><input type="text" name="email" value="' . (!empty($_POST['email'])?$_POST['email']:'') .'""/></p>';
        $content .= '<p><input type="submit" value="Сохранить"/></p>';
        $content .= '</form>';

        return $content;
    }
}