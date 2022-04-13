<?php
namespace app\Controllers;

use app\Helpers\Render;
use app\Helpers\Session;
use app\Models\User;
use Pecee\SimpleRouter\SimpleRouter;

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
        if($this->isLoggedIn()) {
            return $this->RenderHtml('dashboard.php', []);
        }

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

        if(!empty($errors['emailError']) || !empty($errors['passwordError'])) {
                return $this->RenderHtml('login.php', $errors);
        } else {
            $loggedInUser = $this->userModel->loginUser($data['email'], $data['password']);
        }

        if($loggedInUser) {
            $this->createUserSession($data['email']);
            SimpleRouter::response()->redirect('/dashboard');
        } else {
            $errors['loginError'] = "E-mail ou senha incorretos. Por favor, tente novamente.";
            return $this->RenderHtml('login.php', $errors);
        }
    }

    public function logout()
    {
        $loggedOutUser = $this->logoutSession();
        if($loggedOutUser) {
            SimpleRouter::response()->redirect('/');
        }
    }
}
