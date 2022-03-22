<?php include "Views/Templates/header.php";?>
<div class="card mb-2">
    <div class="card">
        <div class="card-header card-header-a text-white text-center">
            <h4> REPORTES DE PRODUCTOS EN RENDIMIENTOS</h4>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosRendimientos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card fondo-a text-white">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">PROMEDIO DE RENDIMIENTOS DE PRODUCTOS</h5>
                            <div class="table-responsive text-white">
                                <table class="table table-a table-hover text-white" id="tblproductorendimiento">
                                    <thead class="table-a text-white">
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
<div class="card mb-2">
    <div class="card">
        <div class="card-header card-header-a text-white text-center">
            <h4> REPORTES DE PRODUCTOS MÁS COMPRADOS</h4>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card fondo-a text-white">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS COMPRADOS</h5>
                            <div class="table-responsive text-white">
                                <table class="table table-a table-hover text-white" id="tblproductoentrado">
                                    <thead class="table-a text-white">
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
<div class="card mb-2">
    <div class="card">
        <div class="card-header card-header-a text-white text-center">
            <h4> REPORTES DE PROVEEDORES MÁS COMPRADOS</h4>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproveedoresEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card fondo-a text-white">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">PROVEEDORES COMPRADOS</h5>
                            <div class="table-responsive text-white">
                                <table class="table table-a table-hover text-white" id="tblproveedorentrado">
                                    <thead class="table-a text-white">
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
<div class="card mb-2">
    <div class="card">
        <div class="card-header card-header-a text-white text-center">
            <h4> REPORTES DE ALMACENES MÁS COMPRADOS</h4>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RalmacenEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card fondo-a text-white">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">ALMACENES COMPRADOS</h5>
                            <div class="table-responsive text-white">
                                <table class="table table-a table-hover text-white" id="tblalmacenesentrado">
                                    <thead class="table-a text-white">
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
<div class="card mb-2">
    <div class="card">
        <div class="card-header card-header-a text-white text-center">
            <h4> REPORTES DE USUARIOS MÁS COMPRADOS</h4>
        </div>
        <div class="card-body fondo-a text-white">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RusuarioEntradas" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card fondo-a text-white">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">USUARIOS COMPRADOS</h5>
                            <div class="table-responsive text-white">
                                <table class="table table-a table-hover text-white" id="tblusuariosentrado">
                                    <thead class="table-a text-white">
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