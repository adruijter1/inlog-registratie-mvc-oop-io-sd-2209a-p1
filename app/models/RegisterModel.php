<?php

class RegisterModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertRegisterData($post)
    {
        $sql = "INSERT INTO Persoon (Voornaam,
                                     Tussenvoegsel,
                                     Achternaam,
                                     IsActief,
                                     Opmerkingen,
                                     DatumAangemaakt,
                                     DatumGewijzigd)
                VALUES              (:voornaam,
                                     :tussenvoegsel,
                                     :achternaam,
                                     1,
                                     NULL,
                                     SYSDATE(6),
                                     SYSDATE(6))";

        $this->db->query($sql);
        $this->db->bind(':voornaam', $post['firstname'], PDO::PARAM_STR);
        $this->db->bind(':tussenvoegsel', $post['infix'], PDO::PARAM_STR);
        $this->db->bind(':achternaam', $post['lastname'], PDO::PARAM_STR);

        $this->db->execute();
        
        $hash = password_hash(microtime() . $post['email'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO Gebruiker (PersoonId,
                                       Inlognaam,
                                       Gebruikersnaam,
                                       Wachtwoord,
                                       IsIngelogd,
                                       IsActief,
                                       Opmerkingen,
                                       DatumAangemaakt,
                                       DatumGewijzigd)
                VALUES                (:persoonId,
                                       :inlogNaam,
                                       :gebruikersnaam,
                                       :wachtwoord,
                                       0,
                                       0,
                                       NULL,
                                       SYSDATE(6),
                                       SYSDATE(6))";

        $this->db->query($sql);
        $this->db->bind(':persoonId', $this->db->lastInsertId(), PDO::PARAM_INT);
        $this->db->bind(':inlogNaam', substr($post['email'], 0, strpos($post['email'], "@")), PDO::PARAM_STR);
        $this->db->bind(':gebruikersnaam', $post['email'], PDO::PARAM_STR);
        $this->db->bind(':wachtwoord', $hash, PDO::PARAM_STR);

        $this->db->execute();

        
        

        $sql = "INSERT INTO RolPerGebruiker (GebruikerId,
                                             RolId,
                                             IsActief,
                                             Opmerkingen,
                                             DatumAangemaakt,
                                             DatumGewijzigd)
                VALUES                      (:gebruikerId,
                                             2,
                                             0,
                                             NULL,
                                             SYSDATE(6),
                                             SYSDATE(6))";
        
        $this->db->query($sql);
        $this->db->bind(':gebruikerId', $this->db->lastInsertId(), PDO::PARAM_INT);
        $this->db->execute();

        return array('gebruikerId' => $this->db->lastInsertId(),
                     'hash' => $hash);



    }

}