<?php
    class ProveedoresModel extends Query{
        private $nombre,$ruc, $telefono, $correo, $direccion, $id, $estado;
        
        public function __construct(){
            parent::__construct();
        }

        public function getProveedores(){
            $sql="SELECT * FROM proveedores";
            $data= $this->selectAll($sql);
            return $data;
        }

        public function registarProveedor(string $nombre,string $ruc, string $telefono, string $correo, string $direccion){
            $this->nombre =$nombre;
            $this->ruc = $ruc;
            $this->telefono =$telefono;
            $this->correo=$correo;
            $this->direccion =$direccion;
            $verificar="SELECT * FROM proveedores WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO proveedores(nombre,ruc, telefono,correo, direccion) VALUES (?,?,?,?,?)";
                $datos= array($this->nombre,$this->ruc, $this->telefono, $this->correo, $this->direccion);
                $data=$this->save($sql, $datos);
                    if ($data == 1){
                        $res = "ok";
                    }else{
                        $res = "error";
                    }
            }else {
                $res = "existe";
            }
            
            return $res;
        }

        public function modificarProveedor(string $nombre, string $ruc, string $telefono, string $correo, string $direccion, int $id){
            $this->nombre =$nombre;
            $this->ruc = $ruc;
            $this->telefono =$telefono;
            $this->correo = $correo;
            $this->direccion =$direccion;
            $this->id=$id;
            $sql="UPDATE proveedores SET nombre=?,ruc=?, telefono=?, correo=?,direccion=?  WHERE id=?";
            $datos= array($this->nombre, $this->ruc, $this->telefono,$this->correo, $this->direccion, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }

        public function editarPro(int $id){
            $sql = "SELECT * FROM proveedores WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionPro(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE proveedores SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }


    }
?>