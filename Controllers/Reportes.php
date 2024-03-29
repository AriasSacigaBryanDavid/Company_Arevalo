<?php
    class Reportes extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'kardex');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"index");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }

        }
        public function listar(){
            $data = $this->model->getR_productos();
            for ($i =0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>'; 
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                }       
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function stockMinimo(){
            $data = $this->model->getStockMinimo();
            echo json_encode($data);
            die();
        }
        public function pesoMinimo(){
            $data = $this->model->getPesoMinimo();
            echo json_encode($data);
            die();
        }
        public function reportesventas(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario,'reporte_ventas');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"reportesventas");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }

        }
        public function productosVendidos(){
            $data = $this->model->getproductosVendidos();
            echo json_encode($data);
            die();
        }
        public function listarProductoVendido(){
            $data = $this->model->getproductosVendidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function clientesVendidos(){
            $data = $this->model->getclientesVendidos();
            echo json_encode($data);
            die();
        }
        public function listarClienteVendido(){
            $data = $this->model->getclientesVendidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function almacenesVendidos(){
            $data = $this->model->getalmacenesVendidos();
            echo json_encode($data);
            die();
        }
        public function listarAlmacenVendido(){
            $data = $this->model->getalmacenesVendidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function usuariosVendidos(){
            $data = $this->model->getusuariosVendidos();
            echo json_encode($data);
            die();
        }
        public function listarUsuarioVendido(){
            $data = $this->model->getusuariosVendidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function reportessalidas(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario,'reporte_salidas');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"reportessalidas");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
        }
        public function productosSalidos(){
            $data = $this->model->getproductosSalidos();
            echo json_encode($data);
            die();
        }
        public function listarProductoSalido(){
            $data = $this->model->getproductosSalidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function almacenesSalidos(){
            $data = $this->model->getalmacenesSalidos();
            echo json_encode($data);
            die();
        }
        public function listarAlmacenSalido(){
            $data = $this->model->getalmacenesSalidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function usuariosSalidos(){
            $data = $this->model->getusuariosSalidos();
            echo json_encode($data);
            die();
        }
        public function listarUsuarioSalido(){
            $data = $this->model->getusuariosSalidosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reportesentradas(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario,'reporte_entradas');
            if(!empty($verificar)|| $id_usuario == 1){
                $this->views->getView($this,"reportesentradas");
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }
        }
        public function productosRendimientos(){
            $data = $this->model->getproductosRendimientos();
            echo json_encode($data);
            die();
        }
        public function listarProductoRendimiento(){
            $data = $this->model->getproductosRendimientosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function productosEntrados(){
            $data = $this->model->getproductosEntrados();
            echo json_encode($data);
            die();
        }
        public function listarProductoEntrado(){
            $data = $this->model->getproductosEntradosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function proveedoresEntrados(){
            $data = $this->model->getproveedoresEntrados();
            echo json_encode($data);
            die();
        }
        public function listarProveedorEntrado(){
            $data = $this->model->getproveedoresEntradosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function almacenesEntrados(){
            $data = $this->model->getalmacenesEntrados();
            echo json_encode($data);
            die();
        }
        public function listarAlmacenEntrado(){
            $data = $this->model->getalmacenesEntradosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function usuariosEntrados(){
            $data = $this->model->getusuariosEntrados();
            echo json_encode($data);
            die();
        }
        public function listarUsuarioEntrado(){
            $data = $this->model->getusuariosEntradosDetalles();
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        
    }
?>