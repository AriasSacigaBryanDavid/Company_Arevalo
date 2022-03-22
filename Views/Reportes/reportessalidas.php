<?php include "Views/Templates/header.php";?>
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
<?php include "Views/Templates/footer.php";?>