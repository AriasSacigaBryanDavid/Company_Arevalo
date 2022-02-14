<?php
    class AdministracionModel extends Query{
    
    public function __construct(){
            parent::__construct();
    }
    public function getEmpresa(){
        $sql = "SELECT * FROM empresa";
        $data = $this->select($sql);
        return $data;
    }
    public function modificar(String $nombre, string $ruc, string $telefono, string $direccion, string $mensaje, int $id ){
        
        $sql="UPDATE empresa SET nombre=?,ruc=?, telefono=?, direccion=?, mensaje=? WHERE id=?";
        $datos= array($nombre, $ruc, $telefono, $direccion, $mensaje, $id);
        $data=$this->save($sql, $datos);
        if ($data == 1){
                $res = "ok";
        }else{
                $res = "error";
        }
        return $res;
    }
    public function getDatos(string $table){
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data;
    }
    public function getVentas(){
        $sql = "SELECT COUNT(*) AS total FROM ventas WHERE fecha > CURDATE()";
        $data = $this->select($sql);
        return $data;
    }
    public function getEntradas(){
        $sql = "SELECT COUNT(*) AS total FROM Entradas WHERE fecha > CURDATE()";
        $data = $this->select($sql);
        return $data;
    }
    public function getSalidas(){
        $sql = "SELECT COUNT(*) AS total FROM Salidas WHERE fecha > CURDATE()";
        $data = $this->select($sql);
        return $data;
    }
    public function getStockMinimo()
    {
        $sql = "SELECT * FROM productos WHERE cantidad < 15 ORDER BY cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosVendidos()
    {
        $sql = "SELECT d.id_producto, d.cantidad, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id = d.id_producto GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getPesoMinimo()
    {
        $sql = "SELECT * FROM productos WHERE peso_total < 50.00 ORDER BY peso_total DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getproductosSalidas()
    {
        $sql = "SELECT d.id_producto, d.cantidad, p.id, p.nombre, SUM(d.cantidad) AS total FROM detalle_salidas d INNER JOIN productos p ON p.id = d.id_producto GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    
    
    


    }
    
    


?>