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
            $this->views->getView($this,"index",$data);
        }
        public function buscarCliente($cli){
            $data =$this->model->getNidentidad($cli);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function buscarCodigoVe($cod){
            $data =$this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }





    }
?>