<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administración</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/estilos.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/tipografia.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/animate.min.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed card-header-d">
        <nav class="sb-topnav navbar navbar-expand navbar-dark card-header-d">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo base_url;?>Administracion/home">Company Arevalo</a>
           
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo base_url;?>Perfiles">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#cambiarPass">Cambiar Contraseña</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url;?>Usuarios/salir">Cerrar Sessión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu card-header-d">
                        <div class="nav">
                            <!-- menu de configuracion
                            <div class="form-floating mb-3" align="center">
                                                <img src="Assets/img/logo.jpg" width="100" >
                            </div>-->
                            <!-- menu de configuracion-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdministracion" aria-expanded="false" aria-controls="collapseAdministracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools text-a fa-2x"></i></div>
                                Administración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdministracion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Usuarios">Usuarios</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Cargos">Cargos</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Almacenes">Almacenes</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion">Configuración</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Documentos">Documentos</a>      
                                    <a class="nav-link" href="<?php echo base_url;?>Identidades">Identidades</a>
                                </nav>
                            </div>
                            <!-- menu de Contactos -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseContactos" aria-expanded="false" aria-controls="collapseContactos">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book text-a fa-2x"></i></div>
                                Contactos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseContactos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Proveedores">Proveedores</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Clientes">Clientes</a>
                                   
                                </nav>
                            </div>
                             <!-- menu de Arqueo -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCajas" aria-expanded="false" aria-controls="collapseCajas">
                                <div class="sb-nav-link-icon"><i class="fas fa-cash-register text-a fa-2x"></i></div>
                                Cajeros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseCajas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Cajas/arqueo">Arqueos</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Cajas">Cajas</a>
                                   
                                </nav>
                            </div>
                            <!-- menu de Productos -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProductos" aria-expanded="false" aria-controls="collapseProductos">
                                <div class="sb-nav-link-icon"><i class="fas fa-box text-a fa-2x"></i></div>
                                Productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseProductos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Productos">Productos</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Marcas">Marcas</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Categorias">Categorías</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Unidades">Unidades</a>
                                </nav>
                            </div>
                            <!-- menu de Entrada -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEntradas" aria-expanded="false" aria-controls="collapseEntradas">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes text-a fa-2x"></i></div>
                                Entradas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseEntradas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Entradas">Nueva Entrada</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Entradas/historial">Historial Entrada</a>
                                   
                                </nav>
                            </div>
                            <!-- menu de Salida -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSalidas" aria-expanded="false" aria-controls="collapseSalidas">
                                <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed text-a fa-2x"></i></div>
                                Salidas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseSalidas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Salidas">Nueva Salida</a>      
                                    <a class="nav-link" href="<?php echo base_url;?>Salidas/historial">Historial Salida</a>
                                   
                                </nav>
                            </div>
                            <!-- menu de Ventas -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseVentas">
                                <div class="sb-nav-link-icon"><i class="fas fa-store text-a fa-2x"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Ventas">Nueva Venta</a>      
                                    <a class="nav-link" href="<?php echo base_url;?>Ventas/historial">Historial Venta</a>
                                   
                                </nav>
                            </div>
                            <!-- menu de Reporte -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReportes" aria-expanded="false" aria-controls="collapseReportes">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-line text-a fa-2x"></i></div>
                                Reportes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-a"></i></div>
                            </a>
                            <div class="collapse" id="collapseReportes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Reportes">Kardex</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Reportes/reportesentradas">Reportes de Entradas</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Reportes/reportessalidas">Reportes de Salidas</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Reportes/reportesventas">Reportes de Ventas</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        Company Arevalo
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        
                        
                
