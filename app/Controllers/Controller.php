<?php

namespace app\Controllers;

interface Controller
{

    public function index();

    public function create();

    public function store();

    public function edit($id);

    public function update($id);

    public function destroy($id);

}
