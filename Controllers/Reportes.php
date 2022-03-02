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
        
    }
?>