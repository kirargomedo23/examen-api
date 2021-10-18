<?php

    interface IMetodoDatabase{
        public function crear($model);
        public function editar($model);
        public function eliminar($id);
        public function obtenerPorID($id);
        public function listar();
    }

?>