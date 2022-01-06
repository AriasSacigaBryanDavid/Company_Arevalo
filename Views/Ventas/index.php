<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"></li>
    </ol>

    <div class="card">
        <div class="card-body">
            <form id="frmVenta">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="fecha_venta">Fecha de venta</label>
                            <input id="fecha_venta" class="form-control" type="text" name="fecha_venta" placeholder="Fecha de Venta">
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
                            <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="N° de Documento">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group mb-3">
                            <label for="nombre">Nombre</label>
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
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="precio_total">Precio Total</label>
                            <input id="precio_total" class="form-control" type="text" name="precio_total" placeholder="Precio Total" disabled>
                        </div>
                    </div>
                    <div class="col-md-1">
                         <button class="btn btn-primary" type="button" >Registrar</button>
                    </div>
                    <div class="col-md-1">
                         <button class="btn btn-dark" type="button" >Agregar más</button>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    
                    
                </div>

            </form>
        </div>
    </div>

    <table class="table table-dark" id="tbl">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Documento</th>
                <th>Peso_bruto</th>
                <th>Peso_neto</th>
                <th>Kilos_tara</th>
                <th>Precio_venta</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


<?php include "Views/Templates/footer.php";?>