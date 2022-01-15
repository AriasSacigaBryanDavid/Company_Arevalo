<?php
    class Productos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['marcas']=$this->model->getMarcas();
            $data['categorias']=$this->model->getCategorias();
            $data['unidades']=$this->model->getUnidades();
            $this->views->getView($this,"index",$data);
        }
        public function listar(){
            $data = $this-> model->getProductos();
            for ($i=0; $i < count($data) ; $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary" type="button" onclick="btnEditarProd('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarProd('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                    </div>';
                }else{
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarProd('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
            
        }
        public function registrar(){
            $codigo =$_POST['codigo'];
            $nombre =$_POST['nombre'];
            $descripcion=$_POST['descripcion'];
            $marca=$_POST['marca'];
            $categoria=$_POST['categoria'];
            $unidad= $_POST['unidad'];
            $id=$_POST['id'];
            if(empty($codigo) || empty($nombre) || empty($descripcion) || empty($marca)|| empty($categoria) || empty($unidad)){
                $msg =" Todo los campos son obligatorios";
            }else{
                if ($id == ""){
                        $data= $this->model->registrarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad);
                        if ($data == "ok"){
                            $msg = "si";  
                        }else if($data =="existe") {
                            $msg = "El Producto ya existe";
                        }else {
                            $msg="Error al registrar el producto";
                        }
                }else {
                    $data= $this->model->modificarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad, $id);
                        if ($data == "modificado"){
                            $msg = "modificado";  
                        }else {
                            $msg="Error al modificado el productos";
                        }
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarProd($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionProd(0, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al eliminar el producto ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionProd(1, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al reingresar el producto ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        


    }


?>