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
            $comprobar = $this->model->consultarDetalle($id_producto, $id_usuario);
            if (empty($comprobar)) {
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
            }else{
                $total_peso_bruto= $comprobar['peso_bruto'] + $peso_bruto;
                $total_cantidad= $comprobar['cantidad'] + $cantidad;
                $kilos_tara = $total_cantidad * 0.2;
                $peso_neto = $total_peso_bruto - $kilos_tara;
                $precio = $datos['precio_compra'];
                $sub_total = $precio * $peso_neto;
                
                $data= $this->model->actualizarDetalle($rendimiento,$total_peso_bruto, $total_cantidad, $kilos_tara, $peso_neto, $precio, $sub_total, $id_producto, $id_usuario);
                
                if($data == "modificado"){
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el producto";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function listar(){
            $id_usuario =$_SESSION['id_usuario'];
            $data['detalle'] = $this->model->getDetalle($id_usuario);
            $data['total_pagar'] = $this->model->calcularEntrada($id_usuario);
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
        public function registrarEntrada(){
            $id_usuario = $_SESSION['id_usuario'];
            $total = $this->model->calcularEntrada($id_usuario);
            $data = $this->model->registrarEntrada($total['total']);
            if($data == 'ok'){
                $detalle = $this->model->getDetalle($id_usuario);
                $id_entrada = $this->model->id_entrada();
                foreach($detalle as $row){
                    $id_pro = $row['id_producto'];
                    $rendimiento =$row['rendimiento'];
                    $peso_bruto=$row['peso_bruto'];
                    $cantidad = $row['cantidad'];
                    $kilos_tara = $cantidad * 0.2;
                    $peso_neto = $peso_bruto - $kilos_tara;
                    $precio = $row['precio'];
                    $sub_total = $precio * $peso_neto;
                    $this->model->registrarDetalleEntrada($id_entrada['id'],$id_pro, $rendimiento, $peso_bruto, $cantidad, $kilos_tara,$peso_neto,$precio, $sub_total);
                }
                $vaciar = $this->model->vaciarDetalle($id_usuario);
                if($vaciar == 'ok'){
                    $msg =array('msg' => 'ok', 'id_entrada' => $id_entrada['id']);
                }
                
            }else{
                $msg='Error al realizar la entrada';
            }
            echo json_encode($msg);
            die();
        }
        
        
        



    }


?>