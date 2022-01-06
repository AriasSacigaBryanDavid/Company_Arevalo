<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Entradas</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmEntrada();"><i class="fas fa-user-plus"></i></button>
    <table class="table table-dark" id="tblEntradas">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Fecha_Compra</th>
                <th>Documento</th>
                <th>N°</th>
                <th>Proveedor</th>
                <th>Almacén</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Peso_bruto</th>
                <th>Peso_neto</th>
                <th>Kilos_tara</th>
                <th>Precio_compra</th>
                <th>Precio_venta</th>
                <th>Precio_total</th>
                <th>Fecha_vencimiento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nuevo_entrada" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Entrada</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEntrada">
                    <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código">
                        </div>
                        <div class="form-group">
                            <label for="fecha_compra">fecha de Compra</label>
                            <input id="fecha_compra" class="form-control" type="text" name="fecha_compra" placeholder="Fecha de Compra">
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
                        <div class="form-group " > 
                            <label for="proveedor">Proveedor</label>
                            <select id="proveedor" class="form-control" name="proveedor">
                            <?php foreach ($data['proveedores'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" > 
                            <label for="almacen">Almacén</label>
                            <select id="almacen" class="form-control" name="almacen">
                            <?php foreach ($data['almacenes'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-2" > 
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
                        <div class="form-group">
                            <label for="peso_bruto">Peso Bruto</label>
                            <input id="peso_bruto" class="form-control" type="text" name="peso_bruto" placeholder="Peso Bruto">
                        </div>
                        <div class="form-group">
                            <label for="peso_neto">Peso Neto</label>
                            <input id="peso_neto" class="form-control" type="text" name="peso_neto" placeholder="Peso Neto">
                        </div>
                        <div class="form-group">
                            <label for="kilos_tara">Kilos de Taras</label>
                            <input id="kilos_tara" class="form-control" type="text" name="kilos_tara" placeholder="Kilos de Tara">
                        </div>
                        <div class="form-group">
                            <label for="precio_compra">Precio de Compra</label>
                            <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio de Compra">
                        </div>
                        <div class="form-group">
                            <label for="precio_venta">Precio de Venta</label>
                            <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio de Venta">
                        </div>
                        <div class="form-group">
                            <label for="precio_total">Precio de Total</label>
                            <input id="precio_total" class="form-control" type="text" name="precio_total" placeholder="Precio Total">
                        </div>
                        <div class="form-group mb-2">
                            <label for="fecha_vencimiento">fecha de Vencimiento</label>
                            <input id="fecha_vencimiento" class="form-control" type="text" name="fecha_vencimiento" placeholder="Fecha de Venta">
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarEnt(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php include "Views/Templates/footer.php";?>