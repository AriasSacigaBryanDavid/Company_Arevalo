<?php
    class VentasModel extends Query{
        public function __construct(){
            parent::__construct();
        }
        public function getDocumentos(){
            $sql="SELECT * FROM documentos WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getClientes(){
            $sql="SELECT * FROM clientes WHERE estado=1";
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
        public function calcularVenta(int $id_usuario){
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
        public function registrarVenta(int $id_documento, string $n_documento,int $id_cliente,int $id_usuario,int $id_almacen,string $total){
            $sql = "INSERT INTO ventas(id_documento,n_documento,id_cliente,id_usuario, id_almacen,total) VALUES (?,?,?,?,?,?)";
            $datos = array($id_documento,$n_documento,$id_cliente,$id_usuario,$id_almacen,$total);
            $data = $this->save($sql, $datos);
            if($data ==1){
                $res = "ok";
            }else{
                $res ="error";
            }
            return $res;
        }
        public function id_venta(){
            $sql = "SELECT MAX(id) AS id FROM ventas";
            $data = $this->select($sql);
            return $data;
        }
        public function registrarDetalleVenta(int $id_venta, int $id_pro, string $peso_bruto,int $cantidad, string $kilos_tara, string $peso_neto,string $precio, string $sub_total){
            $sql = "INSERT INTO detalle_ventas(id_venta, id_producto, peso_bruto,cantidad,kilos_tara,peso_neto, precio, sub_total) VALUES (?,?,?,?,?,?,?,?)";
            $datos = array($id_venta, $id_pro, $peso_bruto ,$cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
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
        public function getProVenta(int $id_venta){
            $sql="SELECT e.*, d.*, p.id, p.nombre FROM ventas e INNER JOIN detalle_ventas d ON e.id = d.id_venta INNER JOIN productos p ON p.id = d.id_producto WHERE e.id =$id_venta";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function getHistorialVentas(){
            $sql= "SELECT v.*, d.id AS id_documento, d.nombre AS documento, c.id AS id_cliente, c.nombre AS cliente, u.id AS id_usuario, u.nombre AS usuario, a.id AS id_almacen, a.nombre AS almacen FROM ventas v INNER JOIN documentos d ON v.id_documento =d.id INNER JOIN clientes c ON v.id_cliente =c.id INNER JOIN usuarios u ON v.id_usuario =u.id INNER JOIN almacenes a ON v.id_almacen =a.id;";
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
        public function DetallesVenta(int $id){
            $sql = "SELECT v.*, v.id, d.id AS id_documento, d.nombre AS documento, u.id AS id_usuario, u.nombre AS usuario, a.id AS id_almacen, a.nombre AS almacen FROM ventas v INNER JOIN documentos d ON v.id_documento =d.id INNER JOIN usuarios u ON v.id_usuario =u.id INNER JOIN almacenes a ON v.id_almacen =a.id WHERE v.id=$id;";
            $data = $this->select($sql);
            return $data;
        }
        public function clienteVenta(int $id){
            $sql = "SELECT v.id, v.id_cliente, c.id, c.nombre As cliente, i.id, i.nombre AS identidad, c.*, i.* FROM ventas v INNER JOIN clientes c ON c.id = v.id_cliente INNER JOIN identidades i ON i.id=c.id_identidad WHERE v.id=$id";
            $data = $this->select($sql);
            return $data;
        }
        

    }
    
?>