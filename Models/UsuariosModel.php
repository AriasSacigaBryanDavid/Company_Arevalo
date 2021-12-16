<?php
    class UsuariosModel extends Query{
        private $usuario, $contrasena;
        public function __construct(){
            parent::__construct();
        }
        public function getCargos(){
            $sql="SELECT * FROM cargos WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getAlmacenes(){
            $sql="SELECT * FROM almacenes WHERE estado=1";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function getUsuario(string $usuario, string $contrasena){
            $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
            $data = $this->select($sql);
            return $data;
        }
        public function getUsuarios(){
            $sql = "SELECT u.*, c.id AS id_cargo, c.nombre As cargo, a.id AS id_almacen, a.nombre AS almacen FROM usuarios u INNER JOIN cargos c ON u.id_cargo = c.id INNER JOIN almacenes a ON u.id_almacen = a.id";
            $data = $this->selectAll($sql);
            return $data;
        }



    }


?>