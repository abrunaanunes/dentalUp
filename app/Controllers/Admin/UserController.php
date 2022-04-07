<?php

namespace app\Controllers\Admin;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Models\User;
use database\Connection;

class UserController implements Controller
{
    use Render;

    private $item;
    public $error;

    public function __construct()
    {
        $this->item = new User();
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $this->errors = "E-mail inválido.";
        //     //retornar erros
        // }

        // if(!$password === $confirm_password) {
        //     $this->errors = "Senhas não compatíveis.";
        //     //retornar erros
        // }

        if($this->error) {
            $this->item->setName($name);
            $this->item->setEmail($email);
            $this->item->setPassword($password);
            // $this->item->setUser();
        }

        $conn = new Connection();
        var_dump($conn);
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
