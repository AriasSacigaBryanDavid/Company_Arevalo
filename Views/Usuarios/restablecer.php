<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Restablecer Contraseña</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" /> 
        
    </head>
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center">
                                        <h3 class="font-weight-light ">Restablecer Contraseña</h3>
                                    </div>
                                    <div class="card-body">
                                        
                                        <!-- Casilla para ingresar datos-->
                                        <form id="frmrestablecer" onsubmit="restablecerPass(event)">
                                            <div class="form-group">
                                                <label class="small mb-1" for="nueva_contrasena">Nueva Contraseña</label>
                                                <input class="form-control " id="nueva_contrasena" name="nueva_contrasena" type="password" placeholder="Ingrese tu nueva contraseña" />
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" value="<?php echo $data; ?>" name="token">
                                                <label class="small mb-1" for="confirmar">Confirmar Contraseña</label>
                                                <input class="form-control" id="confirmar" name="confirmar" type="password" placeholder="Confirmar contraseña" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-outline-primary" type="submit">Restablecer</button>
                                            </div>
                                            
                                        </form>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; COMPANY AREVALO E.I.R.L</div>
                            <!--<div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>-->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script>
            const base_url="<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    </body>
</html>