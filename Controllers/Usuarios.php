<?php
    class Usuarios extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $this->views->getView($this,"index");
        }
        public function validar(){
            if(empty($_POST['usuario']) || empty($_POST['contrasena'])){
                $msg="Los campos estan vacios";
            }else{
                $usuario =$_POST['usuario'];
                $contrasena=$_POST['contrasena'];
                //$hash = hash("SHA256", $contrasena);
                //$data = $this ->model->getUsuario($usuario, $hash);
                $data = $this ->model->getUsuario($usuario, $contrasena);
                if($data){
                    $_SESSION['id_usuario'] = $data['id'];
                    $_SESSION['usuario']= $data['usuario'];
                    $_SESSION['nombre']= $data['nombre'];
                    $_SESSION['activo']= true;
                    $msg = "ok";
                }else{
                    $msg ="Usuario o contraseña incorrecta";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
    }
?>