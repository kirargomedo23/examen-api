<?php

    class CursoModel{

        public $CU_ID;
        public $CU_NOMBRE;
        public $CU_DESCRIPCION;
        public $CU_OBLIGATORIEDAD;

        public function __construct(
            $CU_ID,$CU_NOMBRE,$CU_DESCRIPCION,$CU_OBLIGATORIEDAD){

            $this->set_cu_id($CU_ID);
            $this->set_cu_nombre($CU_NOMBRE);
            $this->set_cu_descripcion($CU_DESCRIPCION);
            $this->set_cu_obligatoriedad($CU_OBLIGATORIEDAD);
        }

        

        /*  SETTERS */

        public function set_cu_id($CU_ID){
            $this->CU_ID = $CU_ID;
        }

        public function set_cu_nombre($CU_NOMBRE){
            $this->CU_NOMBRE = $CU_NOMBRE;
        }

        public function set_cu_descripcion($CU_DESCRIPCION){
            $this->CU_DESCRIPCION = $CU_DESCRIPCION;
        }

        public function set_cu_obligatoriedad($CU_OBLIGATORIEDAD){
            $this->CU_OBLIGATORIEDAD = $CU_OBLIGATORIEDAD;
        }




        /*  GETTERS */
        public function get_cu_id(){
            return $this->CU_ID;
        }

        public function get_cu_nombre(){
            return $this->CU_NOMBRE;
        }

        public function get_cu_descripcion(){
            return $this->CU_DESCRIPCION;
        }

        public function get_cu_obligatoriedad(){
            return $this->CU_OBLIGATORIEDAD;
        }


        public function returnCursoAsArray(){
            $curso = array();
            $curso['CU_ID'] = $this->get_cu_id();
            $curso['CU_NOMBRE'] = $this->get_cu_nombre();
            $curso['CU_DESCRIPCION'] = $this->get_cu_descripcion();
            $curso['CU_OBLIGATORIEDAD'] = $this->get_cu_obligatoriedad();

            return $curso;
        }


    }

?>