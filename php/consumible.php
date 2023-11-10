<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    $_SESSION['capa_interna'] = false;
    $_SESSION['nav_section'] = 'Consumibles';
    include((($_SESSION['capa_interna']) ? "../" : "") . "../include/head.php");
    include((($_SESSION['capa_interna']) ? "../" : "") . "../class/ClassDataBase.php");
    ?>
    <title>Consumibles</title>
</head>

<body>

    <?php
    include("../include/navbar.php");
    ?>

    <div class="container">
        <div class="row my-3">
            <div class="col-3">
                <a href="./consumibles/add.php">
                    <button class="btn btn-primary">
                        Agregar consumibles
                    </button>
                </a>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Buscar Consumible" id="live-search">
            </div>
        </div>
        <div class="row" id="searchresult">


            <table class="table table-hover">

                <?php
                $consumibles = $db->obtenerRegistros("SELECT * FROM consumible JOIN proveedor_consumible pc on pc.id_proveedor_consumible = consumible.id_proveedor_consumible JOIN tipo_consumible tc on tc.id_tipo_consumible = consumible.id_tipo_consumible ;");
                if ($db->numRegistros > 0) {
                    echo '
<thead>
                    <tr class="table-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Color</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
';
                    foreach ($consumibles as $consumible) {
                        echo '
                        
                    <tr>
      <th scope="row">' . $consumible['id_consumible'] . '</th>
      <td>' . $consumible['tipo_consumible'] . ' </td>
      <td>' . $consumible['cantidad'] . ' </td>
      <td>' . $consumible['color'] . ' </td>
      <td>' . $consumible['proveedor_consumible'] . ' </td>
      <td><form id="deleteForm" action="./consumibles/delete.php" method="GET" onsubmit="return confirmDelete();"><button class="btn btn-warning" name="id_consumible" value="' . $consumible['id_consumible'] . '">Eliminar</button></form></td>
    </tr>
                    ';
                    }
                } else {
                    echo '
                    <thead>
                        <th scope="col col-12">No se han registrado consumibles aún</th>
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

        $(document).ready(function() {
            $("#live-search").keyup(function() {
                var input = $(this).val();
                //alert(input);
                $.ajax({

                    url: "./consumibles/search.php",
                    method: "POST",
                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                    }
                });

            });
        });
    </script>
</body>

</html>