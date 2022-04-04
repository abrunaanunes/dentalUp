<?php
namespace app\Controllers\Front;

use app\Controllers\Controller;

class FrontController implements Controller
{
    public function index()
    {
        return $this->RenderHtml('index', []);
    }

    public function create()
    {

    }

    public function store($request)
    {

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

    public function RenderHtml(string $view, array $data)
    {
        extract($data);
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/' .'views/' . $view . '.php';
        $html = ob_get_clean();

        return $html;
    }

    public function login()
    {
        return $this->RenderHtml('login', []);
    }

    public function register()
    {
        return $this->RenderHtml('register', []);
    }
}
