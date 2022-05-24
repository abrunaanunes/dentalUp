<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;
use database\Database;

class DashboardController
{

    use Render;
    use Session;
    
    private $db;

    public function index()
    {
        $this->db = new Database();
        $this->db->query('SELECT * FROM appointments');
        $this->db->execute();
        $appointments = $this->db->rowCount();

        $this->db->query('SELECT * FROM dentists');
        $this->db->execute();
        $dentists = $this->db->rowCount();

        $this->db->query('SELECT * FROM clients');
        $this->db->execute();
        $clients = $this->db->rowCount();



        if($this->isLoggedIn()) {
            return $this->RenderHtml('dashboard.php', [
                'appointments' => $appointments,
                'dentists' => $dentists,
                'clients' => $clients,
            ]);
        }
        
        header('location:' . $_SERVER['HTTP_HOST'] . '/');
    }

    public function create()
    {
        return $this->RenderHtml('register.php', []);
    }
}
