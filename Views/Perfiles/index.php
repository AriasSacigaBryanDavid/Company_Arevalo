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
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" value="<?php echo $data['usuario'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input id="dni" class="form-control" type="text" name="dni" placeholder="DNI" value="<?php echo $data['dni'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input id="cargo" class="form-control" type="text" name="cargo" placeholder="Cargos" value="<?php echo $data['cargo'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="almacen">Almacén</label>
                        <input id="almacen" class="form-control" type="text" name="almacen" placeholder="Almacén" value="<?php echo $data['almacen'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo" value="<?php echo $data['correo'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" value="<?php echo $data['telefono'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" value="<?php echo $data['direccion']?>" disabled>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>