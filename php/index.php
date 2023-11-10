<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = false;
    $_SESSION['nav_section'] = 'Home';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include("../class/ClassDataBase.php");
    $configuracion = $db->obtenerRegistrosArray("SELECT * FROM configuracion WHERE id_configuracion = 1");
    ?>
    <title>Inicio</title>
</head>

<body>

    <?php

    include("../include/navbar.php");
    ?>

    <div class="container mt-4">
        <h1>Configuración</h1>
        <form action="./configuracion/stockMinimo.php" method="GET">
            <div class="form-group my-3">
                <label for="stockMinimo" class="form-label mt-4">Stock mínimo</label>
                <input type="number" class="form-control" id="stockMinimo" name="stockMinimo" value="<?php echo $configuracion['stock_minimo']; ?>">
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-primary form-control">Actulizar configuraciones</button>
            </div>
        </form>

    </div>

</body>

</html>