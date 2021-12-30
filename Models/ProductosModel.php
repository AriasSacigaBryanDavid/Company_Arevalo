<?php
    class ProductosModel extends Query{
        private $nombre, $descripcion, $id_marca, $id_categoria,$id_unidad, $id, $estado;
        public function __construct(){
            parent::__construct();
        }
        public function getMarcas(){
            $sql="SELECT * FROM marcas WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getCategorias(){
            $sql="SELECT * FROM categorias WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getUnidades(){
            $sql="SELECT * FROM unidades WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getProductos(){
            $sql = "SELECT p.*, m.id AS id_marca, m.nombre AS marca, c.id As id_categoria, c.nombre AS categoria, u.id AS id_unidad, u.nombre AS unidad FROM productos p INNER JOIN marcas m ON p.id_marca = m.id INNER JOIN categorias c ON p.id_categoria = c.id INNER JOIN unidades u ON p.id_unidad = u.id; ";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarProducto(string $nombre,string $descripcion, string $id_marca, string $id_categoria, string $id_unidad){
            $this->nombre = $nombre;
            $this->descripcion =$descripcion;
            $this->id_marca = $id_marca;
            $this->id_categoria = $id_categoria;
            $this->id_unidad = $id_unidad;
            $verificar="SELECT * FROM productos WHERE nombre='$this->nombre '";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO productos(nombre,descripcion, id_marca, id_categoria, id_unidad) VALUES (?,?,?,?,?)";
                $datos = array($this->nombre, $this->descripcion, $this->id_marca, $this->id_categoria,$this->id_unidad);
                $data =$this->save($sql, $datos);
                if($data ==1){
                    $res= "ok";
                }else{
                    $res= "Error";
                }
            }else {
                $res="existe";
            }
            
            return $res;
        }
        public function modificarProducto(string $nombre,string $descripcion, string $id_marca, string $id_categoria, string $id_unidad,int $id){
            $this->nombre = $nombre;
            $this->descripcion =$descripcion;
            $this->id = $id;
            $this->id_marca = $id_marca;
            $this->id_categoria=$id_categoria;
            $this->id_unidad= $id_unidad;
            $sql ="UPDATE productos SET nombre =?, descripcion = ?, id_marca=?, id_categoria=?, id_unidad =? WHERE id=?";
            $datos = array($this->nombre, $this->descripcion, $this->id_marca, $this->id_categoria,$this->id_unidad, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
                
        }
        public function editarProd(int $id){
            $sql = "SELECT * FROM productos WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionProd(int $estado, int $id){
            $this->id= $id;
            $this->estado =$estado;
            $sql = "UPDATE productos SET estado=? where id=? ";
            $datos= array($this->estado, $this->id);
            $data = $this->save ($sql, $datos);
            return $data;
        }

    }


?>