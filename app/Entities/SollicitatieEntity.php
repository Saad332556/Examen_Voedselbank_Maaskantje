<?php
    /**
     * Database table Sollicitatie fields 
     */
    class LeverancierEntity
    {
        private int $Id;       
        
        private string $voornaam;    
        private string $voornaamError;

        private string $achternaam;    
        private string $achternaamError;

        private string $bedrijfsnaam;    
        private string $bedrijfsnaamError;

        private string $adres;    
        private string $adresError;

        private string $contactpersoon;     
        private string $contactpersoonError;

        private string $emailadres;
        private string $emailadresError;    

        private string $telefoonnummer;         
        private string $telefoonnummerError;  
        
        /**
         * Magic get generator property.
         * @param [type] $property
         * @return void
         */
        public function __get($property) 
        {
            if (property_exists($this, $property)) 
            {
                return $this->$property;
            }
        }
    
        /**
         * Magic set generator property.
         * @param [type] $property
         * @param [type] $value
         */
        public function __set($property, $value) 
        {
            if (property_exists($this, $property)) 
            {
                $this->$property = $value;
            }
        }
    }
?>