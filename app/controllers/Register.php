<?php

class Register extends BaseController
{
    private $registerModel;

    public function __construct()
    {
        $this->registerModel = $this->model('RegisterModel');
    }

    public function index()
    {        
        
        $data = [
            'title' => 'Register pagina',
        ];

        $this->view('Register/index', $data);
    }
}