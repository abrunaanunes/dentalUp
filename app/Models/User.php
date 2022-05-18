<?php

namespace app\Models;

use database\Database;

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
        $this->db = new Database();
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
        return true;
    }

    //Include
    public function setUser()
    {
        $this->db->query('INSERT INTO users (`name`, `email`, `password`, `is_active`) VALUES (:name, :email, :password, :is_active)');

        $this->db->bind(':name', $this->getName());
        $this->db->bind(':email', $this->getEmail());
        $this->db->bind(':password', $this->getPassword());
        $this->db->bind(':is_active', $this->getIsActive());

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function findUserByEmail($email) 
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        if($this->db->rowCount() > 0) {
            return true;
        }

        return false;
    }

    public function loginUser($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($password == $row->password) {
            return $row;
        }
        
        return false;
    }
}