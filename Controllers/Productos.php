<?php
    class Productos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'productos');
            if(!empty($verificar)|| $id_usuario == 1){
                $data['marcas']=$this->model->getMarcas();
                $data['categorias']=$this->model->getCategorias();
                $data['unidades']=$this->model->getUnidades();
                $this->views->getView($this,"index",$data);
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }      
        }
        public function listar(){
            $data = $this-> model->getProductos();
            for ($i=0; $i < count($data) ; $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-primary mb-2" type="button" onclick="btnEditarProd('.$data[$i]['id'].');"><i class="far fa-edit"></i></button>
                    <button class="btn btn-danger" type="button" onclick="btnEliminarProd('.$data[$i]['id'].');"><i class="fas fa-trash"></i></button>
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
            $precio_compra=$_POST['precio_compra'];
            $precio_venta=$_POST['precio_venta'];
            $id=$_POST['id'];
            if(empty($codigo) || empty($nombre) || empty($descripcion) || empty($marca)|| empty($categoria) || empty($unidad) || empty($precio_compra) || empty($precio_venta)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                if ($id == ""){
                        $data= $this->model->registrarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad, $precio_compra, $precio_venta);
                        if ($data == "ok"){
                            $msg =array('msg' =>'Producto registrado con éxito','icono'=>'success');
                        }else if($data =="existe") {
                            $msg =array('msg' =>'El producto ya éxiste','icono'=>'warning');
                        }else {
                            $msg =array('msg' =>'Error al registrar el producto','icono'=>'error');
                        }
                }else {
                    $data= $this->model->modificarProducto($codigo, $nombre, $descripcion, $marca, $categoria, $unidad, $precio_compra, $precio_venta, $id);
                        if ($data == "modificado"){
                            $msg =array('msg' =>'Producto modificado con éxito','icono'=>'success');
                        }else {
                            $msg =array('msg' =>'Error al modificado el producto','icono'=>'error');
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
                $msg =array('msg' =>'Producto dado de baja','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al eliminar el producto','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionProd(1, $id);
            if($data == 1){
                $msg =array('msg' =>'Producto reingresado con éxito','icono'=>'success');
            }else {
                $msg =array('msg' =>'Error al reingresar el producto','icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        


    }


?>