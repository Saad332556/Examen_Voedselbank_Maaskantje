<?php
    class LeverancierValidator
    {
        /**
         * Validat all the input fields of Leverancier for the create or update views.
         * @param LeverancierEntityViewModel $data
         * @return boolean
         */
        public static function validateLeverancierInputFields(LeverancierEntityViewModel $data) : bool
        {            
            try
            {
                $isViewValid = false;

                // Voornaam validatie.
                if (empty("$data->Voornaam")) 
                {
                    $data->VoornaamError = 'Voer voornaam in.';
                }
                elseif(!is_string($data->Voornaam))
                {
                    $data->VoornaamError = 'Voornaam is onjuiste tekst formaat.';
                }  
                elseif(strlen($data->Voornaam) > 50)
                {
                    $data->VoornaamError = 'Voornaam is te lang!.';
                }

                // Achternaam validatie.
                if (empty("$data->Achternaam")) 
                {
                    $data->AchternaamError = 'Voer achternaam in.';
                } 
                elseif(!is_string($data->Achternaam))
                {
                    $data->AchternaamError = 'Achternaam is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->Achternaam) > 50)
                {
                    $data->AchternaamError = 'Achternaam is te lang!.';
                }

                // Validate fields
                // Leverancier nummer validatie.
                if (is_null($data->Bedrijfsnaam)) 
                {
                    $data->BedrijfsnaamError = 'Voer Leverancier nummer in.';
                }
                elseif(!is_string($data->Bedrijfsnaam)) 
                {
                    $data->BedrijfsnaamError = 'Sollicitant nummer is onjuiste tekst formaat.';
                }

                // adres validatie.
                if (empty("$data->adres")) 
                {
                    $data->adresError = 'Voer adres in.';
                } 
                elseif(!is_string($data->adres))
                {
                    $data->adresError = 'adres is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->adres) > 50)
                {
                    $data->adresError = 'adres is te lang!.';
                }

                // contactpersoon validatie.
                if (empty("$data->contactpersoon")) 
                {
                    $data->contactpersoonError = 'Voer contactpersoon in.';
                } 
                elseif(!is_string($data->contactpersoon))
                {
                    $data->contactpersoonError = 'contactpersoon is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->contactpersoon) > 200)
                {
                    $data->contactpersoonError = 'contactpersoon is te lang!.';
                }

                // emailadres validation.
                if (empty("$data->emailadres")) 
                {
                    $data->emailadresError = 'Voer emailadres in.';
                } 
                elseif(!is_string($data->emailadres))
                {
                    $data->emailadresError = 'emailadres is onjuiste tekst formaat.';
                }
                elseif(strlen($data->emailadres) > 50)
                {
                    $data->emailadresError = 'emailadres is te lang!.';
                }

                // telefoonnummer validation.
                if (is_null($data->telefoonnummer)) 
                {
                    $data->telefoonnummerError = 'Voer telefoonnummer in.';
                } 
                elseif(!is_string($data->telefoonnummer))
                {
                    $data->telefoonnummerError = 'telefoonnummer is onjuiste nummer formaat.';
                }

                $isVoornaamErrorEmpty           = empty("$data->VoornaamError");
                $isAchternaamErrorEmpty         = empty("$data->AchternaamError");
                $isBedrijfsnaamErrorEmpty  = empty("$data->BedrijfsnaamError");
                $isadresErrorEmpty        = empty("$data->adresError");
                $iscontactpersoonErrorEmpty        = empty("$data->contactpersoonError");
                $isemailadresErrorEmpty             = empty("$data->emailadresError");
                $istelefoonnummerErrorEmpty         = empty("$data->telefoonnummerError");

                if (   $isVoornaamErrorEmpty         
                    && $isAchternaamErrorEmpty       
                    && $isBedrijfsnaamErrorEmpty
                    && $isadresErrorEmpty      
                    && $iscontactpersoonErrorEmpty      
                    && $isemailadresErrorEmpty           
                    && $istelefoonnummerErrorEmpty)
                {
                    $isViewValid = true;
                } 
                return $isViewValid;
            }
            catch(Exception $ex)
            {
                error_log("Failed to valide selected Leverancier in class LeverancierValidator->validatLeverancierInputFields!", 0);
            }
        }
    }
?>