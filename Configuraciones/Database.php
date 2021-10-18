<?php

    class DataBase{

        private static $DBConnection;
  
        public static function connectDB(){
            if(self::$DBConnection === null){ 

                self::$DBConnection = new PDO('mysql:host=127.0.0.1;dbname=examen;charset=utf8', 'root', 'root');

                self::$DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$DBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }

            return self::$DBConnection;
        }


    }

?>