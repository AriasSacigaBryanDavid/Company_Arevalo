<?php include "Views/Templates/header.php";?>

<div class="card mb-2">
    <div class="card fondo-a">
        <div class="card-header card-header-a text-white text-center">
            <h4>REPORTES DE PRODUCTOS CON STOCK</h4>
        </div>
        <div class="card-body">
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="RstockMinimo" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="card">
                        <div class="card-body ">
                            <canvas id="RpesoMinimo" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-2">
    <div class="card fondo-a">
        <div class="card-header card-header-a text-white text-center">
            <h4>KARDEX</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive text-white">
                    <table class="table table-a table-hover text-white" id="tblKardex">
                        <thead class="table-a text-white">
                            <tr>
                            <th>Id</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Precio Compra</th>
                            <th>Precio Venta</th>
                            <th>Cantidad</th>
                            <th>Unidad</th>
                            <th>Peso Total</th>
                            <th>Total Entrada</th>
                            <th>Total Venta</th>
                            <th>Total Salida</th>
                            <th>Utilidad</th>
                            <th>Estado</th>
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
<?php include "Views/Templates/footer.php";?>