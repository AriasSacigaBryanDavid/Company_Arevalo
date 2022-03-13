<?php include "Views/Templates/header.php";?>
    
    <div class="card-header mb-2 bg-warning text-white d-flex justify-content-between">
        <h4>CAJEROS</h4>
        <button class="btn btn-warning " type="button" onclick="frmCaja();"><i class="fas fa-plus text-white"></i></button>
    </div>
           
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblCajas">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Cajero</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <!--formulario de agregar caja-->

    <div id="nuevo_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark" >
                    <h5 class="modal-title text-white" id="title">Nuevo Caja</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                       <!-- <span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmCaja">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre de Caja</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de Caja">
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarCaj(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>