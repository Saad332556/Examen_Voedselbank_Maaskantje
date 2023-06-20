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

    public function updateLeverancierUseSPMySql($selectedLeverancier) : bool
        {  
            try 
            {
                // Call sp from database Leverancier.
                $spQuery = "CALL spUpdateLeverancier(   :id	
                                                        ,:voornaam			
                                                        ,:achternaam	
                                                        ,:bedrijfsnaam	
                                                        ,:adres		
                                                        ,:contactpersoon		
                                                        ,:emailadres			
                                                        ,:telefoonnummer";			
                
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':id', $selectedLeverancier->Id);
                $this->Db->bind(':voornaam', $selectedLeverancier->Voornaam);
                $this->Db->bind(':achternaam', $selectedLeverancier->Achternaam);
                $this->Db->bind(':bedrijfsnaam', $selectedLeverancier->bedrijfsnaam);
                $this->Db->bind(':adres', $selectedLeverancier->adres);
                $this->Db->bind(':contactpersoon', $selectedLeverancier->contactpersoon);
                $this->Db->bind(':emailadres', $selectedLeverancier->emailadres);
                $this->Db->bind(':telefoonnummer', $selectedLeverancier->telefoonnummer);
                
                // Execute function
                if ($this->Db->execute()) 
                {
                    error_log("INFO : Selected Leverancier has been modified in class LeverancierModel method updateLeverancierUseSP!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR : Selected Leverancier has been not modified in class LeverancierModel method updateLeverancierUseSP!", 0);
                    return false;
                }
            } 
                catch(PDOException $ex) 
                {
                    error_log("ERROR : Failed to update selected Leverancier by id from database in class LeverancierModel method updateLeverancierUseSP!", 0);
                    die('ERROR : Failed to update selected Leverancier from database in class LeverancierModel method updateLeverancierUseSP! '. $ex->getMessage());
                }
       }



}