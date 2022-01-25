<?php
    class EntradasModel extends Query{
       
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
        public function getProductos(int $id){
            $sql= "SELECT* FROM productos WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarDetalle(int $id_producto, int $id_usuario, string $rendimiento, string $peso_bruto, int $cantidad, string $kilos_tara, string $peso_neto, string $precio, string $sub_total){
            $sql= "INSERT INTO detalle(id_producto, id_usuario, rendimiento, peso_bruto, cantidad, kilos_tara, peso_neto, precio, sub_total) VALUES(?,?,?,?,?,?,?,?,?)";
            $datos= array($id_producto, $id_usuario, $rendimiento, $peso_bruto, $cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            $data= $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        
    }

?>