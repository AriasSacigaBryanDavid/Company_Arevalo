<?php
    class Entradas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['documentos']=$this->model->getDocumentos();
            $data['almacenes']=$this->model->getAlmacenes();
            $data['identidad']=$this->model->getIdentidades();
            $this->views->getView($this,"index", $data);
        }
        public function buscarProveedor($pro){
            $data =$this->model->getNidentidad($pro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function buscarCodigoEn($cod){
            $data =$this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function ingresar(){
            
            print_r($_POST);
            
        }
        



    }


?>