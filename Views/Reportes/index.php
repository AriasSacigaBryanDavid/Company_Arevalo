<?php include "Views/Templates/header.php";?>
    
    <div class="card mb-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Reporte de Producto</h4>
                </div>
            </div>
    </div>
    <div class="table-responsive">
        <table class="table table-dark table-hover" id="tblR_productos">
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