<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> Reportes de Productos más Salidos</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosSalidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS SALIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproductosalido">
                                    <thead class="thead-dark">
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
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> Reportes de Almacén más Salidos</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RalmacenSalidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">ALMACENES SALIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblalmacenessalido">
                                    <thead class="thead-dark">
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
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> Reportes de Usuarios más Salidos</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RusuarioSalidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">USUARIOS SALIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblusuariossalido">
                                    <thead class="thead-dark">
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