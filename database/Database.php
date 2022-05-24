<?php

namespace database;

use PDO;
use PDOException;

class Database {
    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPass = 'M4tr1x123';
    private $dbName = 'web_servidor';

    /**
     * query builder
     * @var object
     */
    private $statement;

    /**
     * Instancia a conexão com banco de dados
     * @var PDO
     */
    private $dbHandler;

    private $error;

    public function __construct() 
    {
        $this->connect();
        $this->createUsersTable();
        $this->createClientsTable();
        $this->createClientsTable();
        $this->createDentistsTable();
        $this->creatAppointmentTable();

    }

    private function connect() 
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    private function createUsersTable()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS users(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(30) NOT NULL,
            `password` VARCHAR(30) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `is_active` BOOLEAN
        )";

        try {
            $this->dbHandler->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage(); //Remove or change message in production code
        }
    }

    private function createClientsTable()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS clients(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(80) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `cpf` VARCHAR(14) NOT NULL,
            `phone` VARCHAR(14),
            `is_active` BOOLEAN
        )";

        try {
            $this->dbHandler->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage(); //Remove or change message in production code
        }
    }

    private function createDentistsTable()
    {
        $sql =  "CREATE TABLE IF NOT EXISTS dentists(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` VARCHAR(80) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `cpf` VARCHAR(14) NOT NULL,
            `phone` VARCHAR(14),
            `is_active` BOOLEAN
        )";

        try {
            $this->dbHandler->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage(); //Remove or change message in production code
        }
    }

    public function creatAppointmentTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS appointments(
            `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `appointment_date` TIMESTAMP NOT NULL,
            `appointment_reason` VARCHAR(250) NOT NULL,
            `user_id` INTEGER NOT NULL,
            `client_id` INTEGER NOT NULL,
            `dentist_id` INTEGER NOT NULL,
            `created_at` TIMESTAMP NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
            FOREIGN KEY (dentist_id) REFERENCES dentists(id) ON DELETE CASCADE
        )";

        try {
            $this->dbHandler->exec($sql);
        } catch(PDOException $e) {
            echo $e->getMessage(); //Remove or change message in production code
        }
    }

    //Allows us to write queries
    public function query($sql) 
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Bind values
    public function bind($parameter, $value, $type = null) 
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    //Execute the prepared statement
    public function execute() 
    {
        return $this->statement->execute();
    }

    //Return an array
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Return a specific row as an object
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //Get's the row count
    public function rowCount() {
        return $this->statement->rowCount();
    }
}