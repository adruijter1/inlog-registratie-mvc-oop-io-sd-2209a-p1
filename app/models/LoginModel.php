<?php

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}