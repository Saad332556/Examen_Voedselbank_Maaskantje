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
}