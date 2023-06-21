<?php

/**
 * Dit is de model voor de controller Klant_d3_saad
 */

class Klant_d3_saad
{
    //properties
    private $db;

    // Dit is de constructor van de Klant_d3_saad model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getKlanten()
    {
        $this->db->query('SELECT Persoon1.Id, Gezin1.Naam, Persoon1.IsVertegenwoordiger, Contact1.Email, Contact1.Mobiel, CONCAT(Contact1.Straat, " ",  Contact1.Huisnummer, " " , Contact1.Toevoeging) AS Adres, Contact1.Woonplaats 
                            FROM ContactPerGezin1
                            INNER JOIN Gezin1 ON ContactPerGezin1.GezinId = Gezin1.Id 
                            INNER JOIN Persoon1 ON Persoon1.GezinId = Gezin1.Id
                            INNER JOIN Contact1 ON ContactPerGezin1.ContactId = Contact1.Id');
        return $this->db->resultSet();
    }

    public function getKlantenById($id)
    {
        $this->db->query('SELECT Gezin1.Id, Gezin1.Naam, Persoon1.IsVertegenwoordiger, Contact1.Email, Contact1.Mobiel, CONCAT(Contact1.Straat, " ",  Contact1.Huisnummer, " " , Contact1.Toevoeging) AS Adres, Contact1.Woonplaats 
                          FROM Gezin1
                          INNER JOIN Persoon1 ON Persoon1.GezinId = Gezin1.Id 
                          INNER JOIN ContactPerGezin1 ON ContactPerGezin1.GezinId = Gezin1.id
                          INNER JOIN Contact1 ON ContactPerGezin1.ContactId = Contact1.Id 
                          WHERE Persoon1.Id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateKlanten($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Product
                              SET aantal = :aantal
                              WHERE id = :id");
        $this->db->bind(':aantal', $data['aantal'], PDO::PARAM_INT);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

}