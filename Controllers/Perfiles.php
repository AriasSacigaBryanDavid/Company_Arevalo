<?php
    class Perfiles extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $data= $this->model->getPerfil($id_usuario);
            $this->views->getView($this,"index",$data);
            
        }
         
         
    }

?>