<?php include "Views/Templates/header.php";?>

<div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
    <h4>PROVEEDORES</h4>
    <!--button de agregar proveedores-->
    <button class="btn btn-a" type="button" onclick="frmProveedor();"><i class="fas fa-user-plus text-white"></i></button>
</div>
    
<!--tabla de proveedores-->
<div class="table-responsive text-white">
    <table class="table table-a table-hover text-white" id="tblProveedores">
        <thead class="table-a text-white">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Documento de Identidad</th>
                <th>Número de Identidad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
</div>

<!--formulario de agregar proveedores-->
<div id="nuevo_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header-a">
                <h5 class="modal-title text-white" id="title">Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmProveedor">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Proveedor">
                    </div>
                    <div class="form-group">
                        <label for="identidad">Documento de Identidad</label>
                            <select id="identidad" class="form-control" name="identidad">
                                <?php foreach ($data['identidades'] as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="n_identidad">N° de Identidad</label>
                        <input id="n_identidad" class="form-control" type="text" name="n_identidad" placeholder="Registro Único de Contribuyentes">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo">
                    </div>
                    <div class="form-group mb-2">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                    </div>
                    <button class="btn btn-outline-primary" type="button" onclick="registrarPro(event);" id="btnAccion">Registrar</button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>