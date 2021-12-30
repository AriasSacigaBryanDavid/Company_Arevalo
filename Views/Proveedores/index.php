<?php include "Views/Templates/header.php";?>
    <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Proveedores</li>
    </ol>
    <button class="btn btn-primary mb-2" type="button" onclick="frmProveedor();"><i class="fas fa-user-plus"></i></button>
    <table class="table table-dark" id="tblProveedores">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>RUC</th>
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
    <!--formulario de agregar clientes-->
    <div id="nuevo_proveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Proveedor</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                       <!-- <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmProveedor">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Proveedor">
                        </div>
                        <div class="form-group">
                            <label for="ruc">RUC</label>
                            <input type="hidden" id="id" name="id">
                            <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Registro Único de Contribuyentes">
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
                        <button class="btn btn-primary" type="button" onclick="registrarPro(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>