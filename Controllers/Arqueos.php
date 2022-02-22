<?php
    class Arqueos extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['cajas'] = $this->model->getCajas();
            $this->views->getView($this,"index", $data);
        }
        public function abrirArqueo(){
            $caja = $_POST['caja'];
            $monto_inicial=$_POST['monto_inicial'];
            $fecha_apertura = date('Y-m-d');
            $id_usuario = $_SESSION['id_usuario'];
            if(empty($caja) || empty($monto_inicial) || empty($fecha_apertura)){
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else{
                $data=$this->model->registrarArqueo($id_usuario, $caja, $monto_inicial, $fecha_apertura);
                    if($data == "ok") {
                        $msg =array('msg' =>'Caja abierta con éxito','icono'=>'success');
                    }else if($data == "existe"){ 
                        $msg =array('msg' =>'La caja ya esta abierta','icono'=>'warning');
                    } else {
                        $msg =array('msg' =>'Error al abrir la caja','icono'=>'error');
                    }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        
    }
?>