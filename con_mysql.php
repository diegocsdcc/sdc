<?php
$user 		= "root";
$password 	= "";
$db 		= "sdc";
$host 		= "localhost";
$conn 		= mysqli_connect($host, $user, $password, $db);

if (!$conn)
{ 
exit( "Error al conectar: ".$conn);
}
?>