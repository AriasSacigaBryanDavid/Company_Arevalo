<?php include "Views/Templates/header.php";?>

    <ul class="nav nav-tabs mb-2 bg-white" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Reportes de Productos más Salidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reportes de Almacenes más Salidos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reportes de Usuarios más Salidos</a>
    </li>
    </ul>
    <div class="tab-content fondo-a" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            
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
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">


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
        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">


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



<?php include "Views/Templates/footer.php";?>