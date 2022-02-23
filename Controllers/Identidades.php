<?php
    class Identidades extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'identidades');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
            
        }
        public function listar(){
            $data = $this->model->getIdentidades();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarIden('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
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
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarIdentidad($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Identidad registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La identidad ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la identidad','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarIdentidad($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Identidad modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la identidad','icono'=>'error');
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
                $msg =array('msg' =>'Identidad dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la identidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionIdentidad(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Identidad reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la identidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>