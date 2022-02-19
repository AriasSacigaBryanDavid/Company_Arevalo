<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-dark text-white">
             <h4>Venta</h4>
        </div>
    </div>
    <!--Ventas de Datos-->
    <div class="card-body">
        <form id="frmDatoVenta">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label for="documento">Tipo de Documento</label>
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
                <div class="col-md-5">
                    <div class="form-group mb-3">
                        <label for="cliente">Clientes</label>
                        <select id="cliente" class="form-control" name="cliente">
                            <?php foreach ($data['clientes'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
            </div>
        </form>
    </div>
    <!--Ventas de Productos-->
    <div class="card mb-2">
        <div class="card-body bg-secondary text-white">
            <form id="frmProductoVenta">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras" onkeyup="buscarCodigoVe(event)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <input id="producto" class="form-control" type="text" name="producto" placeholder="Producto" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_bruto">Peso Bruto </label>
                            <input id="peso_bruto" class="form-control" type="text" name="peso_bruto" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecioVe(event)" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="kilos_tara">Kilos de Tara</label>
                            <input id="kilos_tara" class="form-control" type="text" name="kilos_tara" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_neto">Peso Neto</label>
                            <input id="peso_neto" class="form-control" type="text" name="peso_neto" placeholder="0.00" disabled >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="precio">Precio de Venta</label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="0.00" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sub_total">Sub Total </label>
                            <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="0.00" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Tablas de Productos-->
<div class="table-responsive">
    <table class="table table-dark table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Peso Bruto</th>
                <th>Cantidad</th>
                <th>Kilo tara</th>
                <th>Peso Neto</th>
                <th>Precio</th>
                <th>Sub Total</th>
                <th></th>
            </tr>
        </thead>
            <tbody id="tblDetalleVE">
            </tbody>
    </table>
</div>

<!--Total de Ventas Productos-->
<div class="row">
    <div class="col-md-4 ml-auto">
        <div class="form-group">
            <label for="total" class="font-weight-bold">Total </label>
            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
            <button class="btn btn-primary mt-2 btn-block" type="button" onclick="generarVenta()">Generar Venta</button>
            <button class="btn btn-danger mt-2 btn-block" type="button" onclick="CancelarVenta()">Cancelar Venta</button>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>