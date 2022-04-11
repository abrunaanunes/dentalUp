<?php

namespace app\Models;

use database\Connection;

class User
{
    private $name;
    private $username;
    private $password;
    private $db;

    //Setters

    public function __construct()
    {
        $this->db = new Connection();
    }
    public function setName($string)
    {
        $this->name = $string;
    }

    public function setEmail($string)
    {
        $this->email = $string;
    }

    public function setPassword($string)
    {
        $this->password = $string;
    }

    //Getters
    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    //Include
    public function setUser()
    {
        return $this->db->insertUser($this->getName(), $this->getEmail(), $this->getPassword());
    }

    public function findUserByEmail($email) 
    {
        $select = mysqli_query($this->db->mysql, "SELECT * FROM users WHERE email = '" . $email . "'");
        if(mysqli_num_rows($select)) {
            return true;
        } else {
            return false;
        }
    }
}