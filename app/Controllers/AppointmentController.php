<?php

namespace app\Controllers;

use app\Controllers\Controller;
use app\Helpers\Render;
use app\Helpers\Session;

class AppointmentController implements Controller
{

    use Render;
    use Session;
    
    public function index()
    {
        return $this->RenderHtml('dashboard.php', []);
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
}
