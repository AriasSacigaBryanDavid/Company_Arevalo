<?php include "Views/Templates/header.php";?>

<nav>
  <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE PRODUCTOS MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RproductosSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblproductosalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cant. Salidos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE ALMACENES MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RalmacenSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">ALMACENES SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblalmacenessalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Almacenes</th>
                                                        <th>Cant. salida</th>
                                                        <th>Monto total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE USUARIOS MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RusuarioSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">USUARIOS SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblusuariossalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Usuarios</th>
                                                        <th>Cant. salido</th>
                                                        <th>Monto total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
  </div>
</div>







    <!-- <ul class="nav nav-tabs mb-2 bg-white" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link " id="reporte1-tab" data-toggle="tab" href="#reporte1" role="tab" aria-controls="reporte1" aria-selected="true">Reportes de Productos más Salidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="reporte2-tab" data-toggle="tab" href="#reporte2" role="tab" aria-controls="reporte2" aria-selected="false">Reportes de Almacenes más Salidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="reporte3-tab" data-toggle="tab" href="#reporte3" role="tab" aria-controls="reporte3" aria-selected="false">Reportes de Usuarios más Salidos</a>
    </li>
    </ul>
    <div class="tab-content fondo-a" id="myTabContent">
        <div class="tab-pane fade show active" id="reporte1" role="tabpanel" aria-labelledby="reporte1-tab">
            
            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE PRODUCTOS MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RproductosSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblproductosalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cant. Salidos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    


        </div>
        <div class="tab-pane fade show " id="reporte2" role="tabpanel" aria-labelledby="reporte2-tab">


            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE ALMACENES MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RalmacenSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">ALMACENES SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblalmacenessalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Almacenes</th>
                                                        <th>Cant. salida</th>
                                                        <th>Monto total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade show" id="reporte3" role="tabpanel" aria-labelledby="reporte3-tab">


            <div class="card mb-2">
                <div class="card">
                    <div class="card-header card-header-a text-white text-center">
                        <h4> REPORTES DE USUARIOS MÁS SALIDOS</h4>
                    </div>
                    <div class="card-body fondo-a text-white">
                        <div class="row mt-2">
                            <div class="col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-body ">
                                        <canvas id="RusuarioSalidos" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="card fondo-a text-white">
                                    <div class="card-body ">
                                        <h5 class="font-weight-bold text-center">USUARIOS SALIDOS</h5>
                                        <div class="table-responsive text-white">
                                            <table class="table table-a table-hover text-white" id="tblusuariossalido">
                                                <thead class="table-a text-white">
                                                    <tr>
                                                        <th>Usuarios</th>
                                                        <th>Cant. salido</th>
                                                        <th>Monto total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </div> -->



<?php include "Views/Templates/footer.php";?>