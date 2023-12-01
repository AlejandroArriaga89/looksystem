<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = true;

    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Proveedores</title>
</head>

<body>

    <?php
    $_SESSION['nav_section'] = 'ProveedorConsumibles';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/navbar.php");
    ?>
    <div class="container">
        <form action="./addAction.php" method="get">
            <div class="form-group">
                <label for="proveedor" class="form-label mt-4">Nombre del proveedor consumible</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email </label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label mt-4">Telefono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
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