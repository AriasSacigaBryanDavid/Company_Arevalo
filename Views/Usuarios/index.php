<?php include "Views/Templates/header.php";?>
    <div class="card mb-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Usuarios</h4>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();"><i class="fas fa-user-plus"></i></button>
                </div>
            </div>
    </div>

    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblUsuarios">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Almacén</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                    <button type="button"    class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                        <!--<span aria-hidden="true">&times;</span>-->
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="hidden" id="id" name="id">
                            <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre Completo">
                        </div>
                        <div class="row" id="contrasenas">
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contrasena">Contraseña</label>
                                    <input id="contrasena" class="form-control" type="password" name="contrasena" placeholder="Contraseña">
                                </div>    
                           </div> 
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmar">Confirmar Contraseña</label>
                                    <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar contraseña">
                                </div>
                           </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cargo">Cargos</label>
                                    <select id="cargo" class="form-control" name="cargo">
                                        <?php foreach ($data['cargos'] as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="almacen">Almacenes</label>
                                    <select id="almacen" class="form-control" name="almacen">
                                        <?php foreach ($data['almacenes'] as $key => $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancelar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "Views/Templates/footer.php";?>