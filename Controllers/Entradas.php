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
            $data['almacenes']=$this->model->getAlmacenes();
            $data['identidad']=$this->model->getIdentidades();
            $this->views->getView($this,"index", $data);
        }
        public function buscarProveedor($pro){
            $data =$this->model->getNidentidad($pro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
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
                    $msg = "ok";
                }else{
                    $msg = "Error al ingresar el producto";
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
                    $msg = "modificado";
                }else{
                    $msg = "Error al modificar el producto";
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
            $id_usuario = $_SESSION['id_usuario'];
            $total = $this->model->calcularEntrada($id_usuario);
            $data = $this->model->registrarEntrada($total['total']);
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
                    $peso = $kilos_total['peso_total']+ $peso_neto;
                    $this->model->actualizarPeso($peso, $id_pro);
                }
                $vaciar = $this->model->vaciarDetalle($id_usuario);
                if($vaciar == 'ok'){
                    $msg =array('msg' => 'ok', 'id_entrada' => $id_entrada['id']);
                }
                
            }else{
                $msg='Error al realizar la entrada';
            }
            echo json_encode($msg);
            die();
        }
        public function generarPdf($id_entrada){
            $empresa = $this->model->getEmpresa();
            $productos = $this->model->getProEntrada($id_entrada);
            require('Libraries/fpdf/fpdf.php');

            $pdf = new FPDF('P','mm','A4');
            $pdf->AddPage();
            $pdf->setMargins(3, 0, 0);
            //Datos de la Empresa
            $pdf->SetTitle('Reporte de Entrada');
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(190,10,utf8_decode($empresa['nombre']), 0, 1,'C');
            $pdf->Image(base_url . 'Assets/img/logo.jpg', 170, 10, 30, 30);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(170, 8, utf8_decode($empresa['mensaje']), 0, 1,'C');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(31, 8, 'RUC: ', 0, 0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(40, 8,  $empresa['ruc'], 0, 1,'C');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(39, 8, utf8_decode('Teléfono: '), 0, 0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 8, $empresa['telefono'], 0, 1,'C');

            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40, 8, utf8_decode('Dirección:'), 0, 0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(140, 8, utf8_decode($empresa['direccion']), 0, 1,'C',0);


            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(31, 8, utf8_decode('Folio:'), 0, 0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 8, $id_entrada, 0, 1,'C');
            $pdf->Ln();

            //Encabezado de productos
            $pdf->SetFillColor(0,0,0);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(12,5, 'Cant.', 0,0, 'L', true);
            $pdf->Cell(70,5, utf8_decode('Nombre'), 0,0, 'L', true);
            $pdf->Cell(13,5, 'Rend.', 0,0, 'L', true);
            $pdf->Cell(23,5, 'Peso Bruto', 0,0, 'L', true);
            $pdf->Cell(21,5, 'Kilos Tara', 0,0, 'L', true);
            $pdf->Cell(22,5, 'Peso Neto', 0,0, 'L', true);
            $pdf->Cell(15,5, 'Precio', 0,0, 'L', true);
            $pdf->Cell(30,5, 'Sub Total', 0,1, 'L', true);

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
            $pdf->Cell(190, 6, 'Total a pagar', 1, 1,'R');
            $pdf->Cell(190, 6, number_format($total, 2, '.', ','), 0, 1,'R');
            $pdf->Output();
        }    


    
        public function historial(){
            $this->views->getView($this,"historial");
        }
        public function  listar_historial(){
           $data=$this->model->getHistorialEntradas();
           for ($i=0; $i<count($data); $i++){
            $data[$i]['acciones']='<div>
               <a class="btn btn-danger" href="'.base_url."Entradas/generarPdf/".$data[$i]['id'].'" target="_blank"><i class="fas fa-file-pdf"></i></a>
               </div>';
            }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }
        
        
        



    }


?>