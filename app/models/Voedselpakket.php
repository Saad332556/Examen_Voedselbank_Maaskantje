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
          $this->db->query('SELECT
          Gezin.id,
          Gezin.Naam,
          Gezin.Omschrijving,
          Gezin.AantalVolwassenen,
          Gezin.AantalKinderen,
          Gezin.AantalBabys,
          CASE Persoon.IsVertegenwoordiger
            WHEN 1 THEN "ja"
            WHEN 0 THEN "nee"
          END AS IsVertegenwoordiger
        FROM
          Gezin
          INNER JOIN (
            SELECT DISTINCT GezinId, IsVertegenwoordiger
            FROM Persoon
          ) AS Persoon ON Gezin.Id = Persoon.GezinId;      
        ');
          return $this->db->resultSet();
      }

      public function getVoedselpakketById($id)
      {
          $this->db->query("SELECT Gezin.id, Gezin.Naam,Gezin.Omschrijving, 
          Gezin.TotaalAantalPersonen,Voedselpakket.PakketNummer,
          Voedselpakket.DatumSamenstelling, Voedselpakket.DatumUitgifte, Voedselpakket.Status, 
          ProductPerVoedselpakket.AantalProductEenheden
          FROM Gezin inner join Voedselpakket on Gezin.id = Voedselpakket.GezinId
          inner join ProductPerVoedselpakket on Voedselpakket.id = ProductPerVoedselpakket.VoedselpakketId
          WHERE Gezin.id = :id");
          $this->db->bind(':id', $id, PDO::PARAM_INT);
          return $this->db->resultSet();
      }

      public function updateStatus($data)
      {
          $this->db->query("UPDATE Voedselpakket
                            SET Status = :status
                            WHERE id = :id");
          $this->db->bind(':status', $data['status'], PDO::PARAM_STR);
          $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

          return $this->db->execute();
      }
    

      // public function updateVoedselpakket($data)
      // {
      //     // var_dump($data);exit();
      //     $this->db->query("UPDATE Product
      //                           SET aantal = :aantal
      //                           WHERE id = :id");
      //     $this->db->bind(':aantal', $data['aantal'], PDO::PARAM_INT);
      //     $this->db->bind(':id', $data['id'], PDO::PARAM_INT);

      //     return $this->db->execute();
      // }

      // public function deleteVoedselpakket($id)
      // {
      //     $this->db->query("DELETE Voedselpakket, Product, Klant 
      //                       FROM Voedselpakket 
      //                       INNER JOIN Product ON Voedselpakket.id = Product.voedselpakket_id 
      //                       INNER JOIN Klant ON Voedselpakket.klant_id = Klant.id 
      //                       WHERE Voedselpakket.id = :id");
      //     $this->db->bind(':id', $id, PDO::PARAM_INT);
      //     return $this->db->execute();
      // }

      // public function createVoedselpakket($post)
      // {
      //     $this->db->query("INSERT INTO Klant (naam) 
      //                       VALUES (:naam)");

      //     $this->db->bind(':naam', $post['naam'], PDO::PARAM_STR);
      //     $this->db->execute();

      //     $this->db->query("INSERT INTO Voedselpakket (klant_id, pakketnummer, datum_samenstelling, datum_uitgifte)
      //                       VALUES (LAST_INSERT_ID(), :pakketnummer, :datum_samenstelling, :datum_uitgifte)");

      //     $this->db->bind(':pakketnummer', $post['pakketnummer'], PDO::PARAM_INT);
      //     $this->db->bind(':datum_samenstelling', $post['datum_samenstelling'], PDO::PARAM_STR);
      //     $this->db->bind(':datum_uitgifte', $post['datum_uitgifte'], PDO::PARAM_STR);
      //     $this->db->execute();

      //     $this->db->query("INSERT INTO Product (voedselpakket_id, aantal) 
      //                       VALUES (LAST_INSERT_ID(), :aantal)");

      //     $this->db->bind(':aantal', $post['aantal'], PDO::PARAM_INT);
      //     $this->db->execute();

      //     return true;
      // }

  }