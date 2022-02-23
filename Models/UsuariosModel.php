<?php
    class UsuariosModel extends Query{
        private $usuario, $nombre, $contrasena, $id_cargo, $id_almacen, $id, $estado;
        public function __construct(){
            parent::__construct();
        }
        public function getUsuario(string $usuario, string $contrasena){
            $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena' AND estado=1";
            $data = $this->select($sql);
            return $data;
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
        public function getUsuarios(){
            $sql = "SELECT u.*, c.id AS id_cargo, c.nombre As cargo, a.id AS id_almacen, a.nombre AS almacen FROM usuarios u INNER JOIN cargos c ON u.id_cargo = c.id INNER JOIN almacenes a ON u.id_almacen = a.id";
            $data = $this->selectAll($sql);
            return $data;
        }
        public function registrarUsuario(string $usuario, string $nombre, string $contrasena, string $id_cargo, string $id_almacen){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->contrasena = $contrasena;
            $this->id_cargo = $id_cargo;
            $this->id_almacen = $id_almacen;
            $verificar="SELECT * FROM usuarios WHERE usuario='$this->usuario '";
            $existe=$this ->select($verificar);
            if(empty($existe)){
                $sql ="INSERT INTO usuarios(usuario, nombre, contrasena, id_cargo, id_almacen) VALUES (?,?,?,?,?)";
                $datos = array($this->usuario, $this->nombre, $this->contrasena, $this->id_cargo,$this->id_almacen);
                $data =$this->save($sql, $datos);
                if($data ==1){
                    $res= "ok";
                }else{
                    $res= "Error";
                }
            }else {
                $res="existe";
            }
            
            return $res;
        }
        public function modificarUsuario(string $usuario, string $nombre, string $id_cargo, string $id_almacen, int $id){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->id = $id;
            $this->id_cargo = $id_cargo;
            $this->id_almacen=$id_almacen;
            $sql ="UPDATE usuarios SET usuario =?, nombre = ?, id_cargo=?, id_almacen=? WHERE id=?";
            $datos = array($this->usuario, $this->nombre, $this->id_cargo, $this->id_almacen, $this->id);
            $data =$this->save($sql, $datos);
            if($data ==1){
                    $res= "modificado";
            }else{
                    $res= "Error";
            }
            return $res;
                
        }
        public function editarUser(int $id){
            $sql = "SELECT * FROM usuarios WHERE id =$id";
            $data = $this->select($sql);
            return $data;
        }
        public function accionUser(int $estado, int $id){
            $this->id= $id;
            $this->estado =$estado;
            $sql = "UPDATE usuarios SET estado=? WHERE id=? ";
            $datos= array($this->estado, $this->id);
            $data = $this->save ($sql, $datos);
            return $data;
        }
        public function modificarPass(string $contrasena, int $id){
            $sql = "UPDATE usuarios SET contrasena=? WHERE id=? ";
            $datos= array($contrasena, $id);
            $data = $this->save ($sql, $datos);
            return $data;
        }
        public function getPass(string $contrasena, int $id){
            $sql = "SELECT * FROM usuarios WHERE contrasena='$contrasena' AND id=$id";
            $data = $this->select($sql);
            return $data;
        }
        public function getPermisos(){
            $sql="SELECT * FROM permisos";
            $data =$this->selectAll($sql);
            return $data;
        }
        public function registrarPermisos(int $id_usuario, int $id_permiso){
            $sql = "INSERT INTO detalle_permisos (id_usuario, id_permiso) VALUES (?,?)";
            $datos =array($id_usuario, $id_permiso);
            $data = $this->save($sql,$datos);
            if($data == 1){
                $res = 'ok';
            }else {
                $res = 'Error';
            }
            return $res;
        }
        public function eliminarPermisos(int $id_usuario){
            $sql = "DELETE FROM detalle_permisos WHERE id_usuario = ?";
            $datos =array($id_usuario);
            $data = $this->save($sql,$datos);
            if($data == 1){
                $res = 'ok';
            }else {
                $res = 'Error';
            }
            return $res;
        }
        public function getDetallePermisos(int $id_usuario){
            $sql="SELECT * FROM detalle_permisos WHERE id_usuario = $id_usuario";
            $data =$this->selectAll($sql);
            return $data;
        }
        

    }


?>