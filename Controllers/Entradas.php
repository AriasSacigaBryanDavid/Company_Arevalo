<?php
    class Entradas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['documentos']=$this->model->getDocumentos();
            $data['almacenes']=$this->model->getAlmacenes();
            $data['identidad']=$this->model->getIdentidades();
            $this->views->getView($this,"index", $data);
        }
        public function buscarProveedor($pro){
            $data =$this->model->getNidentidad($pro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function buscarCodigoEn($cod){
            $data =$this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function ingresar(){
            $id= $_POST['id'];
            $datos = $this->model->getProductos($id);
            $id_producto= $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $rendimiento = $_POST['rendimiento'];
            $peso_bruto = $_POST['peso_bruto'];
            $cantidad = $_POST['cantidad'];
            $kilos_tara = $cantidad * 0.2;
            $peso_neto = $peso_bruto - $kilos_tara;
            $precio = $datos['precio_compra'];
            $sub_total = $precio * $peso_neto;
            
            $data= $this->model->registrarDetalle($id_producto, $id_usuario, $rendimiento, $peso_bruto, $cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            
            if($data == "ok"){
                $msg = "ok";
            }else{
                $msg = "Error al ingresar el producto";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function listar(){
            $id_usuario =$_SESSION['id_usuario'];
            $data = $this->model->getDetalle($id_usuario);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function delete($id){
            $data = $this->model->deleteDetalle($id);
            if($data == 'ok'){
                $msg ='ok';
            }else{
                $msg ='error';
            }
            echo json_encode($msg);
            die();
        }
        
        
        



    }


?>