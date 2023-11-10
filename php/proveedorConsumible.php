<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = false;
    $_SESSION['nav_section'] = 'ProveedorConsumibles';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Proveedores</title>
</head>

<body>

    <?php
    include("../include/navbar.php");
    ?>

    <div class="container">
        <div class="row my-3">
            <div class="row-3">
                <a href="./proveedores consumibles/add.php">
                    <button class="btn btn-primary">
                        Agregar proveedor
                    </button>
                </a>
            </div>
        </div>
        <div class="row">


            <table class="table table-hover">

                <?php
                $db->query("SELECT * FROM proveedor_consumible;");
                if ($db->numRegistros > 0) {
                    echo '
<thead>
                    <tr class="table-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Dirección web</th>
                    </tr>
                </thead>
';
                    for ($i = 0; $i < $db->numRegistros; $i++) {
                        $proveedor = $db->recuRegistro();
                        echo '
                        
                    <tr>
      <th scope="row">' . $proveedor['id_proveedor_consumible'] . '</th>
      <td>' . $proveedor['proveedor_consumible'] . ' </td>
      <td>' . $proveedor['telefono'] . ' </td>
      <td>' . $proveedor['direccion_web'] . ' </td>
    </tr>
                    ';
                    }
                } else {
                    echo '
                    <thead>
                        <th scope="col col-12">No se han registrado proveedores aún</th>
                    </thead>
                    ';
                }
                ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>