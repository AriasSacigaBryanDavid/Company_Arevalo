<?php include "Views/Templates/header.php";?>
<div class="card">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h4> Reportes de Productos mas Vendidos</h4>
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
                            <div class="table-responsive">
                                <table class="table table-dark table-hover" id="tblproductovendido">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Total</th>
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