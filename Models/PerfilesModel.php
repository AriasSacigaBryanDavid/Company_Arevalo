<?php
    class PerfilesModel extends Query{
    
    public function __construct(){
            parent::__construct();
    }
    public function getPerfil($id_usuario){
        $sql = "SELECT u.*,u.id ,c.id AS id_cargo, c.nombre As cargo, a.id AS id_almacen, a.nombre AS almacen FROM usuarios u INNER JOIN cargos c ON u.id_cargo = c.id INNER JOIN almacenes a ON u.id_almacen = a.id WHERE u.id = $id_usuario";
        $data = $this->select($sql);
        return $data;
    }
    

    }
    
    


?>