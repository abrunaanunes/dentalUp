<?php

namespace app\Models;

use database\Database;

class Client
{
    private $name;
    private $email;
    private $cpf;
    private $phone;
    private $is_active;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

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

    public function updateClient($id)
    {
        $this->db->query('UPDATE clients SET `name`=:name, `email`=:email, `cpf`=:cpf, `phone`=:phone WHERE `id`=:id');

        $this->db->bind(':name', $this->getName());
        $this->db->bind(':email', $this->getEmail());
        $this->db->bind(':cpf', $this->getCpf());
        $this->db->bind(':phone', $this->getPhone());
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function findClientByEmail($email) 
    {
        $this->db->query('SELECT * FROM clients WHERE email = :email');
        $this->db->bind(':email', $email);
        if($this->db->rowCount() > 0) {
            return true;
        }

        return false;
    }
}