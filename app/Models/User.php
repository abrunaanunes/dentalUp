<?php

namespace app\Models;

use database\Connection;

class User
{
    private $name;
    private $username;
    private $password;

    //Setters
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
        $user = new Connection();
        return $user->insertUser($this->getName(), $this->getEmail(), $this->getPassword());
    }
}