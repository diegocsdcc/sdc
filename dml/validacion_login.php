<?php
session_start();
include("../con_mysql.php");

$txt_user	=	$_REQUEST["txt_user"];
$txt_pass	=	$_REQUEST["txt_pass"];

$sql 		=	"SELECT * FROM users WHERE (user='$txt_user' AND pass='$txt_pass')";
$rs			=	mysqli_query($conn,$sql);

if (mysqli_num_rows($rs)!=0)
{
	 if($row=mysqli_fetch_array($rs))
	 {
	 	$_SESSION['id']		=	$row['id'];
	 	$_SESSION['user']	=	$row['user'];
		$_SESSION['tipo']	=	$row['tipo'];
		$_SESSION['nombre']	=	$row['nombre'];
		$_SESSION['area']	=	$row['area'];
	 	
        echo "<script type='text/javascript'>window.location='../inicio.php'</script>";
	 }
	 else
	 {
	 	echo "<script type='text/javascript'>window.location='../index.php?error=true'</script>";
	 }	
}

else
{
	echo "<script type='text/javascript'>window.location='../index.php?error=true'</script>";
}


?>