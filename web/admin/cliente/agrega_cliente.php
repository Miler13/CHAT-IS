
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];

$telefono = $_POST['telefono'];

$foto = "images/fotos_perfil/perfil.jpg";
$nick=$nombre.$apellido;

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO Cliente (NombreCliente, ApellidoCliente, CedulaCliente, CorreoCliente,  TelefonoCliente,  Foto) 
                                                               
   VALUES('$nombre','$apellido','$cedula','$correo','$telefono','$foto')");

  $consulta=mysqli_query($conexion,"SELECT idCliente from Cliente where CedulaCliente = '$cedula' and CorreoCliente = '$correo'");
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_cliente=$filas['idCliente'];
                 }
     mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) 
                                             VALUES('$nick','$cedula','2','$codigo_cliente', '$foto')");

	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE Cliente SET NombreCliente = '$nombre',  = '$apellido', CedulaCliente = '$cedula', CorreoCliente = '$correo', TelefonoCliente = '$telefono', where idCliente = '$id'");

    mysqli_query($conexion,"UPDATE usuarios SET NombreUsuario = '$nick', PassUsuario = '$cedula' where Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM Cliente ORDER BY idCliente ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                         <th width="10%">Nombres</th>
                       
                         <th width="5%">Cedula</th>
                         <th width="10%">Correo</th>
                      
                       
                        <th width="10%">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                          <td>'.$registro2['NombreCliente'].'</td>
                    
                          <td>'.$registro2['CedulaCliente'].'</td>
                           <td>'.$registro2['CorreoCliente'].'</td>
                         
                          <td>'.$registro2['TelefonoCliente'].'</td>
                         
                   <td> <a href="javascript:editarRegistro('.$registro2['idCliente'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idCliente'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>
