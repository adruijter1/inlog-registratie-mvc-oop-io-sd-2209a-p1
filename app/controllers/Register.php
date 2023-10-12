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

            $registerInfo = $this->registerModel->registerFormData($_POST);

            $this->sendEmail($registerInfo);

            echo "<p>Registreren is succesvol verlopen. U ontvangt een activatiemail</p>";

            header("Refresh: 3; " . URLROOT);
        }
        
    }

    public function sendEmail($registerInfo)
    {
        $to = $registerInfo['email'];
        $gebruikerId = $registerInfo['gebruikerId'];
        $passwordHashReplace = $registerInfo['passwordHashReplace'];
        $subject = 'Activatielink voor uw account';

        $message = '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Registratie</title>
                    </head>
                    <body>
                    <h2>Beste Gebruiker</h2>
                    <p>U heeft zich geregistreerd voor de site ...</p>
                    <p>Klik <a href="http://www.login-registratie-mvc-oop-2209a-p1.nl/Register/activeren/' . $gebruikerId . '/' . $passwordHashReplace . '">hier</a> voor het wijzigen en activeren van uw account</p>
                    <p>Bedankt voor het registreren</p>
                    <p>Met vriendelijke groet,</p>
                    <p>Arjan de Ruijter</p>
                        
                    </body>
                    </html>';

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: admin@login-registratie-mvc-oop-2209a-p1.nl\r\n";
        $headers .= "Cc: moderator@login-registratie-mvc-oop-2209a-p1.nl\r\n";
        $headers .= "Bcc: root@login-registratie-mvc-oop-2209a-p1.nl";


        mail($to, $subject, $message, $headers);
    }

    public function activeren($gebruikersId = NULL, $hash = NULL)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            var_dump($_POST);

            $result = $this->registerModel->checkIdHash($_POST);


            var_dump($result);
        }
        echo $gebruikersId . " | " . $hash;

        $data = [
            'title' => 'Activeer uw account',
            'gebruikersId' => $gebruikersId,
            'hash' => $hash
        ];

        $this->view('/register/activeren', $data);
    }
}


