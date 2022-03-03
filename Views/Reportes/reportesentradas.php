<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> Reportes de Productos en Redimientos</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosRendimientos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">PROMEDIO DE RENDIMIENTOS DE PRODUCTOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproductorendimiento">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Rendimiento</th>
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
            <h4> Reportes de Productos más Comprado</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS COMPRADOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproductoentrado">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cant. comprado</th>
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
            <h4> Reportes de Proveedores más Comprados</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproveedoresEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">PROVEEDORES COMPRADOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproveedorentrado">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Proveedor</th>
                                            <th>Cant. Comprado</th>
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
            <h4> Reportes de Almacén más Comprados</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RalmacenEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">ALMACENES COMPRADOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblalmacenesentrado">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Almacenes</th>
                                            <th>Cant. comprado</th>
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
            <h4> Reportes de Usuarios más Comprados</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RusuarioEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">USUARIOS COMPRADOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblusuariosentrado">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Usuarios</th>
                                            <th>Cant. comprado</th>
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