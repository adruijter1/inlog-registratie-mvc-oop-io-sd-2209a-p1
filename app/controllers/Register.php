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
            'title' => 'Registreren'
        ];
        
        $this->view('Register/index', $data);
    }

    public function registerFormData() 
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $register = $this->registerModel->registerFormData($_POST);
        }
        
    }
}