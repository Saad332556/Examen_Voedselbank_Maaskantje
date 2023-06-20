<?php
require_once APPROOT . '/Helpers/DateTimeHelper.php';

class KlantModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getKlanten() {
        $this->db->query('SELECT Klant.id, Klant.naam, Klant.emailadres, Klant.adres, Klant.telefoonnummer,
        Gezinssamenstelling.AantalVolwassenen, Gezinssamenstelling.AantalKinderen, Gezinssamenstelling.AantalBaby 
        FROM Klant INNER JOIN Gezin ON Klant.gezin_id = Gezin.id INNER JOIN Gezinssamenstelling ON Gezinssamenstelling.gezin_id = Gezin.id');
        return $this->db->resultSet();
    }

    public function getKlantById($id) {
        $this->db->query('SELECT Klant.id, Klant.naam, Klant.emailadres, Klant.adres, Klant.telefoonnummer,
        Gezinssamenstelling.AantalVolwassenen, Gezinssamenstelling.AantalKinderen, Gezinssamenstelling.AantalBaby 
        FROM Klant INNER JOIN Gezin ON Klant.gezin_id = Gezin.id INNER JOIN Gezinssamenstelling ON Gezinssamenstelling.gezin_id = Gezin.id WHERE Klant.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function wijzigKlant($POST) {
        $this->db->query('UPDATE Klant 
        INNER JOIN Gezin 
        ON Klant.gezin_id = Gezin.id 
        INNER JOIN Gezinssamenstelling ON 
        Gezinssamenstelling.gezin_id = Gezin.id
        SET Klant.naam = :naam, Klant.emailadres = :emailadres, Klant.adres = :adres, Klant.telefoonnummer = :telefoonnummer, Gezinssamenstelling.AantalKinderen = :AantalKinderen, 
        Gezinssamenstelling.AantalVolwassenen = :AantalVolwassenen, Gezinssamenstelling.AantalBaby = :AantalBaby WHERE Klant.id = :id');
        $this->db->bind(':id', $POST['id']);
        $this->db->bind(':naam', $POST['naam']);
        $this->db->bind(':emailadres', $POST['emailadres']);
        $this->db->bind(':adres', $POST['adres']);
        $this->db->bind(':telefoonnummer', $POST['telefoonnummer']);
        $this->db->bind(':AantalKinderen', $POST['AantalKinderen']);
        $this->db->bind(':AantalVolwassenen', $POST['AantalVolwassenen']);
        $this->db->bind(':AantalBaby', $POST['AantalBaby']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function verwijderKlant($id) {
        $this->db->query('DELETE FROM Klant WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function voegKlantToe($POST) {
        $this->db->query('INSERT INTO Klant  
        (naam,emailadres,adres,telefoonnummer)
        VALUES (:naam,:emailadres,:adres,:telefoonnummer);');
        $this->db->bind(':naam', $POST['naam'], PDO::PARAM_STR);
        $this->db->bind(':emailadres', $POST['emailadres'], PDO::PARAM_STR);
        $this->db->bind(':adres', $POST['adres'] , PDO::PARAM_STR);
        $this->db->bind(':telefoonnummer', $POST['telefoonnummer'] , PDO::PARAM_STR);
        $this->db->execute();


        $this->db->query('INSERT INTO Gezinssamenstelling
        (AantalKinderen,AantalVolwassenen,AantalBaby)
        VALUES (:AantalKinderen,:AantalVolwassenen,:AantalBaby);');
        $this->db->bind(':AantalKinderen', $POST['AantalKinderen'], PDO::PARAM_INT);
        $this->db->bind(':AantalVolwassenen', $POST['AantalVolwassenen'], PDO::PARAM_INT);
        $this->db->bind(':AantalBaby', $POST['AantalBaby'] , PDO::PARAM_INT);
          $this->db->execute();

         $this->db->query('INSERT INTO Gezin
            (KlantId)
            VALUES (LAST_INSERT_ID());');
            return $this->db->execute();



         

        

        
         
    }

    // Insert into Klant table
//     $this->db->query("INSERT INTO Klant (GezinId, 
//     Naam, 
//     IsActive, 
//     DatumAangemaakt, 
//     Datumgewijzigd)
// VALUES (LAST_INSERT_ID(), :naam, 1, SYSDATE(6), SYSDATE(6))
// ");
 }  
