<?php
    class ReportesModel extends Query{
    public function __construct(){
            parent::__construct();
    }
    public function getR_productos(){
        $sql="SELECT * FROM Productos";
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



    }
    
    


?>