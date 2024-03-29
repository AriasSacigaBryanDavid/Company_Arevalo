<?php
    class Almacenes extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'almacenes');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
           
        }
        public function listar(){
            $data = $this->model->getAlmacenes();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado']== 1){
                    $data[$i]['estado']= '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarAlm('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarAlm('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarAlm('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
                
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function registrar(){
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $encargado=$_POST['encargado'];
            $telefono =$_POST['telefono'];
            $correo =$_POST['correo'];
            $id=$_POST['id'];
            if(empty($nombre) || empty($direccion) || empty($encargado) || empty($telefono) || empty($correo)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id== "") {
                    $data=$this->model->registrarAlmacen($nombre, $direccion, $encargado, $telefono, $correo);
                    if($data == "ok") {
                        $msg =array('msg' =>'Almacén registrado con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'El almacén ya éxiste','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al registrar el almacén','icono'=>'error');
                    }
                }else {
                    $data=$this->model->modificarAlmacen($nombre,$direccion,$encargado, $telefono, $correo,$id);
                    if($data == "modificado") {
                        $msg =array('msg' =>'Almacén modificado con éxito','icono'=>'success');
                    }else {
                        $msg =array('msg' =>'Error al modificado el almacén','icono'=>'error');
                    } 
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarAlm($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionAlm(0, $id);
            if($data ==1){
                $msg =array('msg' =>'Almacén dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el almacén','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionAlm(1,$id);
            if($data ==1){
                $msg =array('msg' =>'Almacén reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el almacén','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>