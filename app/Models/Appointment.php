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

    public function __construct()
    {
        $this->db = new Database();
    }
    public function setAppointmentDate($timestamps)
    {
        $this->appointment_date = $timestamps;
    }

    public function setAppointmentReason($string)
    {
        $this->appointment_reason = $string;
    }

    public function user($id)
    {
        $this->user_id = $id;
    }

    public function client($id)
    {
        $this->client_id = $id;
    }

    //Getters
    public function getAppointmentDate()
    {
        return $this->appointment_date;
    }

    public function getAppointmentReason()
    {
        return $this->appointment_reason;
    }

    public function getUser()
    {
        return $this->user_id;
    }

    public function getClient()
    {
        return $this->client_id;
    }

    //Include
    public function setAppointment()
    {
        $this->db->query('INSERT INTO appointments (`appointment_date`, `appointment_reason`, `user_id`, `client_id`) VALUES (:appointment_date, :appointment_reason, :user_id, :client_id)');

        $this->db->bind(':appointment_date', $this->getName());
        $this->db->bind(':appointment_reason', $this->getEmail());
        $this->db->bind(':user_id', $this->getUser());
        $this->db->bind(':client_id', $this->getClient());

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
}