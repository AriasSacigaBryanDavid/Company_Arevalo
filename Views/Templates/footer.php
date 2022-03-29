</div>
                </main>
 
<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Company Arevalo</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- modal para modificar contraseña-->
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header card-header-a text-white">
                        <h5 class="modal-title" >Modificar Contraseña</h5>
                        <button class="btn text-white" data-dismiss="modal" aria-label="Close">X</button>
                    </div> -->
                    <div class="modal-body card-header-a text-white">
                        <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);" >
                            <div class="form-group d-flex justify-content-between">
                                 <h4 class="modal-title" >Modificar Contraseña</h4>
                                 <button class="btn text-white" data-dismiss="modal" aria-label="Close"><i class="fas fa-arrow-right"></i></button>
                            </div>
                            <div class="form-group">
                                <label for="contrasena_actual">Contraseña Actual</label>
                                <input id="contrasena_actual" class="form-control" type="password" name="contrasena_actual" placeholder="Contraseña Actual">
                            </div>
                            <div class="form-group">
                                <label for="contrasena_nueva">Contraseña Nueva</label>
                                <input id="contrasena_nueva" class="form-control" type="password" name="contrasena_nueva" placeholder="Contraseña Nueva">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_contrasena">Confirmar Contraseña</label>
                                <input id="confirmar_contrasena" class="form-control" type="password" name="confirmar_contrasena" placeholder="Confirmar contraseña">
                            </div>
                            <button class="btn btn-b text-white" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        
        <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js" crossorigin="anonymous"></script>
        <script>
            const base_url="<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/select2.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/Chart.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>

<!-- -->