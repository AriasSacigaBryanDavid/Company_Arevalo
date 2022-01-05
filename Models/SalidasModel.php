<?php
    class SalidasModel extends Query{
        private $fecha_salida, $id_documento, $n_documento, $id_almacen, $motivo, $id_producto, $cantidad, $precio, $id;
        public function __construct(){
            parent::__construct();
        }
        public function getDocumentos(){
            $sql="SELECT * FROM documentos WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getAlmacenes(){
            $sql="SELECT * FROM almacenes WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getProductos(){
            $sql="SELECT * FROM productos WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getSalidas(){
            $sql = "SELECT s.*, d.id AS id_documento, d.nombre AS documento, a.id As id_almacen, a.nombre AS almacen, p.id AS id_producto, p.nombre AS producto FROM salidas s INNER JOIN documentos d ON s.id_documento = d.id INNER JOIN almacenes a ON s.id_almacen = a.id INNER JOIN productos p ON s.id_producto=p.id; ";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarSalida(string $fecha_salida, string $id_documento, string $n_documento, string $id_almacen, string $motivo, string $id_producto, string $cantidad, string $precio){
            $this->fecha_salida= $fecha_salida;
            $this->id_documento=$id_documento;
            $this->n_documento=$n_documento;
            $this->id_almacen=$id_almacen;
            $this->motivo=$motivo;
            $this->id_producto=$id_producto;
            $this->cantidad = $cantidad;
            $this->precio= $precio;
            $verificar="SELECT * FROM salidas WHERE n_documento ='$this->n_documento'";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql="INSERT INTO salidas(fecha_salida, id_documento, n_documento, id_almacen, motivo, id_producto, cantidad, precio) VALUES (?,?,?,?,?,?,?,?)";
                $datos = array($this->fecha_salida, $this->id_documento, $this->n_documento, $this->id_almacen, $this-> motivo, $this->id_producto, $this->cantidad, $this->precio);
                if($data ==1){
                    $res= "ok";
                }else{
                    $res= "Error";
                }
            }else{
                $res ="existe";
            }
            return $res;
        }

        public function modificarSalida(string $fecha_salida, string $id_documento, string $n_documento, string $id_almacen, string $motivo, string $id_producto, string $cantidad , string $precio, int $id){
            $this->fecha_salida= $fecha_salida;
            $this->id_documento=$id_documento;
            $this->n_documento=$n_documento;
            $this->id_almacen=$id_almacen;
            $this->motivo=$motivo;
            $this->id_producto=$id_producto;
            $this->cantidad = $cantidad;
            $this->precio= $precio;
            $this->id= $id;

            $sql= " UPDATE salidas SET fecha_salida=?, id_documento=?, n_documento=?, id_almacen=?, motivo=?, id_producto=?, cantidad=?, precio=? WHERE id=?";
            $datos= array($this->fecha_salida, $this->id_documento, $this->n_documento, $this->id_almacen, $this->motivo, $this->id_producto, $this->cantidad, $this->precio, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
        }

        public function editarSal(int $id){
            $sql="SELECT * FROM salidas WHERE id=$id";
            $data =$this->select($sql);
            return $data;
        }



    }
?>