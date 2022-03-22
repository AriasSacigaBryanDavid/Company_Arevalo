<?php include "Views/Templates/header.php";?>

    <div class="card-header card-header-a mb-2 text-white d-flex justify-content-between">
        <h4>PRODUCTOS</h4>
        <!--button de agregar producto-->
        <button class="btn btn-a" type="button" onclick="frmProducto();"><i class="fas fa-plus"></i></i></button>
    </div>
        
    <!--tabla de productos-->
    <div class="table-responsive text-white">
        <table class="table table-a table-hover text-white" id="tblProductos">
            <thead class="table-a text-white">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Unidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
   
    <!--formulario de agregar productos-->
    <div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header card-header-a">
                    <h5 class="modal-title text-white" id="title">Nuevo Producto</h5>
                    <button type="button"    class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmProducto">
                         <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripción">
                        </div>
                        <div class="form-group " > 
                            <label for="marca">Marca</label>
                            <select id="marca" class="form-control" name="marca">
                            <?php foreach ($data['marcas'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group " > 
                            <label for="categoria">Categoría</label>
                            <select id="categoria" class="form-control" name="categoria">
                            <?php foreach ($data['categorias'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-2" > 
                            <label for="unidad">Unidad</label>
                            <select id="unidad" class="form-control" name="unidad">
                            <?php foreach ($data['unidades'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6  mb-2" >
                                <div class="form-group">
                                    <label for="precio_compra">Precio Compra</label>
                                    <input id="precio_compra" class="form-control" type="text" name="precio_compra" placeholder="Precio compra">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="precio_venta">Precio Venta</label>
                                    <input id="precio_venta" class="form-control" type="text" name="precio_venta" placeholder="Precio Venta">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarProd(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php include "Views/Templates/footer.php";?>
