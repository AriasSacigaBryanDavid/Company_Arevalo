<?php include "Views/Templates/header.php";?>
    <!-- Card -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-2">
            <div class="card bg-primary">
                <div class="card-body d-flex text-white">
                    Usuarios
                    <i class="fas fa-user fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Usuarios" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['usuarios']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary">
                <div class="card-body d-flex text-white">
                    Clientes
                    <i class="fas fa-users fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Clientes" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['clientes']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info">
                <div class="card-body d-flex text-white">
                    Proveedores
                    <i class="fas fa-users fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Proveedores" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['proveedores']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger">
                <div class="card-body d-flex text-white">
                    Productos
                    <i class="fas fa-store fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Productos" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['productos']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning">
                <div class="card-body d-flex text-white">
                    Ventas por Dia
                    <i class="fas fa-cash-register fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Ventas/historial" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['ventas']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success">
                <div class="card-body d-flex text-white">
                    Entradas por Dia
                    <i class="fas fa-boxes fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Entradas/historial" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['entradas']['total']?></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark">
                <div class="card-body d-flex text-white">
                    Salidas por Dia
                    <i class="fas fa-dolly-flatbed fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="<?php echo base_url; ?>Salidas/historial" class="text-white">Ver Detalle</a>
                    <span class="text-white"><?php echo $data['salidas']['total']?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Graficos -->
    <div class="row mt-2">
        <div class="col-xl-6 mb-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    TOP 10 de Productos con Stock Mínimo
                </div>
                <div class="card-body ">
                    <canvas id="stockMinimo" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    TOP 10 de Productos con Peso Mínimo
                </div>
                <div class="card-body ">
                    <canvas id="pesoMinimo" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                   TOP 10 de Productos más Vendidos
                </div>
                <div class="card-body">
                <canvas id="ProductosVendidos" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                   TOP 10 de Productos en Salidas
                </div>
                <div class="card-body">
                <canvas id="productosSalidas" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        
    </div>
<?php include "Views/Templates/footer.php";?>