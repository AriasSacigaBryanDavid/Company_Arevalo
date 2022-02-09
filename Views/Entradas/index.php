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
                        
                        <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="N° de Identidad" onkeyup="buscarProveedor(event)">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group mb-3">
                        <label for="nombre_proveedor">Nombre de Proveedor</label>
                        <input id="nombre_proveedor" class="form-control" type="text" name="nombre_proveedor" placeholder="Nombre del Proveedor" disabled>
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i> Código de barras</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código de barras" onkeyup="buscarCodigoEn(event)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <input id="producto" class="form-control" type="text" name="producto" placeholder="Producto" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="rendimiento">Rendimiento</label>
                            <input id="rendimiento" class="form-control" type="text" name="rendimiento" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="peso_bruto">Peso Bruto </label>
                            <input id="peso_bruto" class="form-control" type="text" name="peso_bruto" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecioEn(event)">
                        </div>
                    </div>
                    <div class="col-md-3">
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
                            <label for="precio">Precio de Compra</label>
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
<table class="table table-dark table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Rendimiento</th>
            <th>Peso Bruto</th>
            <th>Cantidad</th>
            <th>Kilo tara</th>
            <th>Peso Neto</th>
            <th>Precio</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
    </thead>
        <tbody  id="tblDetalleEN">
        </tbody>
</table>
<!--Total de Entradas Productos-->
<div class="row">
    <div class="col-md-4 ml-auto">
        <div class="form-group">
            <label for="total" class="font-weight-bold">Total </label>
            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
            <button class="btn btn-primary mt-2 btn-block" type="button" onclick="generarEntrada()">Generar Entrada</button>
        </div>
    </div>
</div>
<!--Crear Productos-->
<div id="nuevo_Crearproducto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Crear Producto</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCrearProducto">
                         <div class="form-group">
                            <label for="codigo">Código</label>
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
                        </div>
                        <div class="form-group " > 
                            <label for="marca">Marca</label>
                            <select id="marca" class="form-control" name="marca">
                            <?php foreach ($data['marcas'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group " > 
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria">
                            <?php foreach ($data['categorias'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-2" > 
                            <label for="unidad">Unidad</label>
                            <select id="unidad" class="form-control" name="unidad">
                            <?php foreach ($data['unidades'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6  mb-2" >
                                <div class="form-group">
                                    <label for="precio_compra">Precio Compra</label>
                                    <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio compra">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="precio_venta">Precio Venta</label>
                                    <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio Venta">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="crearPrododucto(event);">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>