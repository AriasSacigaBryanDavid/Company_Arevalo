<?php
    class EntradasModel extends Query{
        private $fecha_compra, $id_documento, $n_documento,$id_proveedor,$id_almacen,$id_producto,$cantidad,$precio_compra,$precio_venta,$fecha_vencimiento, $id;
        public function __construct(){
            parent::__construct();
        }
        public function getDocumentos(){
            $sql="SELECT * FROM documentos WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getProveedores(){
            $sql="SELECT * FROM proveedores WHERE estado=1";
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
        public function getIdentidades(){
            $sql="SELECT * FROM identidades WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getNidentidad(string $pro){
            $sql= "SELECT* FROM proveedores WHERE n_identidad='$pro'";
            $data = $this->select($sql);
            return $data;
        }
        public function getEntradas(){
            $sql = "SELECT e.*, d.id AS id_documento, d.nombre AS documento, p.id AS id_proveedor, p.nombre AS proveedor, a.id As id_almacen, a.nombre AS almacen, pd.id AS id_producto, pd.nombre AS producto FROM entradas e INNER JOIN documentos d ON e.id_documento = d.id INNER JOIN proveedores p ON e.id_proveedor = p.id INNER JOIN almacenes a ON e.id_almacen = a.id INNER JOIN productos pd ON e.id_producto=pd.id; ";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarEntrada(string $fecha_compra,string $id_documento, string $n_documento , string $id_proveedor, string $id_almacen, string $id_producto, string $cantidad, string $precio_compra, string $precio_venta, string $fecha_vencimiento){
            $this->fecha_compra = $fecha_compra;
            $this->id_documento =$id_documento;
            $this->n_documento = $n_documento;
            $this->id_proveedor = $id_proveedor;
            $this->id_almacen = $id_almacen;
            $this->id_producto = $id_producto;
            $this->cantidad = $cantidad;
            $this->precio_compra =$precio_compra;
            $this->precio_venta = $precio_venta;
            $this->fecha_vencimiento = $fecha_vencimiento;
            $verificar="SELECT * FROM entradas WHERE n_documento='$this->n_documento '";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO entradas(fecha_compra,id_documento,n_documento, id_proveedor, id_almacen, id_producto, cantidad, precio_compra, precio_venta, fecha_vencimiento) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $datos = array($this->fecha_compra, $this->id_documento,$this->n_documento,  $this->id_proveedor, $this->id_almacen,$this->id_producto, $this->cantidad, $this->precio_compra, $this->precio_venta, $this->fecha_vencimiento);
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
        public function modificarEntrada(string $fecha_compra,string $id_documento, string $n_documento , string $id_proveedor, string $id_almacen, string $id_producto, string $cantidad, string $precio_compra, string $precio_venta, string $fecha_vencimiento,int $id){
            $this->fecha_compra = $fecha_compra;
            $this->id_documento =$id_documento;
            $this->n_documento = $n_documento;
            $this->id_proveedor = $id_proveedor;
            $this->id_almacen = $id_almacen;
            $this->id_producto = $id_producto;
            $this->cantidad = $cantidad;
            $this->precio_compra =$precio_compra;
            $this->precio_venta = $precio_venta;
            $this->fecha_vencimiento = $fecha_vencimiento;
            $this->id = $id;
            $sql ="UPDATE entradas SET fecha_compra =?, id_documento = ?, n_documento =?, id_proveedor=?, id_almacen=?, id_producto =?, cantidad =?, precio_compra =?, precio_venta=?, fecha_vencimiento=? WHERE id=?";
            $datos = array($this->fecha_compra, $this->id_documento,$this->n_documento,  $this->id_proveedor, $this->id_almacen,$this->id_producto, $this->cantidad, $this->precio_compra, $this->precio_venta, $this->fecha_vencimiento, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
                
        }
        public function editarEnt(int $id){
            $sql = "SELECT * FROM entradas WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
       

    }


?>