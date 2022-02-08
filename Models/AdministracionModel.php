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
    
    


    }
    
    


?>