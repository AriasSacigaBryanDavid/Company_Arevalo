<?php
    class Identidades extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $this->views->getView($this,"index");
        }

        public function listar(){
            $data = $this->model->getIdentidades();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarIden('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarIden('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarIden('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
                    
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar(){
            $nombre=$_POST['nombre'];
            $id=$_POST['id'];
            if(empty($nombre)){
                $msg="Todos los campos son obligatorios";
            }else{
                if ($id== "") {
                    $data=$this->model->registrarIdentidad($nombre);
                    if($data == "ok") {
                        $msg="si";
                    }else if($data == "existe"){ 
                        $msg="La identidad ya existe";
                    } else {
                        $msg="Error al registrar la identidad";
                    }
                }else {
                    $data=$this->model->modificarIdentidad($nombre,$id);
                    if($data == "modificado") {
                        $msg="modificado";
                    }else {
                        $msg="Error al modificar la identidad";
                    } 
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarIdentidad($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionIdentidad(0, $id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al eliminar la identidad";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionIdentidad(1,$id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al reingresar la identidad";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }





    }
    



?>