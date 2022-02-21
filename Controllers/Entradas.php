<?php
    class Entradas extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }  
        public function index(){
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['documentos']=$this->model->getDocumentos();
            $data['proveedores']=$this->model->getProveedores();
            $this->views->getView($this,"index", $data);
        }
        public function buscarCodigoEn($cod){
            $data =$this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function ingresar(){
            $id= $_POST['id'];
            $datos = $this->model->getProductos($id);
            $id_producto= $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $rendimiento = $_POST['rendimiento'];
            $peso_bruto = $_POST['peso_bruto'];
            $cantidad = $_POST['cantidad'];
            $comprobar = $this->model->consultarDetalle($id_producto, $id_usuario);
            if (empty($comprobar)) {
                $kilos_tara = $cantidad * 0.2;
                $peso_neto = $peso_bruto - $kilos_tara;
                $precio = $datos['precio_compra'];
                $sub_total = $precio * $peso_neto;
                
                $data= $this->model->registrarDetalle($id_producto, $id_usuario, $rendimiento, $peso_bruto, $cantidad, $kilos_tara, $peso_neto, $precio, $sub_total);
                
                if($data == "ok"){
                    $msg =array('msg' =>'Producto ingresado a la entrada','icono'=>'success');
                }else{
                    $msg =array('msg' =>'Error al ingresar el producto a la entrada','icono'=>'error');
                }
            }else{
                $total_peso_bruto= $comprobar['peso_bruto'] + $peso_bruto;
                $total_cantidad= $comprobar['cantidad'] + $cantidad;
                $kilos_tara = $total_cantidad * 0.2;
                $peso_neto = $total_peso_bruto - $kilos_tara;
                $precio = $datos['precio_compra'];
                $sub_total = $precio * $peso_neto;
                
                $data= $this->model->actualizarDetalle($rendimiento,$total_peso_bruto, $total_cantidad, $kilos_tara, $peso_neto, $precio, $sub_total, $id_producto, $id_usuario);
                
                if($data == "modificado"){
                    $msg =array('msg' =>'Producto actualizado','icono'=>'success');
                }else{
                    $msg =array('msg' =>'Error al actualizar el producto','icono'=>'error');
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function listar(){
            $id_usuario =$_SESSION['id_usuario'];
            $data['detalle'] = $this->model->getDetalle($id_usuario);
            $data['total_pagar'] = $this->model->calcularEntrada($id_usuario);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
        public function delete($id){
            $data = $this->model->deleteDetalle($id);
            if($data == 'ok'){
                $msg ='ok';
            }else{
                $msg ='error';
            }
            echo json_encode($msg);
            die();
        }
        public function registrarEntrada(){
            $id_documento=$_POST['documento'];
            $n_documento =$_POST['n_documento'];
            $id_proveedor = $_POST['proveedor'];
            if(empty($id_documento) || empty($n_documento) || empty($id_proveedor)){
                $msg="Todos los campos son obligatorios";
            }else {
                $id_usuario = $_SESSION['id_usuario'];
                $id_almacen = $this->model->getAlmacen($id_usuario);
                $total = $this->model->calcularEntrada($id_usuario);
                $data = $this->model->registrarEntrada($id_documento,$n_documento,$id_proveedor,$id_usuario,$id_almacen['id_almacen'],$total['total']);
                if($data == 'ok'){
                    $detalle = $this->model->getDetalle($id_usuario);
                    $id_entrada = $this->model->id_entrada();
                    foreach($detalle as $row){
                        $id_pro = $row['id_producto'];
                        $rendimiento =$row['rendimiento'];
                        $peso_bruto=$row['peso_bruto'];
                        $cantidad = $row['cantidad'];
                        $kilos_tara = $cantidad * 0.2;
                        $peso_neto = $peso_bruto - $kilos_tara;
                        $precio = $row['precio'];
                        $sub_total = $precio * $peso_neto;
                        $this->model->registrarDetalleEntrada($id_entrada['id'],$id_pro, $rendimiento, $peso_bruto, $cantidad, $kilos_tara,$peso_neto,$precio, $sub_total);
                        $stock_actual= $this->model->getProductos($id_pro);
                        $stock = $stock_actual['cantidad'] + $cantidad;
                        $this->model->actualizarStock($stock, $id_pro);
                        $kilos_total= $this->model->getProductos($id_pro);
                        $peso = $kilos_total['peso_total'] + $peso_bruto;
                        $this->model->actualizarPeso($peso, $id_pro);
                    }
                        $vaciar = $this->model->vaciarDetalle($id_usuario);
                            if($vaciar == 'ok'){
                                $msg =array('msg' => 'ok', 'id_entrada' => $id_entrada['id']);
                            }
                }else{
                    $msg='Error al realizar la entrada';
                }
            }
            
            echo json_encode($msg);
            die();
        }
        public function generarPdf($id_entrada){
            $empresa = $this->model->getEmpresa();
            $productos = $this->model->getProEntrada($id_entrada);
            require('Libraries/fpdf/fpdf.php');

            $pdf = new FPDF('P','mm','letter');
            $pdf->AddPage();
            $pdf->setMargins(5, 5, 5);
            //Datos de la Empresa
            $pdf->SetTitle('Reporte de Entrada');
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,10,utf8_decode($empresa['nombre']), 0, 1,'C');
            $pdf->Image(base_url . 'Assets/img/logo.jpg', 165, 10, 45, 32);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(170, 10, utf8_decode($empresa['mensaje']), 0, 1,'C');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20, 7, 'RUC: ', 0, 0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 7, $empresa['ruc'], 0, 1,'L');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(22, 7, utf8_decode('Teléfono: '), 0, 0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 7, $empresa['telefono'], 0, 1,'L');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(22, 7, utf8_decode('Dirección: '), 0, 0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 7, utf8_decode($empresa['direccion']), 0, 1,'L');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(20, 7, utf8_decode('Folio:'), 0, 0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 7, $id_entrada, 0, 1,'L');
            $pdf->Ln();

            //Datos de la entrada
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetFillColor(130,198,121);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(206, 5, utf8_decode('Información de Entrada'), 1, 1, 'C', 1);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(18,5, utf8_decode('Fecha'), 1,0, 'L', true);
            $pdf->Cell(15,5, utf8_decode('Hora'), 1,0, 'L', true);
            $pdf->Cell(49,5, utf8_decode('Documento'), 1,0, 'L', true);
            $pdf->Cell(35,5, utf8_decode('N°Documento'), 1,0, 'L', true);
            $pdf->Cell(70,5, utf8_decode('Empleado'), 1,0, 'L', true);
            $pdf->Cell(19,5, utf8_decode('Almacén'), 1,1, 'L', true);
            
            $pdf->SetTextColor(0,0,0);
            
            $Detalleentrada = $this->model->DetallesEntrada($id_entrada);
            $pdf->Cell(18,5, utf8_decode($Detalleentrada['fecha']) , 0, 0, 'L');
            $pdf->Cell(15,5, utf8_decode($Detalleentrada['hora']) , 0, 0, 'L');
            $pdf->Cell(49,5, utf8_decode($Detalleentrada['documento']), 0, 0, 'L');
            $pdf->Cell(35,5, utf8_decode($Detalleentrada['n_documento']) , 0,0, 'L');
            $pdf->Cell(70,5, utf8_decode($Detalleentrada['usuario']) , 0,0, 'L');
            $pdf->Cell(19,5, utf8_decode($Detalleentrada['almacen']) , 0,1, 'L');
    
            $pdf->Ln();

            $pdf->Ln();
            //Encabezado de proveedor
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->SetFillColor(130,198,121);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(206, 5, "Dato del Proveedor", 1, 1, 'C', 1);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(40,5, utf8_decode('Nombre'), 1,0, 'L', true);
            $pdf->Cell(20,5, utf8_decode('Identidad'), 1,0, 'L', true);
            $pdf->Cell(30,5, utf8_decode('N°Indentidad'), 1,0, 'L', true);
            $pdf->Cell(20,5, utf8_decode('Teléfono'), 1,0, 'L', true);
            $pdf->Cell(40,5, utf8_decode('Correo'), 1,0, 'L', true);
            $pdf->Cell(56,5, utf8_decode('Dirección'), 1,1, 'L', true);

            $pdf->SetTextColor(0,0,0);
            
            $proveedor = $this->model->proveedorEntrada($id_entrada);
            $pdf->Cell(40,5, utf8_decode($proveedor['proveedor']), 0, 0, 'L');
            $pdf->Cell(20,5, utf8_decode($proveedor['identidad']) , 0,0, 'L');
            $pdf->Cell(30,5, $proveedor['n_identidad'], 0, 0, 'L');
            $pdf->Cell(20,5, $proveedor['telefono'], 0, 0, 'L');
            $pdf->Cell(40,5, utf8_decode($proveedor['correo']) , 0,0, 'L');
            $pdf->Cell(56,5, utf8_decode($proveedor['direccion']) , 0,1, 'L');
            
            $pdf->Ln();

            $pdf->Ln();
            //Encabezado de productos
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->SetFillColor(130,198,121);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(206, 5, "Detalles de Productos", 1, 1, 'C', 1);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(12,5, 'Cant.', 1,0, 'L', true);
            $pdf->Cell(70,5, utf8_decode('Nombre'), 1,0, 'L', true);
            $pdf->Cell(13,5, 'Rend.', 1,0, 'L', true);
            $pdf->Cell(23,5, 'Peso Bruto', 1,0, 'L', true);
            $pdf->Cell(21,5, 'Kilos Tara', 1,0, 'L', true);
            $pdf->Cell(22,5, 'Peso Neto', 1,0, 'L', true);
            $pdf->Cell(15,5, 'Precio', 1,0, 'L', true);
            $pdf->Cell(30,5, 'Sub Total', 1,1, 'L', true);

            $pdf->SetTextColor(0,0,0);
            $total = 0.00;
            foreach ($productos as $row) {
                $total = $total + $row['sub_total'];
                $pdf->Cell(12,5, $row['cantidad'], 0, 0, 'L');
                $pdf->Cell(70,5, utf8_decode($row['nombre']) , 0,0, 'L');
                $pdf->Cell(13,5, $row['rendimiento'], 0, 0, 'L');
                $pdf->Cell(23,5, number_format($row['peso_bruto'], 2, '.',',') , 0,0, 'L');
                $pdf->Cell(22,5, number_format($row['cantidad']*0.2, 2, '.',',') , 0,0, 'L');
                $pdf->Cell(22,5, number_format($row['peso_neto'], 2, '.',',') , 0,0, 'L');
                $pdf->Cell(15,5, $row['precio'], 0, 0, 'L');
                $pdf->Cell(30,5, number_format($row['sub_total'], 2, '.',',') , 0,1, 'L');
            }
            $pdf->Ln();
            $pdf->Cell(206, 6, 'Total a pagar', 1, 1,'R');
            $pdf->Cell(206, 6, number_format($total, 2, '.', ','), 0, 1,'R');
            $pdf->Output();
        }    
        public function historial(){
            $this->views->getView($this,"historial");
        }
        public function  listar_historial(){
           $data=$this->model->getHistorialEntradas();
           for ($i=0; $i<count($data); $i++){
                if($data[$i]['estado'] ==1){
                    $data[$i]['estado'] = '<span class="p-1 mb-2 bg-success text-white rounded">Completado</span>';
                    $data[$i]['acciones']='<div>
                    <button class="btn btn-warning mb-2" type="button" onclick="btnAnularE('.$data[$i]['id'].')"><i class="fas fa-ban"></i></button>
                    <a class="btn btn-primary" href="'.base_url."Entradas/generarPdf/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    </div>';
                }else {
                    $data[$i]['estado'] ='<span class="p-1 mb-2 bg-danger text-white rounded">Anulado</span>';
                    $data[$i]['acciones']='<div>
                    <a class="btn btn-primary" href="'.base_url."Entradas/generarPdf/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    </div>';
                }  
            }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }
        public function cancelarEntrada(){
            $id_usuario = $_SESSION['id_usuario'];
            $id_entrada = $this->model->id_entrada();
            $vaciar = $this->model->vaciarDetalle($id_usuario);
            if($vaciar == 'ok'){
                $msg =array('msg' => 'ok', 'id_entrada' => $id_entrada['id']);
            }
            echo json_encode($msg);
            die();
        }
        public function anularEntrada($id_entrada){
            $data = $this->model->getAnularEntrada($id_entrada);
            $anular = $this->model->getAnular($id_entrada);
            foreach ($data as $row) {
                $stock_actual= $this->model->getProductos($row['id_producto']);
                $stock = $stock_actual['cantidad'] - $row['cantidad'] ;
                $this->model->actualizarStock($stock, $row['id_producto']);
                $kilos_total= $this->model->getProductos($row['id_producto']);
                $peso = $kilos_total['peso_total'] - $row['peso_bruto'];
                $this->model->actualizarPeso($peso, $row['id_producto']);
            }
            if ($anular == 'ok') {
                $msg = array('msg' => 'Entrada Anulada', 'icono' => 'success');
            }else {
                $msg = array('msg' => 'Error al anular la entrada', 'icono' => 'error');
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }
        
        
        
        



    }


?>