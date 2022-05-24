<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;
use app\Models\Client;
use database\Database;
use Pecee\SimpleRouter\SimpleRouter;

class ClientController implements Controller
{
    use Render;
    use Session;
    
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
        $this->clientModel = new Client();
    }

    public function index()
    {
        $this->db->query('SELECT * FROM clients');
        $clients = $this->db->resultSet();

        return $this->RenderHtml('client/index.php', [
            'clients' => $clients,
        ]);
    }

    public function create()
    {
        return $this->RenderHtml('client/form.php', []);
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
        } elseif ($this->clientModel->findClientByEmail($data['email'])) {
            $errors['emailError'] = "E-mail já cadastrado.";
        }

        try {
            $this->clientModel->setName($data['name']);
            $this->clientModel->setEmail($data['email']);
            $this->clientModel->setCpf($data['cpf']);
            $this->clientModel->setPhone($data['phone']);
            $this->clientModel->setIsActive(1);

            $this->clientModel->setDentist();
            SimpleRouter::response()->redirect('/client');

        } catch (\Throwable $th) {
            $errors['registerError'] = $th->getMessage();
            return $this->RenderHtml('client/form.php', $errors);
        }
    }

    public function edit($id)
    {
        $this->db->query('SELECT * FROM clients WHERE id = :id');
        $this->db->bind(':id', $id);
        $item = $this->db->single();

        return $this->renderHtml('client/form.php', []);
    }

    public function update($request, $id)
    {
    
    }

    public function destroy($id)
    {

    }
}
