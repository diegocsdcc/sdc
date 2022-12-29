<?php

$sql5 = "SELECT solicitud.id,DATE_FORMAT(solicitud.fecha,'%d-%m-%Y') AS fecha,DATE_FORMAT(solicitud.hora,'%H:%i') AS hora,solicitud.estado,solicitud.estadousers,solicitud.nota,SUM(productos.cantidad) AS sum_cantidad,SUM(productos.precio) AS sum_precio FROM solicitud INNER JOIN productos ON solicitud.id = productos.fk_solicitud WHERE (solicitud.fk_users = '$iduser') AND (solicitud.id='$idsoli') AND (solicitud.estadousers='1') GROUP BY solicitud.id,solicitud.fecha,solicitud.hora,solicitud.estado,solicitud.estadousers,solicitud.nota";
$rs5 = mysqli_query($conn,$sql5);

$row5 = mysqli_fetch_array($rs5);

$id=$row5['id'];
$fecha=$row5['fecha'];
$hora=$row5['hora'];
$estado=$row5['estado'];
$nota=$row5['nota'];
$sum_cantidad=$row5['sum_cantidad'];
$sum_precio=$row5['sum_precio'];

if (is_null($nota)) {
	$nota="No se ha ingresado información.";
}

$disablebtnupdate="disabled='disabled'";
$disablebtndelete="disabled='disabled'";

if ($estado=="3") {
	$estadotittle="Pendiente";
    $estadocolor="warning";
    $estadoinfo="Solititud Pendiente de Revisión";
    $estadoicon="icon fa fa-files-o fa-3x";
    $disablebtndelete="";

}else if ($estado=="4") {
	$estadotittle="Pendiente <b>(Por Corregir)</b>";
	$estadocolor="warning";
	$estadoinfo="Solicitud Por Corregir";
	$estadoicon="icon fa fa-edit fa-3x";
	$notainfo="<div class='alert alert-dismissible alert-warning'><button class='close' type='button' data-dismiss='alert'>×</button><h4>Nota</h4><p>$nota</p></div>";
	$disablebtnupdate="";
	$disablebtndelete="";

}else if ($estado=="1") {
	$estadotittle="Aceptada";
	$estadocolor="bg-success";
	$estadoinfo="Solicitud Aceptada";
	$estadoicon="icon fa fa-thumbs-o-up fa-3x";

}else if ($estado=="2") {
	$estadotittle = "Rechazada";
	$estadocolor = "danger";
	$estadoinfo="Solicitud Rechazada";
	$estadoicon="icon fa fa-thumbs-o-down fa-3x";
}

if (isset($_POST["btn_editar_sdc"])) {

	$sql12 = "UPDATE solicitud SET estado='3' WHERE (id='$idsoli') AND (fk_users='$iduser')";
	$rs12 = mysqli_query($conn,$sql12);

	if ($rs12==true) {
		echo "<script>window.location='revisar_sdc.php?id=$idsoli&updatesoli=true';</script>";
	}else{
		echo "<script>window.location='revisar_sdc.php?id=$idsoli&updatesoli=false';</script>";
	}
}

if (isset($_POST["btn_eliminar_sdc"])) {

	$sql13 = "UPDATE solicitud SET estadousers='2' WHERE (id='$idsoli') AND (fk_users='$iduser')";
	$rs13 = mysqli_query($conn,$sql13);

	if ($rs13==true) {
		echo "<script>window.location='estado_sdc.php?deletesoli=true';</script>";
	}else{
		echo "<script>window.location='estado_sdc.php?deletesoli=false';</script>";
	}
}

?>