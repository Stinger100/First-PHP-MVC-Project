<?php

namespace App\Database;

use mysqli;

class Database
{
    /**
     * @var mysqli|bool
     */
    private $database;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->database = mysqli_connect('localhost','root','','boozt');
    }

    /**
     * @return mysqli
     */
    public function getDatabase(): mysqli
    {
        return $this->database;
    }

    /**
     * @param string $query
     * @return array
     */
    public function raw(string $query): array
    {
        $result = mysqli_query($this->database, $query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * @var int $id
     * @var string $model
     * @return mixed
     */
    public function getEntity(int $id, string $model)
    {
        $data = $this->raw('');

        return (new $model())->convertEntity($data);
    }
}