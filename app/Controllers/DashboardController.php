<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;

class DashboardController implements Controller
{

    use Render;
    use Session;
    
    public function index()
    {
        if($this->isLoggedIn()) {
            return $this->RenderHtml('dashboard.php', []);
        }
        
        header('location:' . $_SERVER['HTTP_HOST'] . '/');
    }

    public function create()
    {
        return $this->RenderHtml('register.php', []);
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
}
