<?php

// $host = '127.0.0.1';
// $db   = 'weathertest';
// $user = 'root';
// $pass = '';
// $charset = 'utf8';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $opt = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];

// //$dbh = new PDO($dsn, $user, $password, $opt);

// try {
//     $dbh = new PDO($dsn, $user, $password);
// } catch (PDOException $e) {
//     die('Подключение не удалось: ' . $e->getMessage());
// }

class Database {

    private $link;

    public function __construct() {
        $this->conect();
    }

    private function conect() {

        $config = require_once('config.php');

        $dsn = "mysql:host=".$config['host'].";dbname=".$config['db_name'].";charset=".$config['charset']."";

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    public function execute($sql) {

        $stg = $this->link->prepare($sql);

        return $stg->execute();
    }

    public function query($sql) {

        
        
        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       
        if($result == false) {
            return [];
        }

        return $result;       

    }

}

try {
    $db = new Database();
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}





?>