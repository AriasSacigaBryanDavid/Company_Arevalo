<?php

    class Administracion extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
          // if (empty($_SESSION['activo'])) {
            //    header("location: ".base_url);
           // }
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'configuracion');
            if(!empty($verificar) || $id_usuario == 1){
                $data= $this->model->getEmpresa();
                $this->views->getView($this,"index",$data);
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
            
        }
        public function home(){
            $data['usuarios']= $this->model->getDatos('usuarios');
            $data['clientes']= $this->model->getDatos('clientes');
            $data['proveedores']= $this->model->getDatos('proveedores');
            $data['productos']= $this->model->getDatos('productos');
            $data['ventas']= $this->model->getVentas();
            $data['entradas']= $this->model->getEntradas();
            $data['salidas']= $this->model->getSalidas();
            $this->views->getView($this,"home", $data);
        }
        public function modificar()
        {
            $nombre = $_POST['nombre'];
            $ruc =$_POST['ruc'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $mensaje = $_POST['mensaje'];
            $id= $_POST['id'];
            $data= $this->model->modificar($nombre, $ruc, $telefono, $direccion, $mensaje, $id);
            if($data == 'ok'){
                $msg =array('msg' =>'Datos de la empresa, modificado con éxito','icono'=>'success');
            }else{
                $msg =array('msg' =>'Error al modificadar los datos de la empresa','icono'=>'error');
            }
            echo json_encode($msg);
            die();
        }
        public function reporteStock(){
            $data = $this->model->getStockMinimo();
            echo json_encode($data);
            die();
        }
        public function productosVendidos(){
            $data = $this->model->getproductosVendidos();
            echo json_encode($data);
            die();
        }
        public function reportePeso(){
            $data = $this->model->getPesoMinimo();
            echo json_encode($data);
            die();
        }
        public function productosSalidas(){
            $data = $this->model->getproductosSalidas();
            echo json_encode($data);
            die();
        }
        public function clientesVendidos(){
            $data = $this->model->getclientesVendidos();
            echo json_encode($data);
            die();
        }
        public function almacenVendidos(){
            $data = $this->model->getalmacenVendidos();
            echo json_encode($data);
            die();
        }
       





    }
    



?>