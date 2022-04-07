<?php

namespace app\Controllers\Admin;

use app\Controllers\Controller;
use app\Helpers\Render;

class DashboardController implements Controller
{

    use Render;
    
    public function index()
    {
        return $this->RenderHtml('dashboard.php', []);
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
