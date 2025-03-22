<?php

class Database {
    public $connection;

    public function __construct($config, $username = 'root', $password = '') {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->connection = new PDO($dsn, $username, $password, $options);
    }

    public function query($query, $params = []) {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        
        return $statement;
    }
}