<?php
    class SalidasModel extends Query{
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
        public function registrarDetalle(int $id_producto, int $id_usuario, string $peso_bruto, int $cantidad, string $kilos_tara, string $peso_neto, string $precio, string $sub_total){
            $sql= "INSERT INTO detalle_s_v(id_producto, id_usuario, peso_bruto, cantidad, kilos_tara, peso_neto, precio, sub_total) VALUES(?,?,?,?,?,?,?,?)";
            $datos= array($id_producto, $id_usuario, $peso_bruto, $cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            $data= $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function getDetalle(int $id){
            $sql = "SELECT d.*, p.id AS id_pro, p.nombre FROM detalle_s_v d INNER JOIN productos p ON d.id_producto =p.id  WHERE d.id_usuario =$id";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function deleteDetalle(int $id){
            $sql = "DELETE FROM detalle_s_v WHERE id = ?";
            $datos= array($id);
            $data= $this-> save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function calcularSalida(int $id_usuario){
            $sql = "SELECT sub_total, SUM(sub_total) AS total FROM detalle_s_v WHERE id_usuario=$id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function consultarDetalle(int $id_producto, int $id_usuario){
            $sql = "SELECT * FROM detalle_s_v WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function actualizarDetalle(string $peso_bruto, int $cantidad , string $kilos_tara,string $peso_neto, string $precio, string $sub_total, int $id_producto, int $id_usuario){
            $sql = "UPDATE detalle_s_v SET peso_bruto=?, cantidad=?, kilos_tara=?, peso_neto=?, precio = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ?";
            $datos = array($peso_bruto,$cantidad,$kilos_tara,$peso_neto, $precio, $sub_total, $id_producto, $id_usuario);
            $data = $this->save($sql,$datos);
            if($data ==1){
                $res ="modificado";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function registrarSalida(string $total){
            $sql = "INSERT INTO salidas(total) VALUES (?)";
            $datos = array($total);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function id_salida(){
            $sql = "SELECT MAX(id) AS id FROM salidas";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarDetalleSalida(int $id_salida, int $id_pro, string $peso_bruto,int $cantidad, string $kilos_tara, string $peso_neto,string $precio, string $sub_total){
            $sql = "INSERT INTO detalle_salidas(id_salida, id_producto, peso_bruto,cantidad,kilos_tara,peso_neto, precio, sub_total) VALUES (?,?,?,?,?,?,?,?)";
            $datos = array($id_salida, $id_pro, $peso_bruto ,$cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function vaciarDetalle(int $id_usuario){
            $sql = "DELETE FROM detalle_s_v WHERE id_usuario = ?";
            $datos = array($id_usuario);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
           
        }
        public function getHistorialSalidas(){
            $sql= "SELECT * FROM salidas";
            $data= $this->selectAll($sql);
            return $data;
        }
        



    }
?>