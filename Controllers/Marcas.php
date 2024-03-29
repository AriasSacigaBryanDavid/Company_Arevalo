<?php
    class Marcas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'marcas');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
        }
        public function listar(){
            $data = $this->model->getMarcas();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarMar('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarMar('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarMar('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
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
                    $data=$this->model->registrarMarca($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Marca registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La marca ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la marca','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarMarca($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Marca modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la marca','icono'=>'error');
                    } 
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarMarca($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionMarca(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Marca dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la marca','icono'=>'error');

            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionMarca(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Marca reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la marca','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }



    }


?>