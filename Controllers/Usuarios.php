<?php
    class Usuarios extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }
        public function index(){
            $id_usuario = $_SESSION['id_usuario'];
            $verificar = $this->model->VerificarPermiso($id_usuario, 'usuarios');
            if(!empty($verificar)|| $id_usuario == 1){
                $data['cargos']=$this->model->getCargos();
                $data['almacenes']=$this->model->getAlmacenes();
                $this->views->getView($this,"index",$data);
            }else {
                header('Location: '.base_url. 'Errors/permisos');
            }

        }
        public function validar(){
            if(empty($_POST['usuario']) || empty($_POST['contrasena'])){
                $msg="Los campos estan vacios";
            }else{
                $usuario =$_POST['usuario'];
                $contrasena=$_POST['contrasena'];
                $hash = hash("SHA256", $contrasena);
                $data = $this->model->getUsuario($usuario, $hash);
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
        public function listar(){
            $data = $this-> model->getUsuarios();
            for ($i=0; $i < count($data) ; $i++) { 
                
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Activo</span>';
                    if ($data[$i]['id'] == 1) {
                        $data[$i]['acciones'] = '<div>
                        <span class="p-1 mb-2 bg-primary text-white rounded">Administrador</span>
                        </div>';
                    }else {
                        $data[$i]['acciones'] = '<div>
                        <a class="btn btn-dark mb-2" href="'.base_url.'Usuarios/permisos/'.$data[$i]['id'].'"><i class="fas fa-key"></i></a>
                        <button class="btn btn-primary mb-2" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-user-edit"></i></button>
                        <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-user-slash"></i></button>
                        </div>';
                    }
                }else{
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');"><i class="fas fa-recycle"></i></button>
                    </div>';
                }
            }
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
            
        }
        public function registrar(){
            $usuario =$_POST['usuario'];
            $nombre =$_POST['nombre'];
            $contrasena =$_POST['contrasena'];
            $confirmar =$_POST['confirmar'];
            $cargo =$_POST['cargo'];
            $almacen =$_POST['almacen'];
            $id =$_POST['id'];
            $hash = hash("SHA256",$contrasena);
            if(empty($usuario) || empty($nombre) || empty($cargo)|| empty($almacen)){
                $msg =" Todo los campos son obligatorios";
            }else{
                if ($id == ""){
                    if($contrasena != $confirmar){
                        $msg =" las contraseña no coinciden";
                    }else {
                        $data= $this->model->registrarUsuario($usuario,$nombre,$hash,$cargo,$almacen);
                        if ($data == "ok"){
                            $msg = "si";  
                        }else if($data =="existe") {
                            $msg = "El usuario ya existe";
                        }else {
                            $msg="Error al registrar el usuario";
                        }
                    }
                }else {
                    $data= $this->model->modificarUsuario($usuario,$nombre,$cargo, $almacen, $id);
                        if ($data == "modificado"){
                            $msg = "modificado";  
                        }else {
                            $msg="Error al modificado el usuario";
                        }
                }
                
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function editar(int $id){
            $data = $this->model->editarUser($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function eliminar(int $id){
            $data = $this->model->accionUser(0, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al eliminar el usuario ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function reingresar(int $id){
            $data = $this->model->accionUser(1, $id);
            if($data == 1){
                $msg ="ok";
            }else {
                $msg ="Error al reingresar el usuario ";
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function cambiarPass(){
            $actual=$_POST['contrasena_actual'];
            $nueva=$_POST['contrasena_nueva'];
            $confirmar=$_POST['confirmar_contrasena'];
            if(empty($actual) || empty($nueva) || empty($confirmar)) {
                $msg =array('msg' =>'Todo los campos son obligatorios','icono'=>'warning');
            }else {
                if ($nueva != $confirmar) {
                    $msg =array('msg' =>'Las contraseña no coinciden','icono'=>'warning');
                }else {
                    $id = $_SESSION['id_usuario'];
                    $hash = hash("SHA256", $actual);
                    $data = $this->model->getPass($hash, $id);
                    if(!empty($data)){
                        
                        $verificar = $this->model->modificarPass(hash("SHA256", $nueva), $id);
                        if ($verificar == 1) {
                            $msg =array('msg' =>'Contraseña modificada con éxito','icono'=>'success');  
                        }else {
                            $msg =array('msg' =>'Error al modificar la contraseña','icono'=>'error');  
                        }
                    }else {
                        $msg =array('msg' =>'Las contraseña actual es incorrecta','icono'=>'warning');
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();

        }
        public function permisos($id){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['datos']=$this->model->getPermisos();
            $permisos=$this->model->getDetallePermisos($id);
            $data['asignados'] = array();
            foreach ($permisos as $permiso){
                $data['asignados'][$permiso['id_permiso']] = true;
            }
            $data['id_usuario'] = $id;
            $this->views->getView($this,"permisos",$data);
        }
        public function registrarPermiso()
        {
            $msg = '';
            $id_usuario = $_POST['id_usuario'];
            $eliminar = $this->model->eliminarPermisos($id_usuario);
            if($eliminar == 'ok'){
                foreach ($_POST['permisos'] as $id_permiso) {
                    $msg = $this->model->registrarPermisos($id_usuario, $id_permiso);
                }
                if ($msg == 'ok') {
                    $msg = array('msg' => 'Permisos asignado', 'icono'=>'success');
                }else {
                    $msg = array('msg' => 'Error al asignar los permisos', 'icono'=>'error');
                }
            }else {
                $msg = array('msg' => 'Error al eliminar los permisos anteriores', 'icono'=>'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            //die();
            
        }
        public function correo(){
            $this->views->getView($this,"correo");
        }
        public function salir(){
            session_destroy();
            header("location: ".base_url);
        }
    }
?>