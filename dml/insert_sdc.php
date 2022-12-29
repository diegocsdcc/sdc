<?php

if (isset($_POST["btn_ingresar"])) {

	date_default_timezone_set("America/Santiago");
	$fecha_act = date('Y-m-d');
	$hora_act = date("H:i:s");

	$sql = "INSERT INTO solicitud (fk_users,fecha,hora,estado,estadousers) VALUES ('$iduser','$fecha_act','$hora_act','3','1')";
	$rs = mysqli_query($conn,$sql);

	if ($rs==true) {

		$sql2 = "SELECT id FROM solicitud ORDER BY id DESC LIMIT 1";
		$rs2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_array($rs2);
		$id_solicitud = $row2['id'];

		for($i=0; $i<count($_POST['txt_nombre_']); $i++) {
			
			$txt_nombre = $_POST['txt_nombre_'][$i];
			$txt_descr = $_POST['txt_descr_'][$i];
			$txt_cantidad = $_POST['txt_cantidad_'][$i];
			$txt_precio = $_POST['txt_precio_'][$i];

			$sql3 = "INSERT INTO productos (fk_solicitud,nombre,descr,cantidad,precio) VALUES ('$id_solicitud','$txt_nombre','$txt_descr','$txt_cantidad','$txt_precio')";
			$rs3 = mysqli_query($conn, $sql3);
			//Esto va a realizar una inserción en la base de datos por cada fila del array que llega desde mi formulario
		}

		echo "<script>window.location='ingresar_sdc.php?insert=true';</script>";

	}else{
		echo "<script type='text/javascript'>alert('Error al Ingresar la Solicitud');window.location.href='ingresar_sdc.php?insert=false';</script>";
	}
}

?>