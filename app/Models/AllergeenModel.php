<?php
class AllergeenModel
{
    private Database $Db;

    public function __construct(Database $db = null)
    {
        if ($db === null) {
            $db = new Database();
        }
        $this->Db = $db;
    }

    public function GetKlantAllergie(): array
    {
        try
        {
            // Use SQL script to fetch all Magazijn from Magazijn database.
            $getAllMAllergieQuery = "CALL spGetKlantAllergie()";

            $this->Db->query($getAllMAllergieQuery);

            $result = $this->Db->resultset();

            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get all Magazijn from the database in class MagazijnModel method getMagazijnsUseSp!", 0);
            die('ERROR: Failed to get all Magazijn from the database in class MagazijnModel method getMagazijncitatiesUseSp! ' . $ex->getMessage());
        }
    }

    public function GetKlantAllergieById(int $id)
    {
        try {

            // Call the stored procedure from the database.
            $getSelectedKlant = "CALL spGetKlantAllergieById(:prm_klantId)";

            $this->Db->query($getSelectedKlant);
            $this->Db->bind(':prm_klantId', $id);
            $result = $this->Db->single();

            $KlantById = $result;

            return $KlantById;
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById!", 0);
            die('ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById! ' . $ex->getMessage());
        }
    }
    public function UpdateKlantAllergie($selectedUser): bool
    {
        try {
            // Call the stored procedure from the database.
            $spQuery = "CALL spUpdateKlantAllergie(:klant_id, :allergeen_id)";
            $this->Db->query($spQuery);
            
            // Bind values
            $this->Db->bind(':klant_id', $selectedUser['Id']);
            $this->Db->bind(':allergeen_id', $selectedUser['allergeen_id']);
            
    
            // Execute the query
            if ($this->Db->execute()) {
                error_log("INFO: Selected Klant's allergie has been updated in the UpdateKlantAllergie function!", 0);
                return true;
            } else {
                error_log("ERROR: Failed to update the selected Klant's allergie in the UpdateKlantAllergie function!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to update the selected Klant's allergie from the database in the UpdateKlantAllergie function!", 0);
            die('ERROR: Failed to update the selected Klant\'s allergie from the database in the UpdateKlantAllergie function! ' . $ex->getMessage());
        }
    }

    public function createCreateAllergiel($newAllergeen): bool
    {
        try {
            // Create new Allergeen in database.
            $spQuery = "CALL spCreateAllergie(:p_klant_id, :p_allergeen_id)";
            
            $this->Db->query($spQuery);
    
            // Bind values
            $this->Db->bind(':p_klant_id', $newAllergeen['Klanten']);
            $this->Db->bind(':p_allergeen_id', $newAllergeen['Allergie']);
    
            // Execute function
            if ($this->Db->execute()) {
                error_log("INFO: New Allergeen has been created in class AllergeenModel method createCreateAllergiel!", 0);
                return true;
            } else {
                error_log("ERROR: Failed to create new Allergeen in class AllergeenModel method createCreateAllergiel!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to create new Allergeen in database in class AllergeenModel method createCreateAllergiel!", 0);
            die('ERROR: Failed to create new Allergeen in database in class AllergeenModel method createCreateAllergiel ' . $ex->getMessage());
        }
    }


    
    public function DeleteAllergie(int $id): bool
    {
        try {
            // Delete the selected Allergie from the database using the stored procedure.
            $spQuery = "CALL spDeleteProductAllergeenMapping(:mapping_id)";
            
            $this->Db->query($spQuery);
            $this->Db->bind(':mapping_id', $id);
    
            // Execute the stored procedure
            if ($this->Db->execute()) {
                error_log("INFO: Selected Allergie has been deleted in class AllergeenModel method DeleteAllergie!", 0);
                return true;
            } else {
                error_log("ERROR: Selected Allergie has not been deleted in class AllergeenModel method DeleteAllergie!", 0);
                return false;
            }
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to delete the selected Allergie in the database in class AllergeenModel method DeleteAllergie!", 0);
            die('ERROR: Failed to delete the selected Allergie in the database in class AllergeenModel method DeleteAllergie ' . $ex->getMessage());
        }
    }
    
    
    
    
}
