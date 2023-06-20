<?php

/**
 * Dit is de model voor de controller Voedselpakket
 */

class Voedselpakket
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoedselpakketten()
    {
        $this->db->query('SELECT pakketnummer, datum_samenstelling, datum_uitgifte FROM voedselpakket');
        return $this->db->resultSet();
    }

    public function getVoedselpakketById($id)
    {
        $this->db->query("SELECT * FROM country WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function updateVoedselpakket($data)
    {
        // var_dump($data);exit();
        $this->db->query("UPDATE country
                          SET Name = :Name,
                              capitalCity = :capitalCity,
                              continent = :continent,
                              population = :population
                          WHERE id = :id");

        $this->db->bind(':name', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':capitalCity', $data['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':continent', $data['continent'], PDO::PARAM_STR);
        $this->db->bind(':population', $data['population'], PDO::PARAM_INT);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function deleteVoedselpakket($id)
    {
        $this->db->query("DELETE FROM country WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }

    public function createVoedselpakket($post)
    {
        $this->db->query("INSERT INTO country (id, 
                                               name, 
                                               capitalCity, 
                                               continent, 
                                               population)
                          VALUES              (:id,
                                               :name,
                                               :capitalCity,
                                               :continent,
                                               :population)");
        $this->db->bind(':id', NULL, PDO::PARAM_NULL);
        $this->db->bind(':name', $post['name'], PDO::PARAM_STR);
        $this->db->bind(':capitalCity', $post['capitalCity'], PDO::PARAM_STR);
        $this->db->bind(':continent', $post['continent'], PDO::PARAM_STR);
        $this->db->bind(':population', $post['population'], PDO::PARAM_INT);
        return $this->db->execute();

    }


}