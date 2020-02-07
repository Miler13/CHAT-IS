<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
              $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from usuarios where Codigo = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chasqui</title>
    <link rel="shortcut icon" href="../imagenes/logo.jpg" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
 
    <script src="../js/bootstrap.min.js"></script>
    <script src="editor/myjava.js"></script>

    
    
    <script src="validar.js"></script>
    <script type="text/javascript">
        function validarEmail(elemento) {

            var texto = document.getElementById(elemento.id).value;
            var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if (!regex.test(texto)) {
                document.getElementById("resultado").innerHTML = "Correo invalido";
            } else {
                document.getElementById("resultado").innerHTML = "";
            }

        }
        
    </script>
</head>
<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/baner.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
              <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Editor</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container">
      <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Administracion de Editores</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               <div class="col-md-5">
		               <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escribir el Nombre del Editor" onkeypress="return sololetras(event)">
		               </div>
		               	<div class="col-md-6">
		                  <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nuevo Editor</button> 
		                 
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
    <?php
include('conexion.php');
    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM editor"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#337ab7; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-user'></i>&nbsp;&nbsp;Editor</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-2 control-label">Proceso:</label>
				<div class="col-md-10"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
			   </div> <br>
			   <div class="form-group"> <label for="nombre" class="col-md-2 control-label">Nombres:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su(s) nombre(s)" onkeypress="return sololetras(event)" required maxlength="50"></div>
			   </div><br>
			   <div class="form-group"> <label for="apellido" class="col-md-2 control-label">Apellidos:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su(s) apellido(s)" onkeypress="return sololetras(event)" required maxlength="50"></div>
			   </div><br>
         <div class="form-group"> <label for="cedula" class="col-md-2 control-label">CI:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese su carnet de identidad" onkeypress="return solonumeros(event)" required maxlength="10" minlength="5"></div>
			   </div><br>
			   <div class="form-group"> <label for="correo" class="col-md-2 control-label">Correo:</label>
				<div class="col-md-10"><input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electronico" onkeyup="validarEmail(this)" required maxlength="50"></div>
			   </div><br>
			   <div class="form-group"> <label for="celular" class="col-md-2 control-label">Celular:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese su número de celular" onkeypress="return solonumeros(event)" required maxlength="8" minlength="8"></div>
			   </div><br>
			   <div class="form-group"> <label for="telefono" class="col-md-2 control-label">Telefono:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su numero de telefono fijo" onkeypress="return solonumeros(event)" required maxlength="7"minlength="7"></div>
			   </div><br>
			   <div class="form-group"> <label for="direccion" class="col-md-2 control-label">Direccion:</label>
				<div class="col-md-10">
		       <textarea class="form-control" id="direccion" name="direccion" required="" maxlength="250" placeholder="Ingrese su direccion de domicilio"></textarea></div>
		       <br>
			   </div><br>
			   
                <br><br>
               

                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
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
    <?php
    include('../includes/footer.php');
 ?>
</body>
</html>
<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../index.l.php"; </script>';
     }
}else{
 echo '<script> window.location="../index.l.php"; </script>';
}
?>
