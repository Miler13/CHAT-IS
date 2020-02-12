       <?php
       include ('conexion.php');

      
     
    
        
        $TotalUsuarios = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM usuarios"));
     
       
        
   
        ?>

         <div class="row">
            <div class="col-lg-10">
            </div>
         

      
         
            
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                      <h4 class="media-heading">Cuentas de Usuarios</h4>
                        <p>Total de Usuarios: <span class="label label-danger pull-right"><?php echo $TotalUsuarios ?></span></p>
                        <a href="usuarios.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>                   
                </div>
            </div>



            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-3x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                         <h4 class="media-heading">Usuarios</h4>
                       <p>Total de Usuarios: <span class="label label-danger pull-right"><?php echo $TotalUsuarios ?></span></p>
                       <a href="Cliente.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>                    
                </div>
            </div>

         

				<div class="col-md-3 col-sm-6">
					<div class="panel panel-default text-center">
						<div class="panel-heading">
							<span class="fa-stack fa-3x">
								  <i class="fa fa-circle fa-stack-2x text-primary"></i>
								  <i class="fa fa-gears fa-stack-1x fa-inverse"></i>
							</span>

                    </div>
                    <div class="panel-body">
                            <h4 class="media-heading">Canbiar Foto</h4>
                        <p>Foto<span class="label label-danger pull-right"></span></p>
                      <a href="cambiar_foto.php" class="btn btn-success"><i class="fa fa-mail-forward"></i>  Entrar</a>
                    </div>
                </div>
            </div>

        </div>

