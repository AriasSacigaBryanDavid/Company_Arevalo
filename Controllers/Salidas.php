<?php
    class Salidas extends Controller{
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
            $data['productos']=$this->model->getProductos(); 
            $this->views->getView($this,"index",$data);
        }

        public function listar(){
            $data= $this->model->getSalidas();
            for ($i=0; $i < count($data) ; $i++) { 
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarSal('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar(){
            $fecha_salida = $_POST['fecha_salida'];
            $documento =$_POST['documento'];
            $n_documento =$_POST['n_documento'];
            $almacen =$_POST['almacen'];
            $motivo  = $_POST['motivo'];
            $producto =$_POST['producto'];
            $cantidad =$_POST['cantidad'];
            $precio =$_POST['precio'];
            $id= $_POST['id'];
            if(empty($fecha_salida) || empty($documento) || empty($n_documento) || empty($almacen) || empty($motivo) ||  empty($producto) || empty($cantidad) || empty($precio)){
                $msg =" Todo los campos son obligatorios";
            }else{
                if($id == ""){
                    $data = $this->model->registrarSalida($fecha_salida , $documento, $n_documento, $almacen, $motivo, $producto, $cantidad, $precio);
                    if ($data == "ok"){
                        $msg = "si";  
                    }else if($data =="existe") {
                        $msg = "La salida ya existe";
                    }else {
                        $msg="Error al registrar la salida";
                    }
                }else{
                    $data = $this->model->modificarSalida($fecha_salida, $documento, $n_documento, $almacen, $motivo, $producto, $cantidad, $precio, $id);
                    if ($data == "modificado"){
                        $msg = "modificado";  
                    }else {
                        $msg="Error al modificado la entrada";
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarSal($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

       

    }


?>