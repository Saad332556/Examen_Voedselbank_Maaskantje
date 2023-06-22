<?php
    class DateTimeHelper
    {
        public static function GetDateTimeNow()
        {
            $date = new DateTime();
            return $date->format('Y-m-d H:i:s');
        }

        public static function ConvertStringDateTimeToStringDate($strDate)
        {
            $timestamp = strtotime($strDate);
            $date      = date("Y-m-d H:i:s", $timestamp);
           // return $date->format('Y-m-d');
            return $date;
        }
    }
?>