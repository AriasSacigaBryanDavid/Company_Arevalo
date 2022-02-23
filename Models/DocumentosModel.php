<?php
    class DocumentosModel extends Query{
        private $nombre,$id,$estado;
        public function __construct(){
            parent::__construct();
        }
        public function getDocumentos(){
            $sql="SELECT * FROM documentos";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarDocumento(string $nombre){
            $this->nombre =$nombre;
            $verificar="SELECT * FROM documentos WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO documentos (nombre) VALUES (?)";
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
        public function modificarDocumento( string $nombre, int $id){
            $this->nombre =$nombre;
            $this->id=$id;
            $sql="UPDATE documentos SET nombre=? WHERE id=?";
            $datos= array($this->nombre, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarDoc(int $id){
            $sql = "SELECT * FROM documentos WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionDoc(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE documentos SET  estado =? WHERE id=?";
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