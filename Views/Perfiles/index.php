<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card-header text-center bg-info text-white">
            <h4>Perfil</h4>
    </div>

    <!--formulario de modificar datos de la empresa-->
    <div class="card-body">
        <form id="frmPerfil">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input id="id" class="form-control" type="hidden" name="id" value="">
                        <label for="nombre">Usuario</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Usuario" value="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" class="form-control" type="text" name="dni" placeholder="DNI" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input id="cargo" class="form-control" type="text" name="cargo" placeholder="Cargos" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="almacen">Almacén</label>
                        <input id="almacen" class="form-control" type="text" name="almacen" placeholder="Almacén" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" value="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>