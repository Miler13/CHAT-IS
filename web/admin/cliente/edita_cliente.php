<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM Cliente WHERE idCliente = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				 
				0 => $valores2['NombreCliente'], 
			    1 => $valores2['ApellidoCliente'], 
				2 => $valores2['CedulaCliente'], 
				3 => $valores2['CorreoCliente'], 
				4 => $valores2['TelefonoCliente'], 
				
				); 
echo json_encode($datos);
?>