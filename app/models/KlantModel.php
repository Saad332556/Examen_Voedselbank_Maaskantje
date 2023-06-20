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

    public function wijzigKlant($data) {
        $this->db->query('UPDATE Klant SET naam = :naam, emailadres = :emailadres, adres = :adres, telefoonnummer = :telefoonnummer WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':naam', $data['naam']);
        $this->db->bind(':emailadres', $data['emailadres']);
        $this->db->bind(':adres', $data['adres']);
        $this->db->bind(':telefoonnummer', $data['telefoonnummer']);
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

    public function voegKlantToe($data) {
        $this->db->query('INSERT INTO Klant (naam, emailadres, adres, telefoonnummer, gezin_id) VALUES (:naam, :emailadres, :adres, :telefoonnummer, :gezin_id)');
        $this->db->bind(':naam', $data['naam']);
        $this->db->bind(':emailadres', $data['emailadres']);
        $this->db->bind(':adres', $data['adres']);
        $this->db->bind(':telefoonnummer', $data['telefoonnummer']);
        $this->db->bind(':gezin_id', $data['gezin_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
}