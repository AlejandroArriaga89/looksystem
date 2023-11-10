<?php
include("../../class/ClassDataBase.php");
$input = $_POST['input'];
$consumibles = $db->obtenerRegistros("SELECT * FROM consumible JOIN proveedor_consumible pc on pc.id_proveedor_consumible = consumible.id_proveedor_consumible JOIN tipo_consumible tc on tc.id_tipo_consumible = consumible.id_tipo_consumible WHERE tipo_consumible ILIKE '{$input}%' OR color ILIKE '{$input}%' OR proveedor_consumible ILIKE '{$input}%';");
echo '<table class="table table-hover">';
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
    echo '</table>';
}
