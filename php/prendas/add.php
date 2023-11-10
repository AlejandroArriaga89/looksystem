<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['nav_section'] = 'Prendas';
    $_SESSION['capa_interna'] = true;

    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Prendas</title>
</head>

<body>

    <?php
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/navbar.php");
    ?>
    <div class="container">
        <form action="./addAction.php" method="get">
            <div class="form-group">
                <label for="tipoPrenda" class="form-label mt-4">Tipo prenda</label>
                <select class="form-select" id="tipoPrenda" name="tipoPrenda" required>
                    <?php
                    $tipoPrendas = $db->obtenerRegistros("SELECT * FROM tipo_prenda");
                    foreach ($tipoPrendas as $tipoPrenda) {
                        echo
                        '<option value="' . $tipoPrenda['id_tipo_prenda'] . '">' . $tipoPrenda['tipo_prenda'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad" class="form-label mt-4">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="talla" class="form-label mt-4">Talla</label>
                <select class="form-select" id="talla" name="talla" required>
                    <option value="U">Unitalla</option>
                    <option value="Ch">Chica</option>
                    <option value="Md">Mediana</option>
                    <option value="Gd">Grande</option>
                    <option value="Ex">Extra Grande</option>
                </select>
            </div>
            <div class="form-group">
                <label for="proveedorPrenda" class="form-label mt-4">Proveedor prenda</label>
                <select class="form-select" id="proveedorPrenda" name="proveedorPrenda">
                    <?php
                    $proveedorPrendas = $db->obtenerRegistros("SELECT * FROM proveedor_prenda");
                    foreach ($proveedorPrendas as $proveedorPrenda) {
                        echo
                        '<option value="' . $proveedorPrenda['id_proveedor_prenda'] . '">' . $proveedorPrenda['proveedor_prenda'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="color" class="form-label mt-4">Color</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary form-control">Registrar</button>
            </div>
        </form>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-secondary form-control">Cancelar</button>
        </div>
    </div>
</body>

</html>