<?php

namespace app\Controllers\Admin;

use app\Controllers\Controller;

class DashboardController implements Controller
{

    public function index()
    {
        return $this->RenderHtml('dashboard', []);
    }

    public function create()
    {
        return $this->RenderHtml('register', []);
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
}
