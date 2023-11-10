<?php
include("../../class/ClassDataBase.php");

$id_consumible = $_REQUEST['id_consumible'];

$query = "DELETE FROM consumible WHERE id_consumible = $id_consumible;";
print $query;
$db->query($query);

header('Location: ../../php/consumible.php');
