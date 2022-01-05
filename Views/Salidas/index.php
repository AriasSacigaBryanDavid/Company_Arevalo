<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Salidas</li>
    </ol>

    <button class="btn btn-primary mb-2" type="button" onclick="frmSalida();"><i class="fas fa-user-plus"></i></button>
    <table class="table table-dark" id="tblSalidas">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Fecha_Salida</th>
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
                    <h5 class="modal-title text-white" id="title">Nuevo Salida</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmSalida">
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
                            <label for="precio">Precio </label>
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