<?php
    class LeverancierHelper
    {
        /**
         * Create new empty Leverancier object.
         * @return LeverancierEntityViewModel
         */
        public static function createEmptyLeverancierObject() : LeverancierEntityViewModel
        {
            $newEmptyLeverancier = new LeverancierEntityViewModel();

            $newEmptyLeverancier->Id = 0;

            $newEmptyLeverancier->Voornaam = '';
            $newEmptyLeverancier->VoornaamError = '';

            $newEmptyLeverancier->Achternaam = '';
            $newEmptyLeverancier->AchternaamError = '';

            $newEmptyLeverancier->bedrijfsnaam = 0;
            $newEmptyLeverancier->bedrijfsnaamError ='';

            $newEmptyLeverancier->adres = '';
            $newEmptyLeverancier->adresError = '';

            $newEmptyLeverancier->contactpersoon = '';
            $newEmptyLeverancier->contactpersoonError = '';

            $newEmptyLeverancier->emailadres = '';
            $newEmptyLeverancier->emailadresError = '';

            $newEmptyLeverancier->telefoonnummer = 0;
            $newEmptyLeverancier->telefoonnummerError = '';

            return $newEmptyLeverancier;
        }

        /**
         * Map the selected database Leverancier row from to Leverancier object. 
         * @param mixed $selectedLeverancier
         * @return LeverancierEntityViewModel
         */
        public static function mapLeverancierRowToObject(mixed $selectedLeverancier) : LeverancierEntityViewModel
        {
            $modifiedLeverancier                               = new LeverancierEntityViewModel();

            $modifiedLeverancier->Id                           = $selectedLeverancier->Id;

            $modifiedLeverancier->Voornaam                     = $selectedLeverancier->Voornaam;
            $modifiedLeverancier->VoornaamError                = '';

            $modifiedLeverancier->Achternaam                   = $selectedLeverancier->Achternaam;
            $modifiedLeverancier->AchternaamError              = '';

            $modifiedLeverancier->bedrijfsnaam            = $selectedLeverancier->bedrijfsnaam;
            $modifiedLeverancier->bedrijfsnaamError       = '';

            $modifiedLeverancier->adres                  = $selectedLeverancier->adres;
            $modifiedLeverancier->adresError             = '';

            $modifiedLeverancier->contactpersoon                  = $selectedLeverancier->contactpersoon;
            $modifiedLeverancier->contactpersoonError             = '';

            $modifiedLeverancier->emailadres                       = $selectedLeverancier->emailadres;
            $modifiedLeverancier->emailadresError                  = '';

            $modifiedLeverancier->telefoonnummer                   = $selectedLeverancier->telefoonnummer;
            $modifiedLeverancier->telefoonnummerError              = '';

            return $modifiedLeverancier;
        }
        
        /**
         * Set the values of input fields from the view to Leverancier object.
         * @param [type] $inputPost
         * @param string $methodType
         * @return LeverancierEntityViewModel
         */
        public static function setInputLeverancierFieldsToLeverancierObject($inputPost, string $methodType) : LeverancierEntityViewModel
        {
            $Leverancier = new LeverancierEntityViewModel();
            
            if($methodType == 'update')
            {
                $Leverancier->Id = isset($inputPost['Id']) ? $inputPost['Id']: 0;
            }
            
            $Leverancier->Voornaam                     = trim($inputPost['Voornaam']);
            $Leverancier->VoornaamError                = '';

            $Leverancier->Achternaam                   = trim($inputPost['Achternaam']);
            $Leverancier->AchternaamError              = '';

            $Leverancier->bedrijfsnaam            = $inputPost['bedrijfsnaam'];
            $Leverancier->bedrijfsnaamError       = '';

            $Leverancier->adres                  = trim($inputPost['adres']);
            $Leverancier->adresError             = '';

            $Leverancier->contactpersoon                  = $inputPost['contactpersoon'];
            $Leverancier->contactpersoonError             = '';

            $Leverancier->emailadres                       = trim($inputPost['emailadres']);
            $Leverancier->emailadresError                  = '';

            $Leverancier->telefoonnummer                   = $inputPost['telefoonnummer'];
            $Leverancier->telefoonnummerError              = '';

            return $Leverancier;
        }
    }
?>