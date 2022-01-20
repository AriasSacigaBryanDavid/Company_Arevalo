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
        public function getAlmacenes(){
            $sql="SELECT * FROM almacenes WHERE estado=1";
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
        public function getProCod(string $cod){
            $sql= "SELECT* FROM productos WHERE codigo='$cod'";
            $data = $this->select($sql);
            return $data;
        }
        
    }

?>