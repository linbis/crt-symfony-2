<?php

namespace App\Controllers;

class DatabaseController extends BaseController
{
    /**
     * @var \PDO
     */
    private \PDO $conn;

    private array $tables = [
        'countries' => 'Страны',
        'cities' => 'Города',
        'animal_classes' => 'Классы животных',
        'animals' => 'Животные',
    ];
    /**
     * @return string
     * @throws \Exception
     */
    public function render(): string
    {
        $content = '<h1>Задание №3</h1><a href="/">Назад</a><br>';

        try {
            $this->conn = new \PDO(
                sprintf("mysql:host=mysql;port=3306;dbname=%s;charset=utf8", getenv('MYSQL_DATABASE')),
                getenv('MYSQL_USER'),
                getenv('MYSQL_PASSWORD'),
                [
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]
            );
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
            throw new \Exception('Нет соединения с БД');
        }

        foreach ($this->tables as $tableName => $descr) {
            $content .= '<h2>'.$descr.'</h2>' . $this->getData($tableName);
        }
        return $content;
    }

    /**
     * @param string $tableName
     * @return string
     */
    private function getData(string $tableName): string
    {
        $query = 'SELECT * FROM ' . $tableName;
        $rows = $this->conn->query($query);
        $content = '<table>';
        foreach ($rows as $row) {
            $content .= '<tr>';
            foreach ($row as $value) {
                $content .= '<td>'.$value .'</td>';
            }
            $content .= '</tr>';
        }

        return $content . '</table>';
    }
}