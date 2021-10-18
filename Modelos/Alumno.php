<?php

    class AlumnoModel{
        public $AL_ID;
        public $AL_NOMBRES;
        public $AL_APELLIDOS;
        public $AL_FECHA_NAC;
        public $AL_SEXO;
        public $AL_ESTADO;

        public function __construct(
            $AL_ID,$AL_NOMBRES,$AL_APELLIDOS,$AL_FECHA_NAC,$AL_SEXO,$AL_ESTADO
            ){

            $this->set_al_id($AL_ID);
            $this->set_al_nombres($AL_NOMBRES);
            $this->set_al_apellidos($AL_APELLIDOS);
            $this->set_al_fecha_nacimiento($AL_FECHA_NAC);
            $this->set_al_sexo($AL_SEXO);
            $this->set_al_estado($AL_ESTADO);
        }

        /*  GETTERS */
        public function get_al_id(){
            return $this->AL_ID;
        }

        public function get_al_nombres(){
            return $this->AL_NOMBRES;
        }

        public function get_al_apellidos(){
            return $this->AL_APELLIDOS;
        }

        public function get_al_fecha_nacimiento(){
            return $this->AL_FECHA_NAC;
        }

        public function get_al_sexo(){
            return $this->AL_SEXO;
        }

        public function get_al_estado(){
            return $this->AL_ESTADO;
        }

        /*  SETTERS */

        public function set_al_id($AL_ID){
            $this->AL_ID = $AL_ID;
        }

        public function set_al_nombres($AL_NOMBRES){
            $this->AL_NOMBRES = $AL_NOMBRES;
        }

        public function set_al_apellidos($AL_APELLIDOS){
            $this->AL_APELLIDOS = $AL_APELLIDOS;
        }

        public function set_al_fecha_nacimiento($AL_FECHA_NAC){
            $this->AL_FECHA_NAC = $AL_FECHA_NAC;
        }

        public function set_al_sexo($AL_SEXO){
            $this->AL_SEXO = $AL_SEXO;
        }

        public function set_al_estado($AL_ESTADO){
            $this->AL_ESTADO = $AL_ESTADO;
        }


        public function returnAlumnoAsArray(){
            $user = array();
            $user['AL_ID'] = $this->get_al_id();
            $user['AL_NOMBRES'] = $this->get_al_nombres();
            $user['AL_APELLIDOS'] = $this->get_al_apellidos();
            $user['AL_FECHA_NAC'] = $this->get_al_fecha_nacimiento();
            $user['AL_SEXO'] = $this->get_al_sexo();
            $user['AL_ESTADO'] = $this->get_al_estado();

            return $user;
        }


    }

?>