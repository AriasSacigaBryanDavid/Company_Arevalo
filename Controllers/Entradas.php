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
            $data['proveedores']=$this->model->getProveedores();
            $data['almacenes']=$this->model->getAlmacenes();
            $data['productos']=$this->model->getProductos();
            $this->views->getView($this,"index", $data);
        }
        public function listar(){
            $data = $this-> model->getEntradas();
            
            for ($i=0; $i < count($data) ; $i++) { 
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEnt('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                </div>';
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
            
        }
        public function registrar(){
            $fecha_compra =$_POST['fecha_compra'];
            $documento=$_POST['documento'];
            $n_documento=$_POST['n_documento'];
            $proveedor=$_POST['proveedor'];
            $almacen= $_POST['almacen'];
            $producto= $_POST['producto'];
            $cantidad= $_POST['cantidad'];
            $precio_compra =$_POST['precio_compra'];
            $precio_venta =$_POST['precio_venta'];
            $fecha_vencimiento =$_POST['fecha_vencimiento'];
            $id=$_POST['id'];
            if(empty($fecha_compra) || empty($documento) || empty($n_documento)|| empty($proveedor) || empty($almacen) || empty($producto) || empty($cantidad) || empty($precio_compra) || empty($precio_venta) || empty($fecha_vencimiento) ){
                $msg =" Todo los campos son obligatorios";
            }else{
                if ($id == ""){
                        $data= $this->model->registrarEntrada($fecha_compra, $documento, $n_documento,$proveedor,$almacen,$producto,$cantidad,$precio_compra,$precio_venta,$fecha_vencimiento );
                        if ($data == "ok"){
                            $msg = "si";  
                        }else if($data =="existe") {
                            $msg = "La Entrada ya existe";
                        }else {
                            $msg="Error al registrar la entrada";
                        }
                }else {
                    $data= $this->model->modificarEntrada($fecha_compra, $documento, $n_documento,$proveedor,$almacen,$producto,$cantidad,$precio_compra,$precio_venta,$fecha_vencimiento , $id);
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
            $data = $this->model->editarEnt($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }



    }


?>