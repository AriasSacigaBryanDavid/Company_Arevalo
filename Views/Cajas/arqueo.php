<?php include "Views/Templates/header.php";?>
    
    <div class="card">
        <div class="card-header card-header-a text-white d-flex justify-content-between">
            <h4>Arqueos</h4>
            <!--button de agregar Arqueo-->
            <button class="btn btn-success" type="button" onclick="arqueoCaja();" id="btn_abrir"><i class="fas fa-power-off"></i> Abrir Caja</button>
            <!--button de cerrar Arqueo-->
            <button class="btn btn-danger" type="button" onclick="cerrarCaja();" id="btn_cerrar"><i class="fas fa-power-off"></i> Cerrar Caja</button>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="form-group text-center font-weight-bold">
                <h4>Buscar</h4>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="desde_a">Desde</label>
                        <input id="desde_a" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="desde_a">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hasta_a">Hasta</label>
                        <input id="hasta_a" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" name="hasta_a">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Registros</label>
                        <button class="btn btn-a btn-block text-white" type="button" onclick="mostrarTodo_a()" >Mostrar Todo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--Tabla de Arqueos-->   
    <div class="table-responsive text-white mt-2">
        <table class="table table-a table-hover text-white" id="tblArqueos">
            <thead class="table-a text-white">
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Caja</th>
                    <th>Monto Inicial</th>
                    <th>Monto Final</th>
                    <th>Fecha Apertura</th>
                    <th>Fecha Cierre</th>
                    <th>Total Ventas</th>
                    <th>Monto Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

     <!--formulario de agregar Arqueo-->

     <div id="abrir_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header card-header-a" >
                    <h5 class="modal-title text-white" id="title">Arqueo Caja</h5>
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div> -->
                <div class="modal-body card-header-a text-white">
                <form method="post" id="frmAbrirCaja" onsubmit="abrirArqueo(event);">
                    <div class="form-group d-flex justify-content-between">
                        <h4 class="modal-title text-white" id="title">Arqueo Caja</h4>
                        <button class="btn card-header-a text-white" type="button" data-bs-dismiss="modal"><i class="fas fa-arrow-right"></i></button>
                    </div>    
                    <div class="form-group " > 
                        <label for="caja">Cajas</label>
                        <select id="caja" class="form-control" name="caja">
                        <?php foreach ($data['cajas'] as $row) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="monto_inicial">Monto Inicial</label>
                            <input type="hidden" id="id" name="id">
                            <input id="monto_inicial" class="form-control" type="number" name="monto_inicial" placeholder="Monto Inicial" >
                        </div>
                        <div id="ocultar_campos">
                            <div class="form-group">
                                <label for="monto_final">Monto Final</label>
                                <input id="monto_final" class="form-control" type="text" disabled>
                            </div>
                            <div class="form-group">
                                <label for="total_ventas">Total Ventas</label>
                                <input id="total_ventas" class="form-control" type="text" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="monto_general">Monto Total</label>
                                <input id="monto_general" class="form-control" type="text" disabled>
                            </div>
                        </div>
                        <button class="btn btn-b text-white" type="submit" id="btnAccion">Abrir</button>
                        <button class="btn btn-c text-white" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>