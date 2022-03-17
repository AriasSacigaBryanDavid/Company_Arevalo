<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h4> REPORTES DE PRODUCTOS CON STOCK</h4>
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
                <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header bg-info text-white text-center">
                                <h4>KARDEX</h4>
                            </div>
                        </div>
    
                        <div class="table-responsive">
                            <table class="table table-dark table-hover" id="tblKardex">
                            <thead class="thead-dark">
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
</div>


<?php include "Views/Templates/footer.php";?>