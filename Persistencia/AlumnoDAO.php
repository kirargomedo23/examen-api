<?php

    require_once('../Interfaces/MetodoDatabase.php');
    require_once('../Modelos/Alumno.php');

    class AlumnoDAO implements IMetodoDatabase {
        
        private $database;

        public function __construct($database){
            $this->database =  $database;
        }

        public function crear($alumno){
            $query = $this->database->prepare('INSERT INTO ap_argomedo_orlando_alumnos(AL_NOMBRES, AL_APELLIDOS, AL_FECHA_NAC,AL_SEXO,AL_ESTADO) VALUES (?,?,?,?,?)');

            $query->bindParam(1, $alumno->AL_NOMBRES, PDO::PARAM_STR);
            $query->bindParam(2, $alumno->AL_APELLIDOS, PDO::PARAM_STR);
            $query->bindParam(3, $alumno->AL_FECHA_NAC, PDO::PARAM_STR); 
            $query->bindParam(4, $alumno->AL_SEXO, PDO::PARAM_STR);
            $query->bindParam(5, $alumno->AL_ESTADO, PDO::PARAM_BOOL );
            
            
            $query->execute();

            $rowCount = $query->rowCount();

            return $rowCount;

        }

        public function editar($alumno){
            $query = $this->database->prepare('UPDATE ap_argomedo_orlando_alumnos 
                SET AL_NOMBRES = ?,
                AL_APELLIDOS = ?,
                AL_FECHA_NAC = ?,
                AL_SEXO = ?
                WHERE AL_ID = ?');
            $query->bindParam(1, $alumno->AL_NOMBRES, PDO::PARAM_STR);
            $query->bindParam(2, $alumno->AL_APELLIDOS, PDO::PARAM_STR);             
            $query->bindParam(3, $alumno->AL_FECHA_NAC, PDO::PARAM_STR);             
            $query->bindParam(4, $alumno->AL_SEXO, PDO::PARAM_STR);             
            $query->bindParam(5, $alumno->AL_ID, PDO::PARAM_INT);             

            $query->execute();

            $rowCount = $query->rowCount();

            return $rowCount;
        }

        public function eliminar($id){
            $query = $this->database->prepare('UPDATE ap_argomedo_orlando_alumnos SET AL_ESTADO = 0 WHERE AL_ID = ?');
            $query->bindParam(1, $id, PDO::PARAM_INT);             
            $query->execute();

            $rowCount = $query->rowCount();

            return $rowCount;
        }

        public function obtenerPorID($id){
            $resultado = array();
            $query = $this->database->prepare('SELECT *FROM ap_argomedo_orlando_alumnos WHERE AL_ID = ?');
            $query->bindParam(1, $id, PDO::PARAM_INT);             

            $query->execute();

            $rowCount = $query->rowCount();
            $row = $query->fetchAll();

            if($rowCount>0){
                foreach($row as $result){
                    $alumno = new AlumnoModel($result['AL_ID'], $result['AL_NOMBRES'], $result['AL_APELLIDOS'], $result['AL_FECHA_NAC'], $result['AL_SEXO'], $result['AL_ESTADO']);
                    $resultado[] = $alumno->returnAlumnoAsArray();
                }
            }else{
                $resultado = null;
            }

            return $resultado;
        }

        public function listar(){
            $resultado = array();
            $query = $this->database->prepare('SELECT *FROM ap_argomedo_orlando_alumnos');      
            $query->execute();

            $rowCount = $query->rowCount();
            $row = $query->fetchAll();

            if($rowCount>0){
                foreach($row as $result){
                    $alumno = new AlumnoModel($result['AL_ID'], $result['AL_NOMBRES'], $result['AL_APELLIDOS'], $result['AL_FECHA_NAC'], $result['AL_SEXO'], $result['AL_ESTADO']);
                    $resultado[] = $alumno->returnAlumnoAsArray();
                }
            }else{
                $resultado = null;
            }

            return $resultado;
        }

    }

?>