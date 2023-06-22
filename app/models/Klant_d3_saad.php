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
        $this->db->query('SELECT Persoon1.Id, Gezin1.Naam, CASE WHEN IsVertegenwoordiger = 1 THEN "Ja" WHEN IsVertegenwoordiger = 0 THEN "Nee" END AS Vertegenwoordiger, Contact1.Postcode, Contact1.Email, Contact1.Mobiel, CONCAT(Straat, " ", Huisnummer, IF(Toevoeging != " ", CONCAT(" " , Toevoeging), " ")) AS Adres, Contact1.Woonplaats 
                            FROM ContactPerGezin1
                            INNER JOIN Gezin1 ON ContactPerGezin1.GezinId = Gezin1.Id 
                            INNER JOIN Persoon1 ON Persoon1.GezinId = Gezin1.Id
                            INNER JOIN Contact1 ON ContactPerGezin1.ContactId = Contact1.Id');
        return $this->db->resultSet();
    }

    public function getGefilterdePostcodes($postcode)
    {
      // Nu wil ik filteren op postcode dus hebben we ook Contact1 nodig en het Postcode is dan Contact1.Postcode
      $this->db->query('SELECT Persoon1.Id, Gezin1.Naam, CASE WHEN IsVertegenwoordiger = 1 THEN "Ja" WHEN IsVertegenwoordiger = 0 THEN "Nee" END AS Vertegenwoordiger, Contact1.Postcode, Contact1.Email, Contact1.Mobiel, CONCAT(Straat, " ", Huisnummer, IF(Toevoeging != " ", CONCAT(" " , Toevoeging), " ")) AS Adres, Contact1.Woonplaats 
                      FROM ContactPerGezin1
                      INNER JOIN Gezin1 ON ContactPerGezin1.GezinId = Gezin1.Id 
                      INNER JOIN Persoon1 ON Persoon1.GezinId = Gezin1.Id
                      INNER JOIN Contact1 ON ContactPerGezin1.ContactId = Contact1.Id
                      WHERE Contact1.Postcode = :postcode');
    $this->db->bind(':postcode', $postcode, PDO::PARAM_STR);
    return $this->db->resultSet();
    }
    
    public function getKlantenById($id)
{
    $this->db->query('SELECT Persoon1.Id, Persoon1.Voornaam, Persoon1.Tussenvoegsel, Persoon1.Achternaam, 
                             Persoon1.Geboortedatum, Persoon1.TypePersoon, 
                             CASE WHEN Persoon1.IsVertegenwoordiger = 1 THEN "Ja" WHEN Persoon1.IsVertegenwoordiger = 0 THEN "Nee" END AS Vertegenwoordiger,  
                             Contact1.Straat, Contact1.Huisnummer, Contact1.Toevoeging, 
                             Contact1.Postcode, Contact1.Woonplaats, Contact1.Email, 
                             Contact1.Mobiel
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
    $this->db->query("UPDATE Gezin1
                      INNER JOIN Persoon1 ON Persoon1.GezinId = Gezin1.Id 
                      INNER JOIN ContactPerGezin1 ON ContactPerGezin1.GezinId = Gezin1.id
                      INNER JOIN Contact1 ON ContactPerGezin1.ContactId = Contact1.Id      
                      SET Persoon1.Voornaam = :voornaam,
                          Persoon1.Tussenvoegsel = :tussenvoegsel,
                          Persoon1.Achternaam = :achternaam,
                          Persoon1.Geboortedatum = :geboortedatum,
                          Contact1.Straat = :straat,
                          Contact1.Huisnummer = :huisnummer,
                          Contact1.Toevoeging = :toevoeging,
                          Contact1.Postcode = :postcode,
                          Contact1.Woonplaats = :woonplaats,
                          Contact1.Email = :email,
                          Contact1.Mobiel = :mobiel
                      WHERE Persoon1.Id = :id");

    $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
    $this->db->bind(':voornaam', $data['voornaam'], PDO::PARAM_STR);
    $this->db->bind(':tussenvoegsel', $data['tussenvoegsel'], PDO::PARAM_STR);
    $this->db->bind(':achternaam', $data['achternaam'], PDO::PARAM_STR);
    $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);
    $this->db->bind(':straat', $data['straat'], PDO::PARAM_STR);
    $this->db->bind(':huisnummer', $data['huisnummer'], PDO::PARAM_INT);
    $this->db->bind(':toevoeging', $data['toevoeging'], PDO::PARAM_STR);
    $this->db->bind(':postcode', $data['postcode'], PDO::PARAM_STR);
    $this->db->bind(':woonplaats', $data['woonplaats'], PDO::PARAM_STR);
    $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
    $this->db->bind(':mobiel', $data['mobiel'], PDO::PARAM_STR);

    return $this->db->execute();
}

}