<?php include "Views/Templates/header.php";?>

    <div class="card-header mb-2 bg-success text-white d-flex justify-content-between">
        <h4>MARCAS</h4>
        <!--button de agregar marca-->
        <button class="btn btn-success" type="button" onclick="frmMarca();"><i class="fas fa-plus"></i></button>
    </div>
        
    <!--tablas de marcas-->
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblMarcas">
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
    
    <!--formulario de agregar marcas-->
    <div id="nuevo_marca" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nueva marca</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmMarca">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre de Marca</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Marca">
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarMar(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>