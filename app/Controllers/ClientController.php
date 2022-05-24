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
            $data['nameError'] = "O campo nome encontra-se vazio.";
        }

        if(empty($data['email'])) {
            $data['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = "E-mail inválido.";
        } elseif ($this->clientModel->findClientByEmail($data['email'])) {
            $data['emailError'] = "E-mail já cadastrado.";
        }

        try {
            $this->clientModel->setName($data['name']);
            $this->clientModel->setEmail($data['email']);
            $this->clientModel->setCpf($data['cpf']);
            $this->clientModel->setPhone($data['phone']);
            $this->clientModel->setIsActive(1);

            $this->clientModel->setClient();
            SimpleRouter::response()->redirect('/client');

        } catch (\Throwable $th) {
            $data['registerError'] = $th->getMessage();
            return $this->RenderHtml('client/form.php', $data);
        }
    }

    public function edit($id)
    {
        $this->db->query('SELECT * FROM clients WHERE id = :id');
        $this->db->bind(':id', $id);
        $data = (array) $this->db->single();

        return $this->renderHtml('client/form.php', $data);
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
        $item = new Client($this->db->single());



        if($data['name'] == "" || empty($data['name'])) {
            $data['nameError'] = "O campo nome encontra-se vazio.";
        }

        if(empty($data['email'])) {
            $data['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailError'] = "E-mail inválido.";
        } elseif ($item->findClientByEmail($data['email'])) {
            $data['emailError'] = "E-mail já cadastrado.";
        }

        try {
            $item->setName($data['name']);
            $item->setEmail($data['email']);
            $item->setCpf($data['cpf']);
            $item->setPhone($data['phone']);

            $item->updateClient($id);
            SimpleRouter::response()->redirect('/client');

        } catch (\Throwable $th) {
            $this->db->query('SELECT * FROM clients WHERE id = :id');
            $this->db->bind(':id', $id);
            $data = (array) $this->db->single();

            $data['registerError'] = $th->getMessage();
            return $this->RenderHtml('client/form.php', $data);
        }
    }

    public function destroy($id)
    {
        try {
            $this->db->query('DELETE FROM clients WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
            SimpleRouter::response()->redirect('/client');
        } catch (\Throwable $th) {
            $data['registerError'] = $th->getMessage();
            var_dump($data);
        }
    }
}
