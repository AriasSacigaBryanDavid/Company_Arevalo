<?php
    class Proveedores extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'proveedores');
            if(!empty($verificar)|| $id_usuario == 1){
                $data['identidades']=$this->model->getIdentidades();
                $this->views->getView($this,"index",$data);
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }      
        }
        public function listar(){
             $data = $this->model->getProveedores();
             for ($i=0; $i<count($data); $i++){
                 if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarPro('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
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
            $identidad= $_POST['identidad'];
            $n_identidad = $_POST['n_identidad'];
            $telefono=$_POST['telefono'];
            $correo =$_POST['correo'];
            $direccion=$_POST['direccion'];
            $id=$_POST['id'];
            if(empty($nombre) || empty($identidad) || empty($n_identidad) || empty($telefono) || empty($correo)  || empty($direccion)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registarProveedor($nombre,$identidad,$n_identidad,$telefono,$correo,$direccion);
                    if($data == "ok") {
                        $msg =array('msg' =>'Proveedor registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){
                        $msg =array('msg' =>'El proveedor ya éxiste','icono'=>'warning');
                    }else {
                        $msg =array('msg' =>'Error al registrar el proveedor','icono'=>'error');

                    } 
                }else {
                    $data=$this->model->modificarProveedor($nombre,$identidad,$n_identidad,$telefono,$correo,$direccion,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Proveedor modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado el proveedor','icono'=>'error');
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
                $msg =array('msg' =>'Proveedor dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el proveedor','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionPro(1, $id);
            if($data ==1){
                $msg =array('msg' =>'Proveedor reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el proveedor','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        


    }
?>