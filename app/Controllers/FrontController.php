<?php
namespace app\Controllers;

use app\Helpers\Render;

class FrontController
{
    use Render;
    
    public function index()
    {
        return $this->RenderHtml('login.php', []);
    }

    public function register()
    {
        return $this->RenderHtml('register', []);
    }

    public function login() {
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        $errors = [
            'emailError' => '',
            'passwordError' => ''
        ];

        //Email validation
        if($data['email'] == "" || empty($data['email'])) {
            $errors['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "E-mail inválido.";
        } elseif (!$this->userModel->findUserByEmail($data['email'])) {
            $errors['emailError'] = "E-mail já cadastrado.";
        }

        //Password validation
        if($data['password'] == "" || empty($data['password'])) {
            $errors['passwordError'] = "Senha inválida";
        }

        if(!empty($errors)) {
            return $this->RenderHtml('login.php', $errors);
        } 
    }
}
