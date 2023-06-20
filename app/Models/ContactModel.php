<?php
class ContactModel
{
    private Database $Db;


    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }


    public function GetContacten(): array
    {
        try
        {
            // Use sql script to fetch all Magazijn from Magazijn database.
            $getAllMagazijnenQuery = "CALL spGetContacten()";

            $this->Db->query($getAllMagazijnenQuery);

            $result = $this->Db->resultSet();

            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR : Failed to get all Magazijn from database in class MagazijnModel method getMagazijnsUseSp!", 0);
            die('ERROR : Failed to get all Magazijn from database in class MagazijnModel method getMagazijncitatiesUseSp! ' . $ex->getMessage());
        }
    }

    
    public function GetContactenById(int $id)
    {
        try {

            // Call the stored procedure from the database.
            $getSelectedApplicant = "CALL spGetContactBijId(:prm_contactId)";

            $this->Db->query($getSelectedApplicant);
            $this->Db->bind(':prm_contactId', $id);
            $result = $this->Db->single();

            $ContactenById = ($result);

            return $ContactenById;
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById!", 0);
            die('ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById! ' . $ex->getMessage());
        }
    }


    public function UpdateUserDetails($selectedUser): bool
    {
        try
        {
            
                // Call the stored procedure from the database.
                $spQuery = "CALL spUpdateContact(  
                                                :id,
                                                :naam,
                                                :contactPersoon,
                                                :leverancierNummer, 
                                                :mobiel, 
                                                :straat, 
                                                :huisnummer, 
                                                :postcode, 
                                                :stad)";
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':id', $selectedUser['Id']);
                $this->Db->bind(':naam', $selectedUser['Naam']);
                $this->Db->bind(':contactPersoon', $selectedUser['ContactPersoon']);
                $this->Db->bind(':leverancierNummer', $selectedUser['LeverancierNummer']);
                $this->Db->bind(':mobiel', $selectedUser['Mobiel']);
                $this->Db->bind(':straat', $selectedUser['Straat']);
                $this->Db->bind(':huisnummer', $selectedUser['Huisnummer']);
                $this->Db->bind(':postcode', $selectedUser['Postcode']);
                $this->Db->bind(':stad', $selectedUser['Stad']);

                // Execute the query
                if ($this->Db->execute())
                {
                    error_log("INFO: Selected Sollicitatie has been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR: Selected Sollicitatie has not been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return false;
                }
        }
        catch (PDOException $ex)
        {
            error_log("ERROR: Failed to update the selected Sollicitatie by ID from the database in the AdminModel class method UpdateUserDetails!", 0);
            die('ERROR: Failed to update the selected Sollicitatie from the database in the AdminModel class method UpdateUserDetails! ' . $ex->getMessage());
        }
    }



}