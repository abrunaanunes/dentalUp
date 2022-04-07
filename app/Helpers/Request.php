<?php

namespace app\Helpers;

class Request
{
    protected $request;
 
    public function __construct()
    {
        $this->request = $_REQUEST;
    }
 
    public function __get($data)
    {
        if (isset($this->request[$data])) {
            return $this->request[$data];
        }
        return false;
    }
}