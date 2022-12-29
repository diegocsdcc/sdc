<?php

$sql4 = "SELECT solicitud.id,DATE_FORMAT(solicitud.fecha,'%d-%m-%Y') AS fecha,DATE_FORMAT(solicitud.hora,'%H:%i') AS hora,solicitud.estado,solicitud.nota,SUM(productos.cantidad) AS sum_cantidad,SUM(productos.precio) AS sum_precio FROM solicitud INNER JOIN productos ON solicitud.id = productos.fk_solicitud WHERE (solicitud.fk_users = '$iduser') AND (solicitud.estadousers='1') GROUP BY solicitud.id,solicitud.fecha,solicitud.hora,solicitud.estado,solicitud.nota";
$rs4 = mysqli_query($conn,$sql4);

while ($row4=mysqli_fetch_array($rs4)) {

$id=$row4['id'];
$fecha=$row4['fecha'];
$hora=$row4['hora'];
$estado=$row4['estado'];
$sum_cantidad=$row4['sum_cantidad'];
$sum_precio=$row4['sum_precio'];

if ($estado=="3") {
	$estado="Pendiente";
    $estadocolor="warning";

}else if ($estado=="4") {
	$estado = "Pendiente <b>(Por Corregir)</b>";
	$estadocolor = "warning";

}else if ($estado=="1") {
	$estado = "Aceptada";
	$estadocolor = "success";
}else if ($estado=="2") {
	$estado = "Rechazada";
	$estadocolor = "danger";
}

echo
"
<tr class='table-$estadocolor'>
<td># $id</td>
<td>$fecha</td>
<td>$hora</td>
<td>$sum_cantidad</td>
<td>$ $sum_precio</td>
<td>$estado</td>
<td><a href='revisar_sdc.php?id=$id'><i class='app-menu__icon fa fa-sign-in'></i></a></td>
</tr>
";

}

?>