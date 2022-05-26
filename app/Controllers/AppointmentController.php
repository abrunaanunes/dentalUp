<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;
use app\Models\Appointment;
use database\Database;
use Pecee\SimpleRouter\SimpleRouter;

class AppointmentController implements Controller
{

    use Render;
    use Session;

    private $db;

    public function __construct() 
    {
        $this->db = new Database();
        $this->appointmentModel = new Appointment();
    }
    
    public function index()
    {
        $this->db->query('SELECT * FROM appointments');
        $appointments = $this->db->resultSet();

        return $this->RenderHtml('appointment/index.php', [
            'appointments' => $appointments
        ], []);
    }

    public function create()
    {
        $this->db->query('SELECT * FROM clients');
        $clients = $this->db->resultSet();

        $this->db->query('SELECT * FROM dentists');
        $dentists = $this->db->resultSet();
        
        return $this->RenderHtml('appointment/form.php', [
            'clients' => $clients,
            'dentists' => $dentists,
        ], []);
    }

    public function store()
    {
        $data = [
            'appointment_date' => strtotime($_POST['appointment_date']),
            'appointment_reason' => trim($_POST['appointment_reason']),
            'client_id' => (int) $_POST['client_id'],
            'dentist_id' => (int) $_POST['dentist_id']
        ];

        $data['appointment_date'] = date("Y-m-d H:i:s", $data['appointment_date']);

        try {
            $this->appointmentModel->setAppointmentDate($data['appointment_date']);
            $this->appointmentModel->setAppointmentReason($data['appointment_reason']);
            $this->appointmentModel->dentist($data['dentist_id']);
            $this->appointmentModel->client($data['client_id']);

            $this->appointmentModel->setAppointment();
            SimpleRouter::response()->redirect('/appointment');

        } catch (\Throwable $th) {
            $data['registerError'] = $th->getMessage();
            return $this->RenderHtml('appointment/form.php', $data);
        }

    }

    public function edit($id)
    {
        $this->db->query('SELECT * FROM clients');
        $clients = $this->db->resultSet();

        $this->db->query('SELECT * FROM dentists');
        $dentists = $this->db->resultSet();
        
        $this->db->query('SELECT * FROM appointments WHERE id = :id');
        $this->db->bind(':id', $id);
        $appointment = (array) $this->db->single();

        return $this->RenderHtml('appointment/form.php', [
            'clients' => $clients,
            'dentists' => $dentists,
            'appointment' => $appointment,
        ]);
    }

    public function update($id)
    {
    
    }

    public function destroy($id)
    {
        try {
            $this->db->query('DELETE FROM appointments WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
            SimpleRouter::response()->redirect('/appointment');
        } catch (\Throwable $th) {
            $data['registerError'] = $th->getMessage();
            var_dump($data);
        }
    }
}
