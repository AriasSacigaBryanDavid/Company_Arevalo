<?php
    class AlmacenesModel extends Query{
        private $nombre, $direccion,$encargado,$telefono,$correo, $estado,$id;
        public function __construct(){
            parent::__construct();
        }
        public function getAlmacenes(){
            $sql="SELECT * FROM almacenes";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarAlmacen(string $nombre,string $direccion, string $encargado, string $telefono, string $correo){
            $this->nombre =$nombre;
            $this->direccion=$direccion;
            $this->encargado =$encargado;
            $this->telefono =$telefono;
            $this->correo=$correo;
            $verificar="SELECT * FROM almacenes WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO almacenes (nombre, direccion,encargado,telefono,correo) VALUES (?,?,?,?,?)";
                $datos= array( $this->nombre, $this->direccion, $this->encargado, $this->telefono, $this->correo);
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
        public function modificarAlmacen( string $nombre, string $direccion, string $encargado, string $telefono, string $correo,int $id){
            $this->nombre =$nombre;
            $this->direccion =$direccion;
            $this->encargado =$encargado;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->id=$id;
            $sql="UPDATE almacenes SET nombre=? , direccion=?, encargado =?, telefono=?, correo=? WHERE id=?";
            $datos= array($this->nombre, $this->direccion,$this->encargado,$this->telefono, $this->correo ,$this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarAlm(int $id){
            $sql = "SELECT * FROM almacenes WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionAlm(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE almacenes SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }
        public function VerificarPermiso(int $id_usuario, string $nombre){
            $sql = "SELECT p.id, p.permiso, d.id, d.id_usuario, d.id_permiso FROM permisos p INNER JOIN detalle_permisos d ON p.id=d.id_permiso WHERE d.id_usuario = $id_usuario AND p.permiso = '$nombre'";
            $data = $this->selectAll($sql);
            return $data;
        }
    }
    




?>