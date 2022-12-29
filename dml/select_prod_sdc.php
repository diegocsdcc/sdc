<?php

$sql6 = "SELECT productos.id,productos.fk_solicitud,productos.nombre,productos.descr,productos.cantidad,productos.precio FROM productos INNER JOIN solicitud ON productos.fk_solicitud = solicitud.id WHERE (solicitud.fk_users = '$iduser') AND (productos.fk_solicitud='$idsoli')";
$rs6 = mysqli_query($conn,$sql6);

while ($row6=mysqli_fetch_array($rs6)) {

	$idprod=$row6['id'];
	$nombreprod=$row6['nombre'];
	$descrprod=$row6['descr'];
	$cantidadprod=$row6['cantidad'];
	$precioprod=$row6['precio'];

if ($estado=="4") {
	$link_editar="<a href='editar_sdc.php?id=$idsoli&idprod=$idprod'><i class='app-menu__icon fa fa-sign-in'></i></a>";
}else{
	$link_editar="<span class='badge badge-primary'>No Modificable</span>";
}

echo
"
<tr>
<td># $idprod</td>
<td>$nombreprod</td>
<td>$descrprod</td>
<td>$cantidadprod</td>
<td>$ $precioprod</td>
<td>$link_editar</td>
</tr>
";

}

?>