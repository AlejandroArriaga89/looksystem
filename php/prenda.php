<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = false;
    $_SESSION['nav_section'] = 'Prendas';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Prenda</title>
</head>

<body>

    <?php
    include("../include/navbar.php");
    ?>

    <div class="container">
        <div class="row my-3">
            <div class="row-3">
                <a href="./prendas/add.php">
                    <button class="btn btn-primary">
                        Agregar prendas
                    </button>
                </a>
            </div>
        </div>
        <div class="row">


            <table class="table table-hover">

                <?php
                $prendas = $db->obtenerRegistros("SELECT * FROM prenda JOIN tipo_prenda tp on prenda.id_tipo_prenda = tp.id_tipo_prenda JOIN proveedor_prenda pp on pp.id_proveedor_prenda = prenda.id_proveedor_prenda;");
                if ($db->numRegistros > 0) {
                    echo '
<thead>
                    <tr class="table-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Color</th>
                        </tr>
                        </thead>
                        ';
                    // <th scope="col">Acciones</th>
                    foreach ($prendas as $prenda) {
                        switch ($prenda['talla']) {
                            case "U":
                                $talla = "Unitalla";
                                break;
                            case "Ch":
                                $talla = "Chica";
                                break;
                            case "Md":
                                $talla = "Mediana";
                                break;
                            case "Gd":
                                $talla = "Grande";
                                break;
                            case "Ex":
                                $talla = "Extra Grande";
                                break;
                        }

                        echo '
                        
                    <tr>
      <th scope="row">' . $prenda['id_prenda'] . '</th>
      <td>' . $prenda['tipo_prenda'] . ' </td>
      <td>' . $prenda['cantidad'] . ' </td>
      <td>' . $talla . ' </td>
      <td>' . $prenda['proveedor_prenda'] . ' </td>
      <td>' . $prenda['color'] . ' </td>
      </tr>
      ';
                        //   <td><form id="deleteForm" action="./prendas/delete.php" method="GET" onsubmit="return confirmDelete();"><button class="btn btn-warning" name="id_prenda" value="' . $prenda['id_prenda'] . '">Eliminar</button></form></td>
                    }
                } else {
                    echo '
                    <thead>
                        <th scope="col col-12">No se han registrado prendas aún</th>
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
            var confirmDelete = confirm("¿Estás seguro de que quieres eliminar este prenda?");

            // Devuelve true si el usuario confirma, de lo contrario, devuelve false
            return confirmDelete;
        }
    </script>
</body>

</html>