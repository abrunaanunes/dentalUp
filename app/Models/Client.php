<?php

namespace app\Models;

use database\Database;

class Appointment
{
    private $name;
    private $email;
    private $password;
    private $is_active;
    private $db;

    //Setters

    public function setName($string)
    {
        $this->name = $string;
    }

    public function setEmail($string)
    {
        $this->email = $string;
    }

    public function setCpf($string)
    {
        $this->cpf = $string;
    }

    public function setPhone($string)
    {
        $this->phone = $string;
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

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getIsActive()
    {
        return true;
    }

    //Include
    public function setClient()
    {
        $this->db->query('INSERT INTO clients (`name`, `email`, `cpf`, `phone`, `is_active`) VALUES (:name, :email, :cpf, :phone, :is_active)');

        $this->db->bind(':name', $this->getName());
        $this->db->bind(':email', $this->getEmail());
        $this->db->bind(':cpf', $this->getCpf());
        $this->db->bind(':phone', $this->getPhone());
        $this->db->bind(':is_active', $this->getIsActive());

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
}