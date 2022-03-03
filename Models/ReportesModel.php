<?php
    class ReportesModel extends Query{
    public function __construct(){
            parent::__construct();
    }
    public function getR_productos(){
        $sql="SELECT * FROM productos";
        $data= $this->selectAll($sql);
        return $data;
    }
    
    public function VerificarPermiso(int $id_usuario, string $nombre){
        $sql = "SELECT p.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso WHERE d.id_usuario = $id_usuario AND p.permiso = '$nombre'";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getStockMinimo(){
        $sql = "SELECT * FROM productos WHERE estado = 1 AND cantidad < 15 ORDER BY cantidad DESC LIMIT 10 ";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getPesoMinimo(){
        $sql = "SELECT * FROM productos WHERE estado = 1 AND peso_total < 50.00 ORDER BY peso_total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosVendidos(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosVendidosDetalles(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getclientesVendidos()
    {
        $sql = "SELECT v.id,v.id_cliente, v.estado, c.id, c.nombre, COUNT(v.id) AS total FROM ventas v INNER JOIN clientes c ON c.id =v.id_cliente WHERE v.estado =1 GROUP BY v.id_cliente ORDER BY v.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getclientesVendidosDetalles(){
        $sql = "SELECT v.id,v.id_cliente, v.total,v.estado, c.id, c.nombre, COUNT(v.id) AS total, SUM(v.total) AS montototal FROM ventas v INNER JOIN clientes c ON v.id_cliente = c.id WHERE v.estado =1 GROUP BY id_cliente ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesVendidos(){
        $sql = "SELECT v.id,v.id_almacen, v.estado, a.id, a.nombre, COUNT(v.id) AS total FROM ventas v INNER JOIN almacenes a ON v.id_almacen = a.id WHERE v.estado =1 GROUP BY v.id_almacen ORDER BY v.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesVendidosDetalles(){
        $sql = "SELECT v.id,v.id_almacen, v.total,v.estado, a.id, a.nombre, COUNT(v.id) AS total, SUM(v.total) AS montototal FROM ventas v INNER JOIN almacenes a ON v.id_almacen = a.id WHERE v.estado =1 GROUP BY id_almacen ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosVendidos(){
        $sql = "SELECT v.id,v.id_usuario, v.estado, u.id, u.nombre, COUNT(v.id) AS total FROM ventas v INNER JOIN usuarios u ON v.id_usuario = u.id WHERE v.estado =1 GROUP BY v.id_usuario ORDER BY v.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosVendidosDetalles(){
        $sql = "SELECT v.id,v.id_usuario, v.total,v.estado, u.id, u.nombre, COUNT(v.id) AS total, SUM(v.total) AS montototal FROM ventas v INNER JOIN usuarios u ON v.id_usuario = u.id WHERE v.estado =1 GROUP BY id_usuario ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosSalidos(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_salidas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosSalidosDetalles(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_salidas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesSalidos(){
        $sql = "SELECT s.id,s.id_almacen, s.estado, a.id, a.nombre, COUNT(s.id) AS total FROM salidas s INNER JOIN almacenes a ON s.id_almacen = a.id WHERE s.estado =1 GROUP BY s.id_almacen ORDER BY s.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesSalidosDetalles(){
        $sql = "SELECT s.id,s.id_almacen, s.total,s.estado, a.id, a.nombre, COUNT(s.id) AS total, SUM(s.total) AS montototal FROM salidas s INNER JOIN almacenes a ON s.id_almacen = a.id WHERE s.estado =1 GROUP BY id_almacen ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosSalidos(){
        $sql = "SELECT s.id,s.id_usuario, s.estado, u.id, u.nombre, COUNT(s.id) AS total FROM salidas s INNER JOIN usuarios u ON s.id_usuario = u.id WHERE s.estado =1 GROUP BY s.id_usuario ORDER BY s.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosSalidosDetalles(){
        $sql = "SELECT s.id,s.id_usuario, s.total,s.estado, u.id, u.nombre, COUNT(s.id) AS total, SUM(s.total) AS montototal FROM salidas s INNER JOIN usuarios u ON s.id_usuario = u.id WHERE s.estado =1 GROUP BY id_usuario ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosRendimientos(){
        $sql = "SELECT d.id_producto, d.rendimiento,d.estado, p.id, p.nombre, ROUND(AVG(d.rendimiento),2)AS rendimiento  FROM detalle_entradas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.rendimiento DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosRendimientosDetalles(){
        $sql = "SELECT d.id_producto, d.rendimiento,d.estado, p.id, p.nombre, ROUND(AVG(d.rendimiento),2)AS rendimiento  FROM detalle_entradas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.rendimiento DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosEntrados(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_entradas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosEntradosDetalles(){
        $sql = "SELECT d.id_producto, d.cantidad,d.estado, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_entradas d INNER JOIN productos p ON p.id = d.id_producto WHERE d.estado=1 GROUP BY d.id_producto ORDER BY d.cantidad DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproveedoresEntrados(){
        $sql = "SELECT e.id,e.id_proveedor, e.estado, p.id, p.nombre, COUNT(e.id) AS total FROM entradas e INNER JOIN proveedores p ON p.id =e.id_proveedor WHERE e.estado =1 GROUP BY e.id_proveedor ORDER BY e.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproveedoresEntradosDetalles(){
        $sql = "SELECT e.id,e.id_proveedor, e.total,e.estado, p.id, p.nombre, COUNT(e.id) AS total, SUM(e.total) AS montototal FROM entradas e INNER JOIN proveedores p ON e.id_proveedor = p.id WHERE e.estado =1 GROUP BY id_proveedor ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesEntrados(){
        $sql = "SELECT e.id,e.id_almacen, e.estado, a.id, a.nombre, COUNT(e.id) AS total FROM entradas e INNER JOIN almacenes a ON e.id_almacen = a.id WHERE e.estado =1 GROUP BY e.id_almacen ORDER BY e.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getalmacenesEntradosDetalles(){
        $sql = "SELECT e.id,e.id_almacen, e.total,e.estado, a.id, a.nombre, COUNT(e.id) AS total, SUM(e.total) AS montototal FROM entradas e INNER JOIN almacenes a ON e.id_almacen = a.id WHERE e.estado =1 GROUP BY id_almacen ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosEntrados(){
        $sql = "SELECT e.id,e.id_usuario, e.estado, u.id, u.nombre, COUNT(e.id) AS total FROM entradas e INNER JOIN usuarios u ON e.id_usuario = u.id WHERE e.estado =1 GROUP BY e.id_usuario ORDER BY e.total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getusuariosEntradosDetalles(){
        $sql = "SELECT e.id,e.id_usuario, e.total,e.estado, u.id, u.nombre, COUNT(e.id) AS total, SUM(e.total) AS montototal FROM entradas e INNER JOIN usuarios u ON e.id_usuario = u.id WHERE e.estado =1 GROUP BY id_usuario ORDER BY total, montototal DESC";
        $data = $this->selectAll($sql);
        return $data;
    }


    }
    
    


?>