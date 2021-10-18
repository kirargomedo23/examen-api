<?php

    require_once('../Interfaces/MetodoDatabase.php');
    require_once('../Modelos/Curso.php');


    class CursoDAO implements IMetodoDatabase  {
        
        private $database;

        public function __construct($database){
            $this->database =  $database;
        }

        public function crear($curso){}

        public function editar($curso){ }

        public function eliminar($id){ }

        public function obtenerPorID($id){ }

        public function listar(){
            $resultado = array();
            $query = $this->database->prepare('SELECT *FROM ap_argomedo_orlando_cursos WHERE CU_OBLIGATORIEDAD = 1;');      
            $query->execute();

            $rowCount = $query->rowCount();
            $row = $query->fetchAll();

            if($rowCount>0){
                foreach($row as $result){
                    $curso = new CursoModel($result['CU_ID'], $result['CU_NOMBRE'], $result['CU_DESCRIPCION'], $result['CU_OBLIGATORIEDAD']);
                    $resultado[] = $curso->returnCursoAsArray();
                }
            }else{
                $resultado = null;
            }

            return $resultado;
        }

    }

?>