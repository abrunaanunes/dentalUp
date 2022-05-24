<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;
use app\Models\Dentist;
use database\Database;
use Pecee\SimpleRouter\SimpleRouter;

class DentistController implements Controller
{

    use Render;
    use Session;

    private $db;

    public function __construct() 
    {
        $this->db = new Database();
        $this->dentistModel = new Dentist();
    }
    
    public function index()
    {
        $this->db->query('SELECT * FROM dentists');
        $dentists = $this->db->resultSet();
        return $this->RenderHtml('dentist/index.php', [
            'dentists' => $dentists
        ], []);
    }

    public function create()
    {
        return $this->RenderHtml('dentist/form.php', [], []);
    }

    public function store()
    {
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'cpf' => trim($_POST['cpf']),
            'phone' => trim($_POST['phone'])
        ];

        if($data['name'] == "" || empty($data['name'])) {
            $data['nameError'] = "O campo nome encontra-se vazio.";
        }

        if(empty($data['email'])) {
            $data['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = "E-mail inválido.";
        } elseif ($this->dentistModel->findDentistByEmail($data['email'])) {
            $data['emailError'] = "E-mail já cadastrado.";
        }

        try {
            $this->dentistModel->setName($data['name']);
            $this->dentistModel->setEmail($data['email']);
            $this->dentistModel->setCpf($data['cpf']);
            $this->dentistModel->setPhone($data['phone']);
            $this->dentistModel->setIsActive(1);

            $this->dentistModel->setDentist();
            SimpleRouter::response()->redirect('/dentist');

        } catch (\Throwable $th) {
            $data['registerError'] = "Erro ao cadastrar dentista.";
            return $this->RenderHtml('dentist/form.php', $data);
        }
    }

    public function edit($id)
    {
        $this->db->query('SELECT * FROM dentists WHERE id = :id');
        $this->db->bind(':id', $id);
        $data = (array) $this->db->single();

        return $this->renderHtml('dentist/form.php', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'cpf' => trim($_POST['cpf']),
            'phone' => trim($_POST['phone'])
        ];

        $this->db->query('SELECT * FROM clients WHERE id = :id');
        $this->db->bind(':id', $id);
        $item = new Dentist($this->db->single());



        if($data['name'] == "" || empty($data['name'])) {
            $data['nameError'] = "O campo nome encontra-se vazio.";
        }

        if(empty($data['email'])) {
            $data['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = "E-mail inválido.";
        } elseif ($item->findDentistByEmail($data['email'])) {
            $data['emailError'] = "E-mail já cadastrado.";
        }

        try {
            $item->setName($data['name']);
            $item->setEmail($data['email']);
            $item->setCpf($data['cpf']);
            $item->setPhone($data['phone']);

            $item->updateDentist($id);
            SimpleRouter::response()->redirect('/dentist');

        } catch (\Throwable $th) {
            $this->db->query('SELECT * FROM dentists WHERE id = :id');
            $this->db->bind(':id', $id);
            $data = (array) $this->db->single();

            $data['registerError'] = $th->getMessage();
            return $this->RenderHtml('dentist/form.php', $data);
        }
    }

    public function destroy($id)
    {
        try {
            $this->db->query('DELETE FROM dentists WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
            SimpleRouter::response()->redirect('/dentist');
        } catch (\Throwable $th) {
            $data['registerError'] = $th->getMessage();
            var_dump($data);
        }
    }
}
