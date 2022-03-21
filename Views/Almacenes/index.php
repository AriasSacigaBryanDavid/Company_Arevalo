<?php include "Views/Templates/header.php";?>
    

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>ALMACENES</h4>
        <!--button de agregar almacen-->
        <button class="btn btn-a" type="button" onclick="frmAlmacen();"><i class="fas fa-plus text-white"></i></button>
    </div>
    
    <!--tabla de almacenes-->
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblAlmacenes">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Encargado</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!--formulario de agregar almacenes-->
    <div id="nuevo_almacen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nueva almacén</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmAlmacen">
                        <div class="form-group">
                            <label for="nombre">Nombre de Almacén</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Almacén">
                        </div>      
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" placeholder="Dirección" rows="3"></textarea>
                        </div>  
                        <div class="form-group">
                            <label for="encargado">Encargado</label>
                            <input id="encargado" class="form-control" type="text" name="encargado" placeholder="Encargado de Almacén">
                        </div>     
                        <div class="form-group mb-2">
                            <label for="telefono">Teléfono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono">
                        </div>  
                        <div class="form-group mb-2">
                            <label for="correo">Correo</label>
                            <input id="correo" class="form-control" type="text" name="correo" placeholder="Correo">
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarAlm(event);" id="btnAccion">Agregar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>         
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include "Views/Templates/footer.php";?>