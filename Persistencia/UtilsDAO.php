<?php

    class UtilsDAO  {
        
        private $database;

        public function __construct($database){
            $this->database =  $database;
        }

        public function obtenerUltimoID(){
            $query1 = $this->database->prepare('SELECT LAST_INSERT_ID() AS V_SER_ID');
            $query1->execute();

            $rowCount = $query1->fetchColumn();

            return $rowCount;

        }

    }

?>