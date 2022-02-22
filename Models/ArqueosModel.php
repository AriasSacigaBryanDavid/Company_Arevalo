<?php
    class ArqueosModel extends Query{

    public function __construct(){
            parent::__construct();
    }
    public function getCajas(){
        $sql="SELECT * FROM cajas";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function registrarArqueo(int $id_usuario, int $id_caja, string $monto_inicial, string $fecha_apertura){
        $verificar="SELECT * FROM cierre_caja WHERE id_usuario = '$id_usuario' AND estado = 1";
        $existe=$this->select($verificar);
        if (empty($existe)) {
            $sql="INSERT INTO cierre_caja (id_usuario, id_caja , monto_inicial, fecha_apertura) VALUES (?,?,?,?)";
            $datos= array($id_usuario,$id_caja, $monto_inicial, $fecha_apertura);
            $data=$this->save($sql, $datos);
            if ($data == 1){
                    $res = "ok";
            }else{
                    $res = "error";
                }
        }else{
            $res ="existe";
        }
        return $res;
    }
    }
    
    


?>