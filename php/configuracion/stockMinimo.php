<?php
include("../../class/ClassDataBase.php");

$stock_minimo = $_REQUEST['stockMinimo'];

$query = "UPDATE configuracion SET stock_minimo = $stock_minimo WHERE id_empleado = 1 ;";
print $query;
$db->query($query);

header('Location: ../../index.php');
