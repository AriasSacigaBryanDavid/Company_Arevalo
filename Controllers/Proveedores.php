<?php
    class Proveedores extends Controller{
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
             $data = $this->model->getProveedores();
             for ($i=0; $i<count($data); $i++){
                 if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarPro('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                    </div>';
                 }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarPro('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                 }
                 
             }
             echo json_encode($data, JSON_UNESCAPED_UNICODE);
             die();
        }
        public function registrar(){
            $nombre=$_POST['nombre'];
            $ruc= $_POST['ruc'];
            $telefono=$_POST['telefono'];
            $correo =$_POST['correo'];
            $direccion=$_POST['direccion'];
            $id=$_POST['id'];
            if(empty($nombre) || empty($ruc) || empty($telefono) || empty($correo)  || empty($direccion)){
                $msg= "Todos los campos son obligatorios";
            }else{
                if ($id== "") {
                    $data=$this->model->registarProveedor($nombre,$ruc,$telefono,$correo,$direccion);
                    if($data == "ok") {
                        $msg="si";
                    }else if($data == "existe"){
                        $msg="El proveedor ya existe";
                    }else {
                        $msg="Error al registrar el proveedor";
                    } 
                }else {
                    $data=$this->model->modificarProveedor($nombre,$ruc,$telefono,$correo,$direccion,$id);
                    if($data == "modificado") {
                        $msg="modificado";
                    }else {
                        $msg="Error al modificar el proveedor";
                    } 
                }     
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarPro($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionPro(0, $id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al eliminar el proveedor";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionPro(1, $id);
            if($data ==1){
                $msg="ok";
            }else {
                $msg ="Error al reingresar el proveedor";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        


    }
?>