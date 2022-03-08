<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> REPORTES DE PRODUCTOS MÁS VENDIDOS</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RproductosVendidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">CANTIDAD DE PRODUCTOS VENDIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproductovendido">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cant. Vendido</th>
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
            <h4> REPORTES DE CLIENTES MÁS VENDIDOS</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RclientesVendidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">CLIENTES VENDIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblclientesvendido">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Cant. vendido</th>
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
            <h4> REPORTES DE ALMACENES MÁS VENDIDOS</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RalmacenVendidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">ALMACENES VENDIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblalmacenesvendido">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Almacenes</th>
                                            <th>Cant. vendido</th>
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
            <h4> REPORTES DE USUARIOS MÁS VENDIDOS</h4>
        </div>
        <div class="card-body bg-secondary">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RusuarioVendidos" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="font-weight-bold text-center">USUARIOS VENDIDOS</h5>
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblusuariosvendido">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Usuarios</th>
                                            <th>Cant. vendido</th>
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