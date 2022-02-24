<?php include "Views/Templates/header.php";?>

    <div class="card mb-2">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Unidades</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary mb-2" type="button" onclick="frmUnidad();"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblUnidades">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>nombre</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <!--formulario de agregar categorias-->
    <div id="nuevo_unidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nueva marca</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                         <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUnidad">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre de Marca</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Marca">
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarUni(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
   
<?php include "Views/Templates/footer.php";?>