<?php include "Views/Templates/header.php";?>
    
    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>CAJEROS</h4>
        <!--button de agregar caja-->
        <button class="btn btn-a" type="button" onclick="frmCaja();"><i class="fas fa-plus text-white"></i></button>
    </div>
    <!--tabla de cajas-->       
    <div class="table-responsive text-white">
        <table class="table table-a table-hover text-white" id="tblCajas">
            <thead class="table-a text-white">
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
                <!-- <div class="modal-header card-header-a" >
                    <h5 class="modal-title text-white" id="title">Nuevo Caja</h5>
                    <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div> -->
                <div class="modal-body card-header-a text-white">
                <form method="post" id="frmCaja">
                    <div class="form-group d-flex justify-content-between">
                        <h4 class="modal-title text-white" id="title">Nuevo Caja</h4>
                        <button class="btn card-header-a text-white" type="button" data-bs-dismiss="modal"><i class="fas fa-arrow-right"></i></button>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre de Caja</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de Caja">
                    </div>
                    <button class="btn btn-b text-white" type="button" onclick="registrarCaj(event);" id="btnAccion">Agregar</button>
                    <button class="btn btn-c text-white" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>