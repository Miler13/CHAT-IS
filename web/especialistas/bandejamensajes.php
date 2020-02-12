
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from Cliente where idCliente = $codigo");
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];
                 }

                // $consulta2 = mysqli_query($conexion,"select concat (NombresEspecialista, ' ', ApellidosEspecialista) as especilista from Especialistas where idEspecialista = $codigo");
                 //while($filas2=mysqli_fetch_array($consulta2)){
                   //      $docente=$filas2['Nombrespecialista'];
                // }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHAT</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
      <script src="mensajes/myjava.js"></script>
  
     
</head>

<body>
<?php
include ('menu_inicio_especialista.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src=" " width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">

                <img src="" class="img-responsive">

             </div>
               <div class="col-md-3">
             
               </div>

            </div>


            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li class="active">Cliente</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->

            <div class="col-md-2">
                <div class="list-group">
                    <a class="list-group-item active">contactos</a>
     
                   
                    <a href="bandejamensajes.php" class="list-group-item"> <i class="glyphicon glyphicon-edit"></i>   &nbsp;&nbsp; nuevo Chat
    


                    <?php	

									$registro = mysqli_query($conexion,"SELECT * FROM grupo ");
									
                                    while($registro2 = mysqli_fetch_array($registro)){
								?>
								 <a href="javascript:pagination(<?php echo utf8_encode($registro2['idgrupo'])?> );" class="list-group-item"> <i class=></i>   &nbsp;&nbsp; 	<?php echo $registro2['nombre']?> </a>
        
							



                              
                               
                      
                           
                
                           <?php	} ?>
                   
              
                   
                </div>

            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container">
      <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Mensajes</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               <div class="col-md-5">
		               <input type="text" name="s" id="bs-prod" class="form-control" placeholder=" ">
		               </div>
		               	<div class="col-md-6">
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    
        </h4>
          </center>
      </div>
   


   
  
    <!-- MODAL PARA EL REGISTRO-->
   
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
        <hr>
    </div>
 
</body>

</html>

<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../index.l.php"; </script>';
     }
}else{
 echo '<script> window.location="../index.php"; </script>';
}
?>
