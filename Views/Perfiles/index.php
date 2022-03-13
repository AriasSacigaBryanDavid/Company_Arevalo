<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card-header bg-secondary text-white">
            <h4>Peril</h4>
    </div>

    <!--formulario de modificar datos de la empresa-->
    <div class="card-body">
        <form id="frmPerfil">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input id="id" class="form-control" type="hidden" name="id" value="">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input id="ruc" class="form-control" type="text" name="ruc" placeholder="Registro Único de Contribuyente" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" class="form-control" name="mensaje" placeholder="Mensaje" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>