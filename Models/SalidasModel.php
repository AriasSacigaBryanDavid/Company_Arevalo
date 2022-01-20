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
        public function getProCod(string $cod)
        {
            $sql= "SELECT* FROM productos WHERE codigo='$cod'";
            $data = $this->select($sql);
            return $data;
        }
        
        



    }
?>