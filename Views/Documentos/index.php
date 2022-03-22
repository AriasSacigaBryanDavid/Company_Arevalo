<?php include "Views/Templates/header.php";?>

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>DOCUMENTOS</h4>
        <!--button de agregar documento-->
        <button class="btn btn-a" type="button" onclick="frmDocumento();"><i class="fas fa-plus text-white"></i></button>
    </div>
    
    
<!--tabla de documentos-->
<div class="table-responsive text-white">
    <table class="table table-a table-hover text-white" id="tblDocumentos">
        <thead class="table-a text-white">
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
<!--formulario de agregar documentos-->
<div id="nuevo_documento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header-a">
                <h5 class="modal-title text-white" id="title">Nueva documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmDocumento">
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre de Documento</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Documento">
                    </div>
                    <button class="btn btn-outline-primary" type="button" onclick="registrarDoc(event);" id="btnAccion">Agregar</button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
   
<?php include "Views/Templates/footer.php";?>