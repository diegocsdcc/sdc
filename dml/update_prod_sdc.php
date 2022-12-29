<?php

$sql7 = "SELECT id,fk_solicitud,nombre,descr,cantidad,precio FROM productos WHERE (id='$idprod') AND (fk_solicitud='$idsoli')";
$rs7 = mysqli_query($conn,$sql7);

$row7 = mysqli_fetch_array($rs7);

$value_nombre=$row7['nombre'];
$value_descr=$row7['descr'];
$value_cantidad=$row7['cantidad'];
$value_precio=$row7['precio'];

if (isset($_POST["btn_editar"])) {

$txt_nombre = $_POST['txt_nombre'];
$txt_descr = $_POST['txt_descr'];
$txt_cantidad = $_POST['txt_cantidad'];
$txt_precio = $_POST['txt_precio'];

$sql8 = "UPDATE productos SET nombre='$txt_nombre',descr='$txt_descr',cantidad='$txt_cantidad',precio='$txt_precio' WHERE (id='$idprod') AND (fk_solicitud='$idsoli')";
$rs8 = mysqli_query($conn,$sql8);

if ($rs8==true) {
	echo "<script>window.location='revisar_sdc.php?id=$idsoli&updateprod=true';</script>";
}else{
	echo "<script>window.location='revisar_sdc.php?id=$idsoli&updateprod=false';</script>";
}	

}

if (isset($_POST["btn_eliminar"])) {

$sql9 = "DELETE FROM productos WHERE (id='$idprod') AND (fk_solicitud='$idsoli')";
$rs9 = mysqli_query($conn,$sql9);

if ($rs9==true) {

	$sql10 = "SELECT COUNT(productos.id) AS count_prod FROM solicitud INNER JOIN productos ON solicitud.id = productos.fk_solicitud WHERE (solicitud.id='$idsoli')";
	$rs10 = mysqli_query($conn,$sql10);
	$row10 = mysqli_fetch_array($rs10);
	$count_prod=$row10['count_prod'];

	if ($count_prod==0) {
		$sql11 = "UPDATE solicitud SET estadousers='2' WHERE (id='$idsoli')";
		$rs11 = mysqli_query($conn,$sql11);
		echo "<script>window.location='estado_sdc.php?deleteprod=true';</script>";
	}else{
		echo "<script>window.location='revisar_sdc.php?id=$idsoli&deleteprod=true';</script>";
	}

}else{
	echo "<script>window.location='revisar_sdc.php?id=$idsoli&deleteprod=false';</script>";
}	

}

?>