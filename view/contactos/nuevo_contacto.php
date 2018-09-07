<?php
function viewNuevoContacto($data) {
	//La variable '$data' puede ser un STRING o un ARRAY:
	//Es un STRING cuando nos da el nombre del grupo donde 'crearemos' el nuevo contacto
	//Es un ARRAY cuando nos da los datos del contacto a 'editar'

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
								<h4 class="card-title">
									<?php
									if (is_string($data)) { 
										if ($data == 'Todo') echo 'Contactos';
										else echo $data;
									} elseif (is_array($data)) {
										echo 'Editar Contacto';
									}
									?>
								<span class="card-subtitle"><?= is_string($data) ? "Nuevo contacto" : "Actualizar" ?></span></h4>
	                	</div>
	               	<div class="card-body">
	               	<?php 
							if (is_string($data)) {
								echo "<form method=\"post\" action=\"index.php?url=crear_contacto&grupo={$data}\">";
							} elseif (is_array($data)) {
								echo "<form method=\"post\" action=\"index.php?url=actualizar_contacto&id_contacto={$_GET['id_contacto']}\">";
							}
							?>
		                  	<div class="form-group row">
		                  		<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Favorito</label>
		                  		<div class="col-12 col-sm-8 col-lg-6">
											<div class="switch-button switch-button-sm">
			                     		<input type="checkbox" name="favorito" id="favorito" 
			                        		<?= is_array($data) && $data[0]['favorito'] == 1 ? "checked=\"checked\"" : '' ?>">
			                          	<span><label for="favorito"></label></span>
			                        </div>
		                      	</div>
		                  	</div>
							<?php 
							if (is_array($data)) {
		               echo "<div class=\"form-group row\">
		                      	<label class=\"col-12 col-sm-3 col-form-label text-sm-right\" for=\"inputText3\">Grupo</label>
		                      	<div class=\"col-12 col-sm-8 col-lg-6\">
		                        	<select id=\"listaGrupos\" name=\"nom_grupo\" class=\"form-control required\">";
		               	
		               	//Uso $regSidebar porque ya tiene la lista de grupos > al cargar sidebar_left.php 
								foreach ($regSidebar as $key => $value) {
									if ($data[0]['nom_grupo'] == $value['nom_grupo']) {
										echo "<option value=\"{$value['nom_grupo']}\" selected>{$value['nom_grupo']}</option>";
									} else {
										echo "<option value=\"{$value['nom_grupo']}\">{$value['nom_grupo']}</option>";
									}
								}	
		               		echo "</select>
		                      	</div>
		                    	</div>";
		               }
		               ?>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Nombre</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="nombre" value="<?= is_array($data) ? "{$data[0]['nombre']}" : '' ?>">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Apellidos</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="apellidos" value="<?= is_array($data) ? "{$data[0]['apellidos']}" : '' ?>">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Móvil</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="movil" value="<?= is_array($data) ? "{$data[0]['movil']}" : '' ?>">
		                      	</div>
		                    	</div>
		                    	<div class="form-group row">
		                      	<label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email</label>
		                      	<div class="col-12 col-sm-8 col-lg-6">
		                        	<input class="form-control" type="text" name="email" value="<?= is_array($data) ? "{$data[0]['email']}" : '' ?>">
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