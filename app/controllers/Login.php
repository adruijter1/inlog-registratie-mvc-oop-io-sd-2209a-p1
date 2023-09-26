<?php

class Login extends BaseController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = $this->model('LoginModel');
    }

    public function index()
    {        
        
        $data = [
            'title' => 'Login pagina',
        ];

        $this->view('Login/index', $data);
    }
}