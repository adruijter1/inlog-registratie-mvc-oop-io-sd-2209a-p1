<?php

class RegisterModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function registerFormData($post)
    {
        $sql = "INSERT INTO Persoon (Voornaam,
                                     Tussenvoegsel, 
                                     Achternaam, 
                                     IsActief, 
                                     Opmerkingen, 
                                     DatumAangemaakt, 
                                     DatumGewijzigd)
                VALUES              (:firstname,
                                     :infix,
                                     :lastname,
                                     1,
                                     NULL,
                                     SYSDATE(6),
                                     SYSDATE(6))";

        $this->db->query($sql);
        $this->db->bind(':firstname', $post['firstname'], PDO::PARAM_STR);
        $this->db->bind(':infix', $post['infix'], PDO::PARAM_STR);
        $this->db->bind(':lastname', $post['lastname'], PDO::PARAM_STR);

        return $this->db->execute();
    }


}