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

    public function getVoedselpakketten()
    {
        $this->db->query('SELECT Voedselpakket.id, Voedselpakket.pakketnummer, Voedselpakket.datum_samenstelling, Voedselpakket.datum_uitgifte, Product.aantal, Klant.naam 
                            FROM Voedselpakket
                            INNER JOIN Product ON Voedselpakket.id = Product.voedselpakket_id 
                            INNER JOIN Klant ON Voedselpakket.klant_id = Klant.id');
        return $this->db->resultSet();
    }

    public function getVoedselpakketById($id)
    {
        $this->db->query("SELECT voedselpakket.id, aantal 
                            FROM Product
                            INNER JOIN Voedselpakket ON Voedselpakket.id = Product.voedselpakket_id 
                            WHERE voedselpakket.id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateVoedselpakket($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE Product
                              SET aantal = :aantal
                              WHERE id = :id");
        $this->db->bind(':aantal', $data['aantal'], PDO::PARAM_INT);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteVoedselpakket($id)
    {
        $this->db->query("DELETE Voedselpakket, Product, Klant 
                          FROM Voedselpakket 
                          INNER JOIN Product ON Voedselpakket.id = Product.voedselpakket_id 
                          INNER JOIN Klant ON Voedselpakket.klant_id = Klant.id 
                          WHERE Voedselpakket.id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createVoedselpakket($post)
    {
        $this->db->query("INSERT INTO Klant (naam) 
                          VALUES (:naam)");

        $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
        $this->db->execute();

        $this->db->query("INSERT INTO Voedselpakket (klant_id, pakketnummer, datum_samenstelling, datum_uitgifte)
                          VALUES (LAST_INSERT_ID(), :pakketnummer, :datum_samenstelling, :datum_uitgifte)");

        $this->db->bind(':pakketnummer', $post['pakketnummer'], PDO::PARAM_INT);
        $this->db->bind(':datum_samenstelling', $post['datum_samenstelling'], PDO::PARAM_STR);
        $this->db->bind(':datum_uitgifte', $post['datum_uitgifte'], PDO::PARAM_STR);
        $this->db->execute();

        $this->db->query("INSERT INTO Product (voedselpakket_id, aantal) 
                          VALUES (LAST_INSERT_ID(), :aantal)");

        $this->db->bind(':aantal', $post['aantal'], PDO::PARAM_INT);
        $this->db->execute();

        return true;
    }

}