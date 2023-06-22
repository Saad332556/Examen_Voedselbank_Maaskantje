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

    public function getGefilterdePakketten($eetwens)
    {
        try {
            // Nu wil ik filteren op Eetwens dus hebben we ook EetwensPerGezin nodig en het Eetwens is dan EetwensPerGezin.EetwensId
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
                END AS IsVertegenwoordiger,
                EetwensPerGezin.EetwensId
            FROM
                Gezin
                INNER JOIN (
                    SELECT DISTINCT GezinId, IsVertegenwoordiger
                    FROM Persoon
                ) AS Persoon ON Gezin.Id = Persoon.GezinId
                INNER JOIN EetwensPerGezin ON Gezin.Id = EetwensPerGezin.GezinId
                INNER JOIN Eetwens ON EetwensPerGezin.EetwensId = Eetwens.Id
            WHERE
                Eetwens.Id = :eetwens');
    
            $this->db->bind(':eetwens', $eetwens);
            return $this->db->resultSet();
        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error, show an error message)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function getVoedselpakketten()
{
    try {
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
            ) AS Persoon ON Gezin.Id = Persoon.GezinId');

        return $this->db->resultSet();
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, show an error message)
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function getVoedselpakketById($id)
{
    try {
        $this->db->query("SELECT Gezin.id, Gezin.Naam, Gezin.Omschrijving, Gezin.TotaalAantalPersonen, Voedselpakket.PakketNummer, Voedselpakket.DatumSamenstelling, Voedselpakket.DatumUitgifte, Voedselpakket.Status, ProductPerVoedselpakket.AantalProductEenheden, ProductPerVoedselpakket.id AS Ideetje FROM Gezin INNER JOIN Voedselpakket ON Gezin.id = Voedselpakket.GezinId INNER JOIN ProductPerVoedselpakket ON Voedselpakket.id = ProductPerVoedselpakket.VoedselpakketId WHERE Gezin.id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->resultSet();
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, show an error message)
        echo "Error: " . $e->getMessage();
        return false;
    }
}


public function getVoedselpakketViaIdSimple($id)
{
    try {
        $this->db->query("SELECT Voedselpakket.id, Voedselpakket.Status FROM Voedselpakket WHERE Voedselpakket.id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, show an error message)
        echo "Error: " . $e->getMessage();
        return false;
    }
}

public function updateStatus($id, $status)
{
    try {
        $this->db->query("UPDATE Voedselpakket SET Status = :status WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        $this->db->bind(':status', $status, PDO::PARAM_STR);

        if ($this->db->execute() === false) {
            return false;
        }

        return true;
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, show an error message)
        echo "Error: " . $e->getMessage();
        return false;
    }
  }
  
}
