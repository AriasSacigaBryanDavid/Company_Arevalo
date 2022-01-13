<?php

    class Ventas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['documentos']=$this->model->getDocumentos();
            $data['identidades']=$this->model->getIdentidades();
            $data['almacenes']=$this->model->getAlmacenes();
            $data['identidad']=$this->model->getIdentidades();
            $this->views->getView($this,"index",$data);
        }





    }
?>