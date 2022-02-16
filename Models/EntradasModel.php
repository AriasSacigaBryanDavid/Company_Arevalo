<?php
    class EntradasModel extends Query{
       
        public function __construct(){
            parent::__construct();
        }
        //public function getDocumentos(){
          //  $sql="SELECT * FROM documentos WHERE estado=1";
           // $data =$this->selectAll($sql);
            //return $data;
        //}
        //public function getAlmacenes(){
          //  $sql="SELECT * FROM almacenes WHERE estado=1";
           // $data =$this->selectAll($sql);
           // return $data;
        //}
        //public function getIdentidades(){
          //  $sql="SELECT * FROM identidades WHERE estado=1";
           // $data =$this->selectAll($sql);
           // return $data;
        //}
        public function getProveedores(){
            $sql="SELECT * FROM proveedores WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        //public function getNidentidad(string $pro){
          //  $sql= "SELECT* FROM proveedores WHERE n_identidad='$pro'";
           // $data = $this->select($sql);
           // return $data;
        //}
        public function getProCod(string $cod){
            $sql= "SELECT* FROM productos WHERE codigo='$cod' AND estado=1";
            $data = $this->select($sql);
            return $data;
        }
        public function getProductos(int $id){
            $sql= "SELECT* FROM productos WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarDetalle(int $id_producto, int $id_usuario, string $rendimiento, string $peso_bruto, int $cantidad, string $kilos_tara, string $peso_neto, string $precio, string $sub_total){
            $sql= "INSERT INTO detalle_e(id_producto, id_usuario, rendimiento, peso_bruto, cantidad, kilos_tara, peso_neto, precio, sub_total) VALUES(?,?,?,?,?,?,?,?,?)";
            $datos= array($id_producto, $id_usuario, $rendimiento, $peso_bruto, $cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            $data= $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function getDetalle(int $id){
            $sql = "SELECT d.*, p.id AS id_pro, p.nombre FROM detalle_e d INNER JOIN productos p ON d.id_producto =p.id  WHERE d.id_usuario =$id";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function deleteDetalle(int $id){
            $sql = "DELETE FROM detalle_e WHERE id = ?";
            $datos= array($id);
            $data= $this-> save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function calcularEntrada(int $id_usuario){
            $sql = "SELECT sub_total, SUM(sub_total) AS total FROM detalle_e WHERE id_usuario=$id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function consultarDetalle(int $id_producto, int $id_usuario){
            $sql = "SELECT * FROM detalle_e WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function actualizarDetalle(string $rendimiento,string $peso_bruto, int $cantidad , string $kilos_tara,string $peso_neto, string $precio, string $sub_total, int $id_producto, int $id_usuario){
            $sql = "UPDATE detalle_e SET rendimiento=?, peso_bruto=?, cantidad=?, kilos_tara=?, peso_neto=?, precio = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ?";
            $datos = array($rendimiento,$peso_bruto,$cantidad,$kilos_tara,$peso_neto, $precio, $sub_total, $id_producto, $id_usuario);
            $data = $this->save($sql,$datos);
            if($data ==1){
                $res ="modificado";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function registrarEntrada(int $id_proveedor,string $n_documento,int $id_usuario, string $total){
            $sql = "INSERT INTO entradas(id_proveedor,n_documento ,id_usuario, total) VALUES (?,?,?,?)";
            $datos = array($id_proveedor,$n_documento,$id_usuario,$total);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        
        public function id_entrada(){
            $sql = "SELECT MAX(id) AS id FROM entradas";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarDetalleEntrada(int $id_entrada, int $id_pro, string $rendimiento, string $peso_bruto,int $cantidad, string $kilos_tara, string $peso_neto,string $precio, string $sub_total){
            $sql = "INSERT INTO detalle_entradas(id_entrada, id_producto,rendimiento,peso_bruto,cantidad,kilos_tara,peso_neto, precio, sub_total) VALUES (?,?,?,?,?,?,?,?,?)";
            $datos = array($id_entrada, $id_pro, $rendimiento, $peso_bruto ,$cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function getEmpresa(){
            $sql ="SELECT * FROM empresa";
            $data = $this->select($sql);
            return $data;
        }
        public function vaciarDetalle(int $id_usuario){
            $sql = "DELETE FROM detalle_e WHERE id_usuario = ?";
            $datos = array($id_usuario);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
           
        }
        public function getProEntrada(int $id_entrada){
            $sql="SELECT e.*, d.*, p.id, p.nombre FROM entradas e INNER JOIN detalle_entradas d ON e.id = d.id_entrada INNER JOIN productos p ON p.id = d.id_producto WHERE e.id =$id_entrada";
            $data= $this->selectAll($sql);
            return $data;
        }
        
        public function getHistorialEntradas(){
            $sql= "SELECT * FROM entradas";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function actualizarStock(int $cantidad, int $id_pro){
            $sql = "UPDATE productos SET cantidad =? WHERE id=?";
            $datos = array($cantidad, $id_pro);
            $data = $this->save($sql, $datos);
            return $data;
        }
        public function actualizarPeso(string $peso_total, int $id_pro){
            $sql = "UPDATE productos SET peso_total =? WHERE id=?";
            $datos = array($peso_total, $id_pro);
            $data = $this->save($sql, $datos);
            return $data;
        }
       
        
    }

?>