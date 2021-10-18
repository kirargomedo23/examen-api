<?php

    require_once('../Interfaces/MetodoDatabase.php');

    class NotaDAO implements IMetodoDatabase {
        
        private $database;

        public function __construct($database){
            $this->database =  $database;
        }

        public function crear($nota){
            $resultado = array();


            $query = $this->database->prepare('INSERT INTO ap_argomedo_orlando_notas(NO_PRACTICA_N1, NO_PRACTICA_N2, NO_PRACTICA_N3, NO_PARCIAL, NO_FINAL, NO_PROMEDIO_FINAL,CU_ID, AL_ID) VALUES (?,?,?,?,?,?,?,?)');

            $query->bindParam(1, $nota->NO_PRACTICA_N1, PDO::PARAM_STR);
            $query->bindParam(2, $nota->NO_PRACTICA_N2, PDO::PARAM_STR);
            $query->bindParam(3, $nota->NO_PRACTICA_N3, PDO::PARAM_STR);
            $query->bindParam(4, $nota->NO_PARCIAL, PDO::PARAM_STR);
            $query->bindParam(5, $nota->NO_FINAL, PDO::PARAM_STR);
            $query->bindParam(6, $nota->NO_PROMEDIO_FINAL, PDO::PARAM_STR);

            $query->bindParam(7, $nota->CU_ID, PDO::PARAM_INT );
            $query->bindParam(8, $nota->AL_ID, PDO::PARAM_INT  );    
            
            
            $query->execute();
            $rowCount = $query->rowCount();

            return $rowCount;

        }

        public function editar($nota){}

        public function eliminar($id){ }

        public function obtenerPorID($id){
            $resultado = array();
            $data = array();


            $query = $this->database->prepare('SELECT A.AL_NOMBRES, A.AL_APELLIDOS, C.CU_DESCRIPCION, N.NO_PROMEDIO_FINAL FROM ap_argomedo_orlando_cursos AS C
            INNER JOIN ap_argomedo_orlando_notas AS N ON (C.CU_ID = N.CU_ID)
            INNER JOIN examen.ap_argomedo_orlando_alumnos AS A ON (A.AL_ID = N.AL_ID)
            WHERE N.AL_ID = ?;');

            $query->bindParam(1, $id, PDO::PARAM_INT);
            $query->execute();

            $rowCount = $query->rowCount();
            $row = $query->fetchAll(PDO::FETCH_OBJ);

            if($rowCount>0){
                $resultado = $row;
            }else{
                $resultado = null;
            }

            return $resultado;
        }

        public function listar(){}

        

    }

?>