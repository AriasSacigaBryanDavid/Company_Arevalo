<!--<?php
    date_default_timezone_set('America/Mexico_City');
    $Fech = date("Y-m-d");  ?>-->
<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-success text-white">
             <h4>Entrada</h4>
        </div>
    </div>
    <!--Entradas de Datos-->
    <div class="card-body">
        <form id="frmDatoEntrada">
            <div class="row">
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
                <div class="col-md-2">
                    <div class="form-group mb-3">
                        <label for="identidad">Documento de Identidad</label>
                            <select id="identidad" class="form-control" name="identidad">
                                <?php foreach ($data['identidad'] as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="n_identidad">N° de Identidad</label>
                        <input type="hidden" id="id" name="id">
                        <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="N° de Identidad" onkeyup="buscarProveedor(event)">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre de Proveedor</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" disabled>
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
    <!--Entradas de Productos-->
    <div class="card mb-2">
        <div class="card-body bg-secondary text-white">
            <form id="frmProductoEntrada">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i>Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras" onkeyup="buscarCodigoEn(event)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="producto">Nombre del Producto</label>
                            <input id="producto" class="form-control" type="text" name="producto" placeholder="Nombre del Producto" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularTaraEn(event)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_bruto">Peso Bruto </label>
                            <input id="peso_bruto" class="form-control" type="text" name="peso_bruto" placeholder="Peso Bruto" onkeyup="calcularPrecioEn(event)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_neto">Peso Neto</label>
                            <input id="peso_neto" class="form-control" type="text" name="peso_neto" placeholder="Peso Neto" disabled >
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
                    <!--
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="fecha_vencimiento">fecha de Vencimiento</label>
                            <input id="fecha_vencimiento" class="form-control" type="date" value="<?php echo ($Fech); ?>" name="fecha_vencimiento" placeholder="Fecha de Venta">
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!--Tablas de Productos-->
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
            <th>Fecha_vencimiento</th>
            <th></th>
        </tr>
    </thead>
        <tbody>
        </tbody>
</table>
<!--Total de Entradas Productos-->
<div class="row">
    <div class="col-md-4 ml-auto">
        <div class="form-group">
            <label for="total" class="font-weight-bold">Total </label>
            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
            <button class="btn btn-primary mt-2 btn-block" type="button">Generar Compra</button>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>