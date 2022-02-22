<?php
    class CajasModel extends Query{
    public function __construct(){
            parent::__construct();
    }
    public function getCajas(){
        $sql="SELECT * FROM cajas";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function registrarCaja(string $nombre){
        $this->nombre =$nombre;
        $verificar="SELECT * FROM cajas WHERE nombre = '$this->nombre'";
        $existe=$this->select($verificar);
        if (empty($existe)) {
            $sql="INSERT INTO cajas (nombre) VALUES (?)";
            $datos= array( $this->nombre);
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
    public function modificarCaja( string $nombre, int $id){
        $this->nombre =$nombre;
        $this->id=$id;
        $sql="UPDATE cajas SET nombre=? WHERE id=?";
        $datos= array($this->nombre, $this->id);
        $data=$this->save($sql, $datos);
            if ($data == 1){
                $res = "modificado";
            }else{
                $res = "error";
            }
        return $res;
    }
    public function editarCaja(int $id){
        $sql = "SELECT * FROM cajas WHERE id = $id";
        $data = $this->select($sql);
        return $data;
    }
    
    public function accionCaja(int $estado, int $id){
        $this->id=$id;
        $this->estado=$estado;
        $sql = "UPDATE cajas SET  estado =? WHERE id=?";
        $datos = array($this->estado, $this->id);
        $data = $this->save($sql, $datos);
        return $data;
    }

    public function getCaja(){
        $sql="SELECT * FROM cajas WHERE estado=1";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function registrarArqueo(int $id_usuario, int $id_caja, string $monto_inicial, string $fecha_apertura){
        $verificar="SELECT * FROM cierre_cajas WHERE id_usuario = '$id_usuario' AND estado = 1";
        $existe=$this->select($verificar);
        if (empty($existe)) {
            $sql="INSERT INTO cierre_cajas (id_usuario, id_caja , monto_inicial, fecha_apertura) VALUES (?,?,?,?)";
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
    public function getcierreCaja(){
        $sql="SELECT * FROM cierre_cajas ";
        $data= $this->selectAll($sql);
        return $data;
    }
    public function getVentas(int $id_usuario){
        $sql = "SELECT total, sum(total) AS total FROM ventas WHERE id_usuario = $id_usuario AND estado = 1 AND apertura =1";
        $data = $this->select($sql);
        return $data;
    }
    public function getTotalVentas(int $id_usuario){
        $sql = "SELECT COUNT(total) AS total FROM ventas WHERE id_usuario = $id_usuario AND estado = 1 AND apertura =1";
        $data = $this->select($sql);
        return $data;
    }


    }
    
    


?>