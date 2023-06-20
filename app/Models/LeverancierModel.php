<?
class LeverancierModel
{
    private Database $Db;

    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }

    public function getLeveranciers() : array
        {
            try
            {
                // Use sql script to fetch all Sollicitaties from Sollicitatie database.
                $getAllSollicitatiesQuery = "CALL spGetSollicitaties()";

                $this->Db->query($getAllSollicitatiesQuery);

                $result = $this->Db->resultSet();

                return $result ?? [];
            }
            catch(PDOException $ex) 
            {
                error_log("ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp!", 0);
                die('ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp! '. $ex->getMessage());
            }
        }
}