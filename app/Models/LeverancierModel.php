<?php

class LeverancierModel
{
    private Database $Db;

    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }

    public function GetLeveranciers()
    {
        try{
        $getLeveranciers = "CALL spGetLeveranciers()";

        $this->Db->query($getLeveranciers);

        $result = $this->Db->resultSet();

        return $result ?? [];
    }
    catch(PDOException $ex) 
    {
        error_log("ERROR : Failed to get all Leveranciers from database in class LeverancierModel method getLeveranciersUseSp!", 0);
        die('ERROR : Failed to get all Leveranciers from database in class LeverancierModel method getLeveranciersUseSp! '. $ex->getMessage());
    }
    }

    public function GetLeveranciersById(int $id) 
    {
        try
        {
            $getLeveranciersById = "CALL spGetLeverancierById(:id)";

            $this->Db->query($getLeveranciersById);
            
            $this->Db->bind(':id', $id);
            
            $result = $this->Db->single();

            $LeverancierObj = $result;
                
            return $LeverancierObj;
        }
        catch(PDOException $ex)
            {
                error_log("ERROR : Failed to get Leverancier by id from database in class LeverancierModel method getLeverancierByIdUseSP!", 0);
                die('ERROR : Failed to get Leverancier by id from database in class LeverancierModel method getLeverancierByIdUseSP! '. $ex->getMessage());
            }
    }
}