<?php

class Module extends Controller
{
    public function __construct()
    {
        $this->set_layout('index');
    }
    
    public function index() {}
}