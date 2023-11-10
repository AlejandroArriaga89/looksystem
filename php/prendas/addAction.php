<?php
include("../../class/ClassDataBase.php");

$tipoPrenda = $_REQUEST['tipoPrenda'];
$cantidad = $_REQUEST['cantidad'];
$talla = $_REQUEST['talla'];
$proveedorPrenda = $_REQUEST['proveedorPrenda'];
$color = $_REQUEST['color'];

$query = "INSERT INTO prenda (id_tipo_prenda, cantidad, talla, id_proveedor_prenda, color) VALUES ($tipoPrenda, $cantidad, '" . $talla . "', $proveedorPrenda, '" . $color . "');";
print $query;
$db->query($query);

header('Location: ../../php/prenda.php');
