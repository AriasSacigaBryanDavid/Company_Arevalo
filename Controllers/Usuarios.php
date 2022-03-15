<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

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
            $dni =$_POST['dni'];
            $correo =$_POST['correo'];
            $telefono =$_POST['telefono'];
            $direccion =$_POST['direccion'];
            $id =$_POST['id'];
            $hash = hash("SHA256",$contrasena);
            if(empty($usuario) || empty($nombre) || empty($cargo)|| empty($almacen) || empty($dni) || empty($correo) || empty($telefono) || empty($direccion)){
                $msg =" Todo los campos son obligatorios";
            }else{
                if ($id == ""){
                    if($contrasena != $confirmar){
                        $msg =" las contraseña no coinciden";
                    }else {
                        $data= $this->model->registrarUsuario($usuario,$nombre,$hash,$cargo,$almacen,$dni,$correo,$telefono,$direccion);
                        if ($data == "ok"){
                            $msg = "si";  
                        }else if($data =="existe") {
                            $msg = "El usuario ya existe";
                        }else {
                            $msg="Error al registrar el usuario";
                        }
                    }
                }else {
                    $data= $this->model->modificarUsuario($usuario,$nombre,$cargo, $almacen,$dni,$correo,$telefono,$direccion,$id);
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
            die();
            
        }
        public function correo(){
            $this->views->getView($this,"correo");
        }
        public function resetear(){
            $correo = $_POST['correo'];
            if(empty($correo)){
                $msg = array('msg' => 'El correo es requerido','icono'=>'warning');
            }else{
                $verificar= $this->model->verificarCorreo($correo);
                if(empty($verificar)){
                    $msg = array('msg' => 'El correo no éxiste','icono'=>'warning');
                }else {
                    $token = md5(uniqid());
                    $insertar = $this->model->insertarToken($token,$correo);
                    if ($insertar == 'ok') {
                        $mail = new PHPMailer(true);

                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                      //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'bariassaciga@gmail.com';                     //SMTP username
                            $mail->Password   = '940161323ASxdbryan$$';                               //SMTP password
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        
                            //Recipients
                            $mail->setFrom('bryanasxd@gmail.com', 'bryan arias');
                            $mail->addAddress($correo);     //Add a recipient
                            
                        
                            //Content 
                            
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Resetear Contraseña';
                            $mail->Body    = 'Has pedido resetear tu contraseña, si no has sido puedes omitir este mensaje.   <a href="'.base_url.'Usuarios/restablecer/'.$token.'" target="_blank">Para resetear click aqui</a>';
                            $mail->CharSet = 'UTF-8';
                            $mail->send();
                            $msg = array('msg' => 'correo enviado con exito', 'icono'=>'success');
                        } catch (Exception $e) {
                            $msg = array('msg' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}",'icono'=>'error');
                        } 
                    }else {
                        $msg = array('msg' => 'Error al actualizar el token', 'icono'=>'error');
                    }
                }
                echo json_encode($msg, JSON_UNESCAPED_UNICODE);
                die();

            }
        }
        public function restablecer($token){
            $data =  $this->model->getToken($token);
            if (empty($data)) {
                header('Location: '.base_url);
            }else{
                $this->views->getView($this,"restablecer", $token);
            }
        }
        public function resetearPass(){
            $contrasena = $_POST['nueva_contrasena'];
            $confirmar = $_POST['confirmar'];
            $token = $_POST['token'];
            $hash = hash("SHA256", $contrasena);
            if (empty($contrasena) || empty($confirmar)) {
                $msg = array('msg'=> 'Todo los campos son requeridos', 'icono' => 'warning');
            }else if($contrasena != $confirmar){
                $msg = array('msg'=> 'Las Contraseñas no coinciden', 'icono' => 'warning');
            }else {
                $data = $this->model->nuevaContrasena($hash, $token);
                if($data == 'ok'){
                    $msg = array('msg'=>'Contraseña modificada con éxito', 'icono' => 'success');
                }else{
                    $msg = array('msg'=> 'Error al modificar la contraseña', 'icono' => 'error');
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function salir(){
            session_destroy();
            header("location: ".base_url);
        }
    }
?>