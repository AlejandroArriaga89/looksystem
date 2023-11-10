<?php
include("../../class/ClassDataBase.php");

$proveedor = $_REQUEST['proveedor'];
$email = $_REQUEST['email'];
$telefono = $_REQUEST['telefono'];

$query = "INSERT INTO proveedor_consumible(PROVEEDOR_CONSUMIBLE,DIRECCION_WEB ,TELEFONO) VALUES ('$proveedor','$email','$telefono');";
print $query;
$db->query($query);

header('Location: ../../php/proveedorConsumible.php');
