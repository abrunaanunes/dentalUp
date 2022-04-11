<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Models\User;

class UserController implements Controller
{
    use Render;

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->store();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return $this->RenderHtml('register.php', []);
    }

    public function store()
    {       
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password'])
        ];

        $errors = [
            'nameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'registerError' => ''
        ];

        //Name validation
        if($data['name'] == "" || empty($data['name'])) {
            $errors['nameError'] = "O campo nome encontra-se vazio.";
        }
            
        //Email validation
        if(empty($data['email'])) {
            $errors['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "E-mail inválido.";
        } elseif ($this->userModel->findUserByEmail($data['email'])) {
            $errors['emailError'] = "E-mail já cadastrado.";
        }
        

        //Password validation
        if(($data['password'] == "" || empty($data['password'])) || $data['confirm_password'] == "" || empty($data='confirm_password')) {
            $errors['passwordError'] = "Senhas inválidas";
        }

        if(!empty($errors)) {
            return $this->RenderHtml('register.php', $errors);
        } else {
            //Hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $this->userModel->setName($data['name']);
            $this->userModel->setEmail($data['email']);
            $this->userModel->setPassword($data['password']);
            $this->userModel->setIsActive(1);
            
            if($this->userModel->setUser()) {
                $this->RenderHtml('dashboard.php', []);
            } else {
                $errors['registerError'] = "Erro ao cadastrar usuário.";
                $this->RenderHtml('dashboard.php', $errors);
            };
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
