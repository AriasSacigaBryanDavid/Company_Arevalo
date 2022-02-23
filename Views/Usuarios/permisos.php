<?php include "Views/Templates/header.php";?>
<div class="col-md-12 mx-auto">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">
            Asignar Permisos
        </div>
        <div class="card-body bg-secondary text-white">
            <form id="formulario" onsubmit="registrarPermisos(event);">
                <div class="row mb-2">
                    <?php foreach($data['datos'] as  $row){ ?>
                        <div class="col-md-2 text-center text-capitalize p-2">
                            <label for=""><?php echo $row['permiso'] ?></label><br>
                            <input type="checkbox" name="permisos[]" value="<?php echo $row['id']; ?>" <?php echo isset($data['asignados'][$row['id']]) ? 'checked' : '' ; ?>>
                        </div>
                    <?php }?>
                    <input type="hidden" value="<?php echo $data['id_usuario']; ?>" name="id_usuario">
                </div>
                <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit"> Asignar Permisos</button>
                <a class="btn btn-danger" href="<?php echo base_url; ?>Usuarios">Cancelar</a>
                </div>
            </form>
            
        </div>
    </div>
</div>


<?php include "Views/Templates/footer.php";?>