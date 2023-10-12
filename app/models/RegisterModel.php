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

        $this->db->execute();

        $persoonId = $this->db->lastInsertId();

        $passwordHash = password_hash($post['email'], PASSWORD_BCRYPT);
        $passwordHash = str_replace('/', '#', $passwordHash);

        $sql = "INSERT INTO Gebruiker (PersoonId,
                                       Inlognaam,
                                       Gebruikersnaam,
                                       Wachtwoord,
                                       IsIngelogd,
                                       Ingelogd,
                                       Uitgelogd,
                                       IsActief,
                                       Opmerkingen,
                                       DatumAangemaakt,
                                       DatumGewijzigd)
                VALUES                (:persoonId,
                                       :inlognaam,
                                       :email,
                                       :wachtwoord,
                                       0,
                                       NULL,
                                       NULL,
                                       1,
                                       NULL,
                                       SYSDATE(6),
                                       SYSDATE(6))";
                $this->db->query($sql);

                $this->db->bind(':persoonId', $persoonId, PDO::PARAM_INT);
                $this->db->bind(':inlognaam', substr($post['email'], 0, strpos($post['email'], '@')), PDO::PARAM_STR);
                $this->db->bind(':email', $post['email'], PDO::PARAM_STR);
                $this->db->bind(':wachtwoord', $passwordHash, PDO::PARAM_STR);
                $this->db->bind(':persoonId', $persoonId, PDO::PARAM_INT);
                $this->db->bind(':persoonId', $persoonId, PDO::PARAM_INT);

                $this->db->execute();

                $gebruikerId = $this->db->lastInsertId();

                $sql = "INSERT INTO RolPerGebruiker (GebruikerId,
                                                     RolId,
                                                     IsActief,
                                                     Opmerkingen,
                                                     DatumAangemaakt,
                                                     DatumGewijzigd)
                        VALUES                      (:gebruikerId,
                                                     :rolId,
                                                     1,
                                                     NULL,
                                                     SYSDATE(6),
                                                     SYSDATE(6))";

                $this->db->query($sql);

                $this->db->bind('gebruikerId', $gebruikerId, PDO::PARAM_INT);
                $this->db->bind('rolId', 2, PDO::PARAM_INT);

                $this->db->execute();

                return array('gebruikerId' => $gebruikerId,
                             'passwordHash' => $passwordHash,
                             'email' => $post['email']);
    }

    public function checkIdHash($post)
    {
        $passwordHash = str_replace('#', '/', $post['passwordHash']);

        $sql = "SELECT * FROM Gebruiker 
                WHERE Id = :gebruikersId
                AND   wachtwoord = :wachtwoord";

        $this->db->query($sql);

        $this->db->bind(':gebruikersId', $post['gebruikersId'], PDO::PARAM_INT);
        $this->db->bind(':wachtwoord', $passwordHash, PDO::PARAM_STR);

        $result = $this->db->single();

        if ($this->db->rowCount($result)) {
            $sql = "UPDATE Gebruiker
                    SET  wachtwoord = :wachtwoord,
                         IsActief = 1
                    WHERE Id = :gebruikersId
                    AND   wachtwoord = :passwordHash";
            
            $this->db->query($sql);

            $newPasswordHash = password_hash($post['password'], PASSWORD_BCRYPT);

            $this->db->bind(':wachtwoord', $newPasswordHash, PDO::PARAM_STR);
            $this->db->bind(':gebruikersId', $post['gebruikersId'], PDO::PARAM_STR);
            $this->db->bind(':passwordHash', $passwordHash, PDO::PARAM_STR);

            $this->db->execute();

        }
    }


}