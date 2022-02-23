<?php
    class Unidades extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'unidades');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            };
        }
        public function listar(){
            $data = $this->model->getUnidades();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarUni('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarUni('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarUni('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
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
                    $data=$this->model->registrarUnidad($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Unidad registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La unidad ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la unidad','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarUnidad($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Unidad modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la unidad','icono'=>'error');
                    } 
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarUnidad($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionUnidad(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Unidad dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la unidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionUnidad(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Unidad reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la unidad','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>