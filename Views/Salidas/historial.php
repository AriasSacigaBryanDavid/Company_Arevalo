<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card-header card-header-a text-white">
        <h4>HISTORIAL DE SALIDAS</h4>
    </div>
    <div class="card-body fondo-a text-white">
        <div class="form-group text-center font-weight-bold">
            <h4>Buscar</h4>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="desde">Desde</label>
                    <input id="desde" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="desde">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="hasta">Hasta</label>
                    <input id="hasta" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="hasta">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Registros</label>
                    <button class="btn btn-a btn-block text-white" type="button" onclick="mostrarTodo()" >Mostrar Todo</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-responsive text-white mt-2">
    <table class="table table-a table-hover text-white" id="t_historial_s">
        <thead class="table-a text-white">
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>N° Documento</th>
                <th>Motivo</th>
                <th>Empleado</th>
                <th>Almacén</th>
                <th>Total</th>
                <th>Fecha Salida</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table>
</div>
<?php include "Views/Templates/footer.php";?>