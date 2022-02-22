<?php include "Views/Templates/header.php";?>
<div class="card mb-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Arqueos</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary m-2" type="button" onclick="arqueoCaja();"><i class="fas fa-plus"></i></button>
                </div>
            </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="t_Arqueo">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>caja</th>
                    <th>Monto_Inicial</th>
                    <th>Monto_Final</th>
                    <th>Fecha_Apertura</th>
                    <th>Fecha Cierre</th>
                    <th>Total Ventas</th>
                    <th>Monto Total</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <!--formulario de agregar caja-->

    <div id="abrir_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark" >
                    <h5 class="modal-title text-white" id="title">Arqueo Caja</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                       <!-- <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmAbrirCaja" onsubmit="abrirArqueo(event);">
                        <div class="form-group mb-2">
                            <label for="monto_inicial">Monto Inicial</label>
                            <input type="hidden" id="id" name="id">
                            <input id="monto_inicial" class="form-control" type="text" name="monto_inicial" placeholder="Monto Inicial" required>
                        </div>
                        <button class="btn btn-primary" type="submit" id="btnAccion">Abrir</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>
