<?php
    class Cajas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'cajas');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
        }
        public function listar(){
            $data = $this->model->getCajas();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarCaj('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarCaj('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCaj('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
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
                    $data=$this->model->registrarCaja($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Caja registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'El caja ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la caja','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarCaja($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Caja modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la caja','icono'=>'error');
                    } 
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarCaja($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionCaja(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Caja dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la caja','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionCaja(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Caja reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la caja','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        
    }
?>