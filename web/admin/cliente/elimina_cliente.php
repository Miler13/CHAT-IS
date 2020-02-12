<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM especialistas WHERE idEspecialista = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}


$registro = mysqli_query($conexion,"SELECT * FROM especialistas ORDER BY idEspecialista ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="10%">Nombres</th>
                       
                         <th width="5%">Cedula</th>
                         <th width="10%">Correo</th>
                         
                    
                                
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     <td>'.$registro2['NombresEspecialista'].'</td>
                               
                                <td>'.$registro2['CedulaEspecialista'].'</td>
                                 <td>'.$registro2['CorreoEspecialista'].'</td>
                          
                             
                               <td> <a href="javascript:editarRegistro('.$registro2['idEspecialista'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idEspecialista'].');">
                              <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                        </td>
			         	</tr>';
	}
echo '</table>';
?>