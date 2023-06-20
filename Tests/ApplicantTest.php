<?php
    class SollicitatieValidator
    {
        /**
         * Set the values of input fields from the view to Sollicitatie object.
         * @param [type] $inputPost
         * @param string $methodType
         * @return SollicitatieEntity
         */
        public static function setInputSollicitatieFieldsToSollicitatieObject($inputPost, string $methodType) : SollicitatieEntity
        {
            $Sollicitatie = new SollicitatieEntity();
            
            if($methodType == 'update')
            {
                $Sollicitatie->Id = isset($inputPost['Id']) ? $inputPost['Id']: 0;
            }
            
            $Sollicitatie->SollicitatieNumber             = $inputPost['SollicitatieNumber'];
            $Sollicitatie->SollicitatieNumberError        = '';

            $Sollicitatie->Gender                      = $inputPost['Genders'];
            $Sollicitatie->GenderError                 = '';

            // De rest van der velden moeten toegevoegd worden

            return $Sollicitatie;
        }
    }
?>