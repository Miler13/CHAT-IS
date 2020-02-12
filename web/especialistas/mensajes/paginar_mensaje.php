<?php
session_start();
include('../../admin/conexion.php');

$user = $_SESSION['NombreUsuario'];
$dato = $_POST['partida'];
	$paginaActual = 0;
 //  $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM mensajes WHERE para='$user'"));

 $numeroRegistros = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM grupo_has_usuarios,grupo,chat WHERE grupo_has_usuarios.grupo_idgrupo=grupo.idgrupo"));
 $nroLotes = 100;
 $nroPaginas = ceil($numeroRegistros/$nroLotes);
 $lista = '';
 $tabla = '';

 if($paginaActual > 1){
     $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
 }
 for($i=1; $i<=$nroPaginas; $i++){
     if($i == $paginaActual){
         $lista = $lista.'<li class=""><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
     }else{
         $lista = $lista.'';
     }
 }
 if($paginaActual < $nroPaginas){
     $lista = $lista.'';

 }

   if($paginaActual <= 1){
       $limit = 0;
   }else{
       $limit = $nroLotes*($paginaActual-1);
   }
 //  $registro = mysqli_query($conexion,"SELECT * FROM mensajes  WHERE para='$user' LIMIT $limit, $nroLotes ");
   $registro = mysqli_query($conexion,"SELECT * FROM grupo_has_usuarios,grupo,chat WHERE grupo_has_usuarios.grupo_idgrupo=grupo.idgrupo and grupo.idgrupo= '$dato' LIMIT $limit, $nroLotes ");
   $tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
                         <tr>
                    
                </tr>';		
           while($registro2 = mysqli_fetch_array($registro)){
   $tabla = $tabla.'<tr>
                          <td>'.$registro2['remitente'].'</td>
                           <td> '.$registro2['Fecha'].'</td>
                           <td>'.$registro2['contenido'].'</td>
                           
                            
                    
                       </td>
                           </tr>';	
 }
     
 $tabla = $tabla.'</table>';
 $array = array(0 => $tabla,
                1 => $lista);

 echo json_encode($array);
?>