<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sesión</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/tipografia.css" rel="stylesheet" />
        <!-- <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script> -->
    </head>
    <body class="fondo-a">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card card-header-a shadow-lg border-0 rounded-lg mt-5">
                                    
                                    <div class="card-body text-white">
                                    
                                        <!-- Casilla para ingresar correo-->
                                        <form id="frmReset" onsubmit="resetearPass(event)" autocomplete="off">
                                            <div class="form-group">
                                                <h3 class="font-weight-light text-white text-center">Ingrese su correo para recuperar contraseña</h3>
                                            </div>
                                            <div class="form-group mb-2 ">
                                                <label for="correo">Correo Electrónico</label>
                                                <input id="correo" class="form-control" type="email" name="correo" placeholder="Ingrese correo electrónico" >
                                            </div>
                                            <button class="btn btn-b text-white" type="submit">solicitar</button>
                                            <a class="btn btn-c text-white" href="<?php echo base_url; ?>">Cancelar</a>
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