<?php

namespace database;

use mysqli;

require($_SERVER['DOCUMENT_ROOT'] . '/' . 'config/config.php');

class Connection {

    public $mysql;
    protected $sql;

    public function __construct()
    {
        $this->connect();
        $this->createUserTable();
        $this->insertUser('Administrador', 'admin@dentalup.com', password_hash('dentalup123', PASSWORD_DEFAULT));
    }

    public function connect()
    {
        $this->mysql = new mysqli(DB_HOST, DB_USER , DB_PASS, DB_NAME);
        if ($this->mysql->connect_error) {
            die("Connection failed: " . $this->mysql->connect_error);
        }
    }

    public function createUserTable()
    {
        // Attempt create table query execution
        $this->sql = "CREATE TABLE IF NOT EXISTS users(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL,
            `password` VARCHAR(30) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `is_active` BOOLEAN
        )";

        if(!mysqli_query($this->mysql, $this->sql)){
            die("ERROR: Could not able to execute $this->sql. ");
        }
    }

    public function insertUser($name, $email, $password) 
    {
        $sql = $this->mysql->prepare("INSERT IGNORE INTO users (`name`, `email`, `password`, `is_active`) VALUES (?,?,?,?)");
        $sql->bind_param($name, $email, $password, true);
        if( $sql->execute() == TRUE){
            return true ;
        } else {
            return false;
        }
    }
}