<?php

class RegisterModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}