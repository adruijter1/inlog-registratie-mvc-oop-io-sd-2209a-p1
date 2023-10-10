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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST Waarden schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->registerModel->insertRegisterData($_POST);

            $this->sendEmail($result, $_POST);
        }

        $data = [
            'title' => 'Registratieformulier'
        ];

        $this->view('Register/index', $data);
    }

    private function sendEmail($idAndHash, $nameAndEmail) 
    {
        var_dump($idAndHash);
        var_dump($nameAndEmail);

        $to = $nameAndEmail['email'];
        $subject = "Activatielink voor uw account";
        
        $message = '<!doctype html>
                    <html lang="en">
                        <head>
                        <!-- Required meta tags -->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    
                        <!-- Bootstrap CSS -->
                        
                        <title>Hello, world!</title>
                        </head>
                        <body>
                        <h2>Beste Gebruiker,</h2>
                        <p>U heeft zich onlangs geregistreerd voor de site</p>
                        <p>Klik <a href="http://www.login-registratie-mvc-oop-2209a-p1.nl/Register/activeren/' . $idAndHash['gebruikerId'] . '/' . $idAndHash['hash'] . '">hier</a> voor het activeren en wijzigen van het wachtwoord van uw account</p>
                        <p>Bedankt voor het registreren</p>
                        <p>Met vriendelijke groet,</p>
                        <p>A. de Ruijter</p>
                        <p>CEO</p>                       
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                        </body>
                    </html>';


        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: admin@login-registratie-mvc-oop-2209a-p1.nl\r\n";
        $headers .= "Cc: moderator@login-registratie-mvc-oop-2209a-p1.nl\r\n";
        $headers .= "Bcc: root@login-registratie-mvc-oop-2209a-p1.nl";

        // echo $message;
        
        mail($to, $subject, $message, $headers);
    }

    public function activeren($id, $pwh)
    {
        /**
         * Moet nog worden gemaakt!!!! Under construction
         */
        echo $id . " | " . $pwh;
    }
}