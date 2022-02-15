<?php
    class Categorias extends Controller{
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
            $data = $this->model->getCategorias();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarCateg('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarCateg('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarCateg('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
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
                    $data=$this->model->registrarCategoria($nombre);
                    if($data == "ok") {
                        $msg =array('msg' =>'Categoría registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){
                        $msg =array('msg' =>'La categoría ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar la categoría','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarCategoria($nombre,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Categoría modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado la categoría','icono'=>'error');
                    } 
                } 
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarCategoria($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionCateg(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Categoría dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar la categoría','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionCateg(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Categoría reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar la categoría','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>