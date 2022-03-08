<?php include "Views/Templates/header.php";?>
    
    <div class="card-header mb-2 bg-primary text-white d-flex justify-content-between">
        <h4>Cargos</h4>
        <!--buton de agregar cargo-->
        <button class="btn btn-primary" type="button" onclick="frmCargo();"><i class="fas fa-plus"></i></button>
    </div>
      
    <!--tabla de cargos-->
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblCargos">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <!--formulario de agregar cargos-->
    <div id="nuevo_cargo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark" >
                    <h5 class="modal-title text-white" id="title">Nuevo Cargo</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" id="frmCargo">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre de Cargo</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Cargo">
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarCar(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>