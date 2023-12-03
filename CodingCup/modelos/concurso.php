<?php
    class concurso {
        public $id;
        public $nombre;
        public $fechaInicio;
        public $fechaFin; 
        public $estado;

        public function __construct(){
            $this->fechaInicio=new DateTime();
            $this->fechaFin=new DateTime();
        }
    }
    
?>