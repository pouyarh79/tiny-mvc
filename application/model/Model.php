<?php

namespace Application\Model;

use PDO;
use PDOException;

class Model{
    protected $connection;

    public function __construct() {
        if(!isset($connection)){
            global $dbHost, $dbName, $dbUsername, $dbPassword;
            $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            try {
                $this->connection = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUsername, $dbPassword, $options);
            } catch (PDOException $e) {
                echo "there is some problem with connection" . $e->getMessage();
            }
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    protected function query($sql, $values = null){
        try {
            if($values == null) {
                return $this->connection->query($sql);
            }else{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($values);
                return $stmt;
            }
        } catch (PDOException $e) {
            echo "there is some problem with connection" . $e->getMessage();
        }
    }

    protected function execute($sql, $values = null) {
        try {
            if($values == null){
                $this->connection->query($sql);
            }else{
                $stmt = $this->connection->prepare($sql);
                $stmt->execute($values);
            }
            return true;
        } catch (PDOException $e) {
            echo "there is some problem with connection" . $e->getMessage();
        }
    }

    protected function closeConnection(){
        $this->connection = null;
    }
}