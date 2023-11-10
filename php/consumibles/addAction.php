<?php
include("../../class/ClassDataBase.php");

$tipoConsumible = $_REQUEST['tipoConsumible'];
$cantidad = $_REQUEST['cantidad'];
$color = $_REQUEST['color'];
$proveedorConsumible = $_REQUEST['proveedorConsumible'];




$query = "INSERT INTO consumible(id_tipo_consumible, cantidad, color, id_proveedor_consumible) VALUES ($tipoConsumible, $cantidad, '$color', $proveedorConsumible);";
$db->query($query);
$query = "INSERT INTO historial(fecha, accion, id_empleado) VALUES (now(), 'Añadió', 1);";
$db->query($query);
$ultimoRegistroHistorial = $db->obtenerRegistrosArray("SELECT * FROM historial ORDER BY fecha DESC LIMIT 1");
$ultimoRegistroConsumible = $db->obtenerRegistrosArray("SELECT * FROM consumible ORDER BY id_consumible DESC LIMIT 1");
$query = "INSERT INTO historial_consumible(id_historial, id_consumible, cantidad) VALUES (" . $ultimoRegistroHistorial['id_historial'] . "," . $ultimoRegistroConsumible['id_consumible'] . " , $cantidad);";
$db->query($query);
// print $query;

header('Location: ../../php/consumible.php');
