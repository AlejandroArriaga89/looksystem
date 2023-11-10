<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['nav_section'] = 'Consumibles';
    $_SESSION['capa_interna'] = true;

    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Consumibles</title>
</head>

<body>

    <?php
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/navbar.php");
    ?>
    <div class="container">
        <form action="./addAction.php" method="get">
            <div class="form-group">
                <label for="tipoConsumible" class="form-label mt-4">Tipo consumible</label>
                <select class="form-select" id="tipoConsumible" name="tipoConsumible" required>
                    <?php
                    $tipoConsumibles = $db->obtenerRegistros("SELECT * FROM tipo_consumible");
                    foreach ($tipoConsumibles as $tipoConsumible) {
                        echo
                        '<option value="' . $tipoConsumible['id_tipo_consumible'] . '">' . $tipoConsumible['tipo_consumible'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad" class="form-label mt-4">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="color" class="form-label mt-4">Color</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="form-group">
                <label for="proveedorConsumible" class="form-label mt-4">Proveedor consumible</label>
                <select class="form-select" id="proveedorConsumible" name="proveedorConsumible">
                    <?php
                    $proveedorConsumibles = $db->obtenerRegistros("SELECT * FROM proveedor_consumible");
                    foreach ($proveedorConsumibles as $proveedorConsumible) {
                        echo
                        '<option value="' . $proveedorConsumible['id_proveedor_consumible'] . '">' . $proveedorConsumible['proveedor_consumible'] . '</option>';
                    }
                    ?>
                </select>
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