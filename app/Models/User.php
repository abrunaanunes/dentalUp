<?php

namespace app\Models;

use database\Connection;
use mysqli;

class User
{
    private $name;
    private $email;
    private $password;
    private $is_active;
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

    public function setIsActive($boolean)
    {
        $this->is_active = $boolean;
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

    public function getIsActive()
    {
        return $this->is_active;
    }

    //Include
    public function setUser()
    {
        return $this->db->insertUser($this->getName(), $this->getEmail(), $this->getPassword(), $this->getIsActive());
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

    public function loginUser($email, $password)
    {
        $row = mysqli_query($this->db->mysql, "SELECT * FROM users WHERE email = '" . $email . "'");
        $row = mysqli_fetch_object($row);
        
        $hashedPassword = $row->password;

        if ($password != $hashedPassword) {
            return false;
        } 

        return true;

    }
}