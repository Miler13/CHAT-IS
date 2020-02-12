<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT * FROM Cliente WHERE NombreCliente LIKE '%$dato%' ORDER BY idCliente ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="10%">Nombres</th>
                         
                         <th width="5%">Cedula</th>
                         <th width="10%">Correo</th>
                      
                         <th width="10%">Telefono</th>
                                     
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		  echo '<tr>
      			         <td>'.$registro2['NombreCliente'].'</td>
                            
                             
                                 <td>'.$registro2['CorreoCliente'].'</td>
                               
                                <td>'.$registro2['TelefonoCliente'].'</td>
                               
                               <td> <a href="javascript:editarRegistro('.$registro2['idCliente'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idCliente'].');">
                              <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                        </td>
		      </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
