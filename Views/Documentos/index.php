<?php include "Views/Templates/header.php";?>
<div class="card mb-2">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Documentos</h4>
        </div>
    </div>
    <!--buton de agregar proveedores-->
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary mb-2" type="button" onclick="frmDocumento();"><i class="fas fa-plus"></i></button>
        </div>
    </div>
</div>
<!--tabla de documentos-->
<table class="table table-dark" id="tblDocumentos">
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
<!--formulario de agregar categorias-->
<div id="nuevo_documento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="title">Nueva documento</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                         <!--<span aria-hidden="true">&times;</span>-->
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmDocumento">
                    <div class="form-group mb-2">
                        <label for="nombre">Nombre de Documento</label>
                        <input type="hidden" id="id" name="id">
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Documento">
                    </div>
                    <button class="btn btn-primary" type="button" onclick="registrarDoc(event);" id="btnAccion">Agregar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
   
<?php include "Views/Templates/footer.php";?>