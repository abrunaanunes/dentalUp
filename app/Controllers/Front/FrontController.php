<?php
namespace app\Controllers\Front;

use app\Controllers\Controller;
use app\Helpers\Render;

class FrontController implements Controller
{
    use Render;
    
    public function index()
    {
        return $this->RenderHtml('index', []);
    }

    public function create()
    {

    }

    public function store()
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

    public function login()
    {
        return $this->RenderHtml('login', []);
    }

    public function register()
    {
        return $this->RenderHtml('register', []);
    }
}
