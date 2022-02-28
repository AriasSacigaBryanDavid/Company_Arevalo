<?php include "Views/Templates/header.php";?>
<div class="row mt-2">
        <div class="col-xl-6 mb-2">
            <div class="card">
                <div class="card-header bg-info text-white">
                    Reportes de Productos con Stock Mínimo
                </div>
                <div class="card-body ">
                    <canvas id="RstockMinimo" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-2">
            <div class="card">
                <div class="card-header bg-info text-white">
                    Reportes de Productos con Peso Mínimo
                </div>
                <div class="card-body ">
                    <canvas id="RpesoMinimo" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-2">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h4>Kardex</h4>
                </div>
            </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblKardex">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Cantidad</th>
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


<?php include "Views/Templates/footer.php";?>