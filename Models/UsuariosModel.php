<?php
    class UsuariosModel extends Query{
        private $usuario, $contrasena;
        public function __construct(){
            parent::__construct();
        }
        public function getUsuario(string $usuario, string $contrasena){
            $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
            $data = $this->select($sql);
            return $data;
        }



    }


?>