<?php

    class NotaModel{
        public $NO_ID;
        public $NO_PRACTICA_N1;
        public $NO_PRACTICA_N2;
        public $NO_PRACTICA_N3;
        public $NO_PARCIAL;
        public $NO_FINAL;
        public $NO_PROMEDIO_FINAL;

        public $CU_ID;
        public $AL_ID;

        


        public function __construct(
            $NO_ID,$NO_PRACTICA_N1,$NO_PRACTICA_N2,$NO_PRACTICA_N3,$NO_PARCIAL, $NO_FINAL, $NO_PROMEDIO_FINAL,$CU_ID, $AL_ID){

            $this->set_no_id($NO_ID);
            $this->set_no_practica1($NO_PRACTICA_N1);
            $this->set_no_practica2($NO_PRACTICA_N2);
            $this->set_no_practica3($NO_PRACTICA_N3);
            $this->set_no_parcial($NO_PARCIAL);
            $this->set_no_final($NO_FINAL);
            $this->set_no_promedio_final($NO_PROMEDIO_FINAL);

            $this->set_no_cu_id($CU_ID);
            $this->set_no_al_id($AL_ID);

        }

        

        /*  SETTERS */

        public function set_no_id($NO_ID){
            $this->NO_ID = $NO_ID;
        }

        public function set_no_practica1($NO_PRACTICA_N1){
            $this->NO_PRACTICA_N1 = $NO_PRACTICA_N1;
        }

        public function set_no_practica2($NO_PRACTICA_N2){
            $this->NO_PRACTICA_N2 = $NO_PRACTICA_N2;
        }

        public function set_no_practica3($NO_PRACTICA_N3){
            $this->NO_PRACTICA_N3 = $NO_PRACTICA_N3;
        }

        public function set_no_parcial($NO_PARCIAL){
            $this->NO_PARCIAL = $NO_PARCIAL;
        }

        public function set_no_final($NO_FINAL){
            $this->NO_FINAL = $NO_FINAL;
        }

        public function set_no_promedio_final($NO_PROMEDIO_FINAL){
            $this->NO_PROMEDIO_FINAL = $NO_PROMEDIO_FINAL;
        }

        public function set_no_cu_id($CU_ID){
            $this->CU_ID = $CU_ID;
        }

        public function set_no_al_id($AL_ID){
            $this->AL_ID = $AL_ID;
        }





        /*  GETTERS */
        public function get_no_id(){
            return $this->NO_ID;
        }

        public function get_no_practica1(){
            return $this->NO_PRACTICA_N1;
        }

        public function get_no_practica2(){
            return $this->NO_PRACTICA_N2;
        }

        public function get_no_practica3(){
            return $this->NO_PRACTICA_N3;
        }

        public function get_no_parcial(){
            return $this->NO_PARCIAL;
        }

        public function get_no_final(){
            return $this->NO_FINAL;
        }

        public function get_no_promedio_final(){
            return $this->NO_PROMEDIO_FINAL;
        }

        public function get_no_cu_id(){
            return $this->CU_ID;
        }

        public function get_no_al_id(){
            return $this->AL_ID;
        }


        public function returnNotaAsArray(){
            $nota = array();

            $nota['NO_ID'] = $this->get_cu_id();
            $nota['NO_PRACTICA_N1'] = $this->get_no_practica1();
            $nota['NO_PRACTICA_N2'] = $this->get_no_practica2();
            $nota['NO_PRACTICA_N3'] = $this->get_no_practica3();
            $nota['NO_PARCIAL'] = $this->get_no_parcial();
            $nota['NO_FINAL'] = $this->get_no_final();

            $nota['CU_ID'] = $this->get_no_cu_id();
            $nota['AL_ID'] = $this->get_no_al_id();

            return $nota;
        }


        public function calcularPromedioFinal(){
            $promedioFinal = 0;
            $nota_practicas = ($this->get_no_practica1() + $this->get_no_practica2() + $this->get_no_practica3()) / 3;

            $nota_practicas = ((25)*$nota_practicas)/100 ;
            $nota_promedio =  ((25)*$this->get_no_parcial())/100 ;
            $nota_final = ((50)*$this->get_no_final())/100 ;

            $promedioFinal = $nota_practicas + $nota_promedio + $nota_final;

            $this->set_no_promedio_final($promedioFinal);
        }



    }

?>