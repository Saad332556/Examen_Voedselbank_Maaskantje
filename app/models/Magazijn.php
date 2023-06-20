<?php
class Magazijn
{
    //properties
    private $magazijnModel;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->magazijnModel = new Database();
    }

    public function getMagazijnen()
    {
        $this->magazijnModel->query('SELECT `Barcode`, `Naam`, `VerpakkingsEenheid`, `AantalAanwezig` FROM Product INNER JOIN Magazijn ON Product.Id = Magazijn.ProductId');
        return $this->magazijnModel->resultSet();
    }

    public function getMagazijn($id)
    {
        $this->magazijnModel->query("SELECT `Barcode`, `Naam`, `VerpakkingsEenheid`, `AantalAanwezig` FROM Product INNER JOIN Magazijn ON Product.Id = Magazijn.ProductId WHERE id = :id");
        $this->magazijnModel->bind(':id', $id, PDO::PARAM_INT);
        return $this->magazijnModel->single();
    }

    public function updateMagazijn($data)
    {
        // var_dump($data);exit();
        $this->magazijnModel->query("UPDATE Product
                          SET Barcode = :Barcode,
                              Naam = :Naam,
                              continent = :continent,
                              population = :population
                          WHERE id = :id");

        $this->magazijnModel->bind(':name', $data['name'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':capitalCity', $data['capitalCity'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':continent', $data['continent'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':population', $data['population'], PDO::PARAM_INT);
        $this->magazijnModel->bind(':id', $data['id'], PDO::PARAM_INT);

        return $this->magazijnModel->execute();
    }

    public function deleteCountry($id)
    {
        $this->magazijnModel->query("DELETE FROM Product WHERE id = :id");
        $this->magazijnModel->bind(':id', $id, PDO::PARAM_INT);
        return $this->magazijnModel->execute();
    }

    public function createCountry($post)
    {
        $this->magazijnModel->query("INSERT INTO Product (id, 
                                               name, 
                                               capitalCity, 
                                               continent, 
                                               population)
                          VALUES              (:id,
                                               :name,
                                               :capitalCity,
                                               :continent,
                                               :population)");
        $this->magazijnModel->bind(':id', NULL, PDO::PARAM_NULL);
        $this->magazijnModel->bind(':name', $post['name'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':capitalCity', $post['capitalCity'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':continent', $post['continent'], PDO::PARAM_STR);
        $this->magazijnModel->bind(':population', $post['population'], PDO::PARAM_INT);
        return $this->magazijnModel->execute();

    }


}