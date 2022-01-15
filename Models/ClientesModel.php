<?php
    class ClientesModel extends Query{
        private $nombre, $id_identidad,$n_identidad, $telefono,$correo, $direccion, $id, $estado;
        
        public function __construct(){
            parent::__construct();
        }

        public function getClientes(){
            $sql="SELECT c.*, i.id AS id_identidad, i.nombre AS identidad FROM clientes c INNER JOIN identidades i ON c.id_identidad =i.id";
            $data= $this->selectAll($sql);
            return $data;
        }

        public function registarCliente(string $nombre, string $id_identidad, string $n_identidad, string $telefono, string $correo, string $direccion){
            $this->nombre =$nombre;
            $this->id_identidad = $id_identidad;
            $this->n_identidad = $n_identidad;
            $this->telefono =$telefono;
            $this->correo=$correo;
            $this->direccion =$direccion;
            $verificar="SELECT * FROM clientes WHERE dni = '$this->dni'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO clientes(nombre,id_identidad, n_identidad, telefono,correo, direccion) VALUES (?,?,?,?,?,?)";
                $datos= array($this->nombre, $this->id_identidad, $this->n_identidad, $this->telefono, $this->correo, $this->direccion);
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

        public function modificarCliente(string $nombre, string $id_identidad,string $n_identidad, string $telefono, string $correo, string $direccion, int $id){
            $this->nombre =$nombre;
            $this->id_identidad = $id_identidad;
            $this->n_identidad = $n_identidad;
            $this->telefono =$telefono;
            $this->correo = $correo;
            $this->direccion =$direccion;
            $this->id=$id;
            $sql="UPDATE clientes SET nombre=?,id_identidad=?, n_identidad=? , telefono=?, correo=?,direccion=? WHERE id=?";
            $datos= array($this->nombre, $this->id_identidad, $this->n_identidad, $this->telefono,$this->correo, $this->direccion, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }

        public function editarCli(int $id){
            $sql = "SELECT * FROM clientes WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionCli(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE clientes SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }


    }
?>