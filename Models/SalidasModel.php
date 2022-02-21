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
        public function registrarDetalle(int $id_producto, int $id_usuario, string $peso_bruto, int $cantidad, string $kilos_tara, string $peso_neto, string $precio, string $sub_total){
            $sql= "INSERT INTO detalle_s(id_producto, id_usuario, peso_bruto, cantidad, kilos_tara, peso_neto, precio, sub_total) VALUES(?,?,?,?,?,?,?,?)";
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
            $sql = "SELECT d.*, p.id AS id_pro, p.nombre FROM detalle_s d INNER JOIN productos p ON d.id_producto =p.id  WHERE d.id_usuario =$id";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function deleteDetalle(int $id){
            $sql = "DELETE FROM detalle_s WHERE id = ?";
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
            $sql = "SELECT sub_total, SUM(sub_total) AS total FROM detalle_s WHERE id_usuario=$id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function consultarDetalle(int $id_producto, int $id_usuario){
            $sql = "SELECT * FROM detalle_s WHERE id_producto = $id_producto AND id_usuario = $id_usuario";
            $data= $this->select($sql);
            return $data;
        }
        public function actualizarDetalle(string $peso_bruto, int $cantidad , string $kilos_tara,string $peso_neto, string $precio, string $sub_total, int $id_producto, int $id_usuario){
            $sql = "UPDATE detalle_s SET peso_bruto=?, cantidad=?, kilos_tara=?, peso_neto=?, precio = ?, sub_total = ? WHERE id_producto = ? AND id_usuario = ?";
            $datos = array($peso_bruto,$cantidad,$kilos_tara,$peso_neto, $precio, $sub_total, $id_producto, $id_usuario);
            $data = $this->save($sql,$datos);
            if($data ==1){
                $res ="modificado";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function registrarSalida(int $id_documento, string $n_documento, string $motivo, int $id_usuario, int $id_almacen, string $total){
            $sql = "INSERT INTO salidas(id_documento, n_documento, motivo, id_usuario, id_almacen, total) VALUES (?,?,?,?,?,?)";
            $datos = array($id_documento,$n_documento,$motivo,$id_usuario,$id_almacen,$total);
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
        public function getEmpresa(){
            $sql ="SELECT * FROM empresa";
            $data = $this->select($sql);
            return $data;
        }
        public function vaciarDetalle(int $id_usuario){
            $sql = "DELETE FROM detalle_s WHERE id_usuario = ?";
            $datos = array($id_usuario);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
           
        }
        public function getProSalida(int $id_salida){
            $sql="SELECT e.*, d.*, p.id, p.nombre FROM salidas e INNER JOIN detalle_salidas d ON e.id = d.id_salida INNER JOIN productos p ON p.id = d.id_producto WHERE e.id =$id_salida";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function getHistorialSalidas(){
            $sql= "SELECT s.*, d.id AS id_documento, d.nombre AS documento, u.id AS id_usuario, u.nombre AS usuario, a.id AS id_almacen, a.nombre AS almacen FROM salidas s INNER JOIN documentos d ON s.id_documento =d.id INNER JOIN usuarios u ON s.id_usuario =u.id INNER JOIN almacenes a ON s.id_almacen =a.id;";
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
        public function getAlmacen(int $id_usuario){
            $sql = "SELECT id_almacen AS id_almacen FROM usuarios WHERE id=$id_usuario";
            $data = $this->select($sql);
            return $data;
        }
        public function DetallesSalida(int $id){
            $sql = "SELECT s.*, s.id, d.id AS id_documento, d.nombre AS documento, u.id AS id_usuario, u.nombre AS usuario, a.id AS id_almacen, a.nombre AS almacen FROM salidas s INNER JOIN documentos d ON s.id_documento =d.id INNER JOIN usuarios u ON s.id_usuario =u.id INNER JOIN almacenes a ON s.id_almacen =a.id WHERE s.id=$id;";
            $data = $this->select($sql);
            return $data;
        }
        public function motivoSalida(int $id){
            $sql = "SELECT * FROM salidas s WHERE id=$id;";
            $data = $this->select($sql);
            return $data;
        }
        public function getAnularSalida(int $id_salida){
            $sql="SELECT s.*, d.* FROM salidas s INNER JOIN detalle_salidas d ON s.id = d.id_salida WHERE s.id =$id_salida";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function getAnular(int $id_salida){
            $sql ="UPDATE salidas s INNER JOIN detalle_salidas d ON s.id = d.id_salida set s.estado = ?, d.estado = ? WHERE s.id= ? AND d.id_salida = ?";
            $datos= array(0,0, $id_salida,$id_salida);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res = "ok";
            }else{
                $res = "error";
            }
            return $res;
        }
        



    }
?>