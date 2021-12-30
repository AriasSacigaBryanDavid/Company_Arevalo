<?php
    class UnidadesModel extends Query{
        private $nombre,$id,$estado;
        public function __construct(){
            parent::__construct();
        }
        public function getUnidades(){
            $sql="SELECT * FROM unidades";
            $data= $this->selectAll($sql);
            return $data;
        }
        public function registrarUnidad(string $nombre){
            $this->nombre =$nombre;
            $verificar="SELECT * FROM unidades WHERE nombre = '$this->nombre'";
            $existe=$this->select($verificar);
            if (empty($existe)) {
                $sql="INSERT INTO unidades (nombre) VALUES (?)";
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
        public function modificarUnidad( string $nombre, int $id){
            $this->nombre =$nombre;
            $this->id=$id;
            $sql="UPDATE unidades SET nombre=? WHERE id=?";
            $datos= array($this->nombre, $this->id);
            $data=$this->save($sql, $datos);
                if ($data == 1){
                    $res = "modificado";
                }else{
                    $res = "error";
                }
            return $res;
        }
        public function editarUnidad(int $id){
            $sql = "SELECT * FROM unidades WHERE id = $id";
            $data = $this->select($sql);
            return $data;
        }
        
        public function accionUnidad(int $estado, int $id){
            $this->id=$id;
            $this->estado=$estado;
            $sql = "UPDATE unidades SET  estado =? WHERE id=?";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
        }

    }
    
?>