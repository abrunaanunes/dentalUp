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
            $errors['nameError'] = "O campo nome encontra-se vazio.";
        }

        if(empty($data['email'])) {
            $errors['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "E-mail inválido.";
        } elseif ($this->dentistModel->findDentistByEmail($data['email'])) {
            $errors['emailError'] = "E-mail já cadastrado.";
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
            $errors['registerError'] = "Erro ao cadastrar dentista.";
            return $this->RenderHtml('dentist/form.php', $errors, []);
        }
    }

    public function edit($id)
    {

    }

    public function update($request, $id)
    {
    
    }

    public function destroy($id)
    {

    }
}
