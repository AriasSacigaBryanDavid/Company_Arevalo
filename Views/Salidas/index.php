<?php
    date_default_timezone_set('America/Mexico_City');
    $Fech = date("Y-m-d");  ?>

<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-primary text-white">
             <h4>Salida</h4>
        </div>
    </div>
    <div class="card-body">
            <form id="frmEntradasa">
                <div class="row">
                <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="fecha_salida">Fecha de Salida</label>
                            <input id="fecha_salida" class="form-control" type="date" value="<?php echo ($Fech); ?>" name="fecha_salida" placeholder="Fecha de salida">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="documento">Documento</label>
                                <select id="documento" class="form-control" name="documento">
                                <?php foreach ($data['documentos'] as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="n_documento">N° de  Documentos</label>
                            <input id="n_documento" class="form-control" type="text" name="n_documento" placeholder="N° de Documento">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="motivo">Motivo</label>
                            <textarea id="motivo" class="form-control" name="direccion" placeholder="Motivo" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="empleado">Empleado</label>
                            <input id="empleado" class="form-control" type="text" name="empleado" placeholder="Empleado" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group mb-3" > 
                            <label for="almacen">Almacén</label>
                            <select id="almacen" class="form-control" name="almacen">
                            <?php foreach ($data['almacenes'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                   

                </div>

            </form>
    </div>
    <div class="card-body bg-secondary text-white">
            <form id="frmSalida">
                <div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i>Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras" onkeyup="buscarCodigo(event)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_bruto">Peso Bruto </label>
                            <input id="peso_bruto" class="form-control" type="text" name="peso_bruto" placeholder="Peso Bruto" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_neto">Peso Neto</label>
                            <input id="peso_neto" class="form-control" type="text" name="peso_neto" placeholder="peso_neto" >
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="kilos_tara">Kilos de Taras </label>
                            <input id="kilos_tara" class="form-control" type="text" name="kilos_tara" placeholder="Kilos de Tara" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="precio">Precio de Compra</label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio de Compra" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sub_total">Sub Total </label>
                            <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub Total" disabled>
                        </div>
                    </div>
                   
                   

                </div>

            </form>
    </div>
</div>
<table class="table table-dark table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Cantidad</th>
                 <th>Peso_Bruto</th>
                 <th>Peso_Neto</th>
                 <th>Kilo_tara</th>
                 <th>Precio</th>
                 <th>Sub Total</th>
                 <th></th>
            </tr>
        </thead>
        <tbody id="tblDetalle">
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 ml-auto">
                <div class="form-group">
                <label for="total" class="font-weight-bold">Total </label>
                <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
                <button class="btn btn-primary mt-2 btn-block" type="button">Generar Salida</button>
                </div>
            
                

        </div>
    </div>
































<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Salidas</li>
    </ol>

    <button class="btn btn-primary" type="button" onclick="frmSalida();"><i class="fas fa-user-plus"></i></button>
    <table class="table table-dark" id="tblSalidas">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Fecha_salida</th>
                <th>Documento</th>
                <th>N°</th>
                <th>Almacén</th>
                <th>Motivo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nuevo_salida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Entrada</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method ="post" id="frmSalida">
                    <div class="form-group">
                            <label for="fecha_salida">fecha de Salida</label>
                            <input type="hidden" id="id" name="id">
                            <input id="fecha_salida" class="form-control" type="text" name="fecha_salida" placeholder="Fecha de Salida">
                        </div>
                        <div class="form-group " > 
                            <label for="documento">Documento</label>
                            <select id="documento" class="form-control" name="documento">
                            <?php foreach ($data['documentos'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="n_documento">N° de  Documentos</label>
                            <input id="n_documento" class="form-control" type="text" name="n_documento" placeholder="N° de Documento">
                        </div>
                        <div class="form-group" > 
                            <label for="almacen">Almacén</label>
                            <select id="almacen" class="form-control" name="almacen">
                            <?php foreach ($data['almacenes'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="motivo">Motivo</label>
                            <input id="motivo" class="form-control" type="text" name="motivo" placeholder="Motivo">
                        </div>
                        
                        <div class="form-group" > 
                            <label for="producto">Producto</label>
                            <select id="producto" class="form-control" name="producto">
                            <?php foreach ($data['productos'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad">
                        </div>
                        <div class="form-group mb-2">
                            <label for="precio">Precio</label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio">
                        </div>
                        
                        <button class="btn btn-primary" type="button" onclick="registrarSal(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
<?php include "Views/Templates/footer.php";?>