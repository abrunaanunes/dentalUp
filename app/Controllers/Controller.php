<?php

namespace app\Controllers;

interface Controller
{

    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);

    public function RenderHtml(string $view, array $data);
}
