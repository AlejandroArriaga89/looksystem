<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = false;
    $_SESSION['nav_section'] = 'Historial';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Historial</title>
</head>

<body>

    <?php
    include("../include/navbar.php");
    ?>

    <div class="container">
        <div class="row my-3">

        </div>
        <div class="row">


            <table class="table table-hover">

                <?php
                $consumibles = $db->obtenerRegistros("SELECT * FROM historial_consumible JOIN historial h on h.id_historial = historial_consumible.id_historial JOIN consumible c on c.id_consumible = historial_consumible.id_consumible JOIN empleado e on e.id_empleado = h.id_empleado JOIN proveedor_consumible pc on c.id_proveedor_consumible = pc.id_proveedor_consumible;");
                if ($db->numRegistros > 0) {
                    echo '
<thead>
                    <tr class="table-dark">
                        <th scope="col">Fecha</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Consumible</th>
                        
                    </tr>
                </thead>
';
                    foreach ($consumibles as $consumible) {
                        echo '
                        
                    <tr>
      <th scope="row">' . $consumible['fecha'] . '</th>
      <td>' . $consumible['accion'] . ' </td>
      <td>' . $consumible['nombre'] . ' </td>
      <td>' . $consumible['cantidad'] . ' </td>
      <td>' . $consumible['color'] . ' - ' . $consumible['proveedor_consumible'] . ' </td>
    </tr>
                    ';
                    }
                } else {
                    echo '
                    <thead>
                        <th scope="col col-12">No se han registrado movimientos aún</th>
                    </thead>
                    ';
                }
                ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            // Muestra una alerta de confirmación
            var confirmDelete = confirm("¿Estás seguro de que quieres eliminar este consumible?");

            // Devuelve true si el usuario confirma, de lo contrario, devuelve false
            return confirmDelete;
        }
    </script>
</body>

</html>