<?php  
function viewNuevoContacto($nomGrupo) {
	include_once('view/header.php');
	include_once('view/sidebar_left.php');
?>
		<!-- CONTENT -->
		<div class="daz-content">
			<div class="daz-main-content container-fluid">
				
				<div class="row">
	            <div class="col-md-12">
	              	<div class="card card-note card-border-color br-color-azul">
	                	<div class="card-header">
								<h4 class="card-title"><?php if($nomGrupo == 'Todo'){echo'Contactos';}else{echo($nomGrupo);}; ?>
								<span class="card-subtitle">Nuevo contacto</span></h4>
	                	</div>
	               	<div class="card-body">
		                  <form method="post" action="index.php?url=crear_contacto&grupo=<?= $nomGrupo ?>">
		                  	<div class="form-group row">
		                  		<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Favorito</label>
		                  		<div class="col-12 col-sm-8 col-lg-6">
											<div class="switch-button switch-button-sm">
			                          <input type="checkbox" name="favorito" id="favorito">
			                          	<span><label for="favorito"></label></span>
			                        </div>
		                      	</div>
		                  	</div>
		                   	<div class="form-group row sr-only">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right sr-only" for="inputText3">Grupo</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control sr-only" type="text" disabled="disabled" name="grupo" value="<?= $nomGrupo; ?>">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Nombre</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="nombre">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Apellidos</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="apellidos">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Móvil</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="movil">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="email">
		                        	<br>
		                        	<button type="submit" class="btn btn-primary" name="crear_contacto">Enviar</button>
		                      	</div>
		                    	</div>
		                  </form>
	                	</div>
	              	</div>
	            </div>
	         </div>

			</div>
		</div>
		<!-- END CONTENT -->
	</div>

<?php 
	include_once('view/sidebar_right.php');
	include_once('view/footer.php');
}