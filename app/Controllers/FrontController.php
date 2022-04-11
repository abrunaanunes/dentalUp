<?php
namespace app\Controllers;

use app\Helpers\Render;
use app\Helpers\Session;
use app\Models\User;

class FrontController
{
    use Render;
    use Session;

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    
    public function index()
    {
        
        return $this->RenderHtml('login.php', []);
    }

    public function register()
    {
        return $this->RenderHtml('register.php', []);
    }

    public function login() {
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        $errors = [
            'emailError' => '',
            'passwordError' => '',
            'loginError' => ''
        ];

        //Email validation
        if($data['email'] == "" || empty($data['email'])) {
            $errors['emailError'] = "O campo e-mail encontra-se vazio.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailError'] = "E-mail inválido.";
        }

        //Password validation
        if($data['password'] == "" || empty($data['password'])) {
            $errors['passwordError'] = "Senha inválida";
        }

        $loggedInUser = false;

        if(!empty($errors)) {
            return $this->RenderHtml('login.php', $errors);
        } else {
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
        }

        if($loggedInUser) {
            $this->createUserSession($loggedInUser);
            header('location:' . $_SERVER['HTTP_HOST'] . '/dashboard');
        } else {
            $errors['loginError'] = "E-mail ou senha incorretos. Por favor, tente novamente.";
            return $this->RenderHtml('login.php', $errors);
        }
    }
}
