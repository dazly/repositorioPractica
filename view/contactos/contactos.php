<?php
function viewContactos($registros, $nomGrupo) {
	include_once('view/header.php');
	include_once('view/sidebar_left.php');
?>
		<!-- CONTENT -->
		<div class="daz-content">
			<div class="daz-main-content container-fluid">

				<div class="row content-header">
					<div class="col-md-10">
						<h4 class="card-title"><i class="far fa-user"></i> <?php if($nomGrupo == 'Todo'){echo'Contactos';}else{echo($nomGrupo);} ?>
							<span class="card-subtitle">Lista de contactos</span>
						</h4>
					</div>
					<div class="col-md-2">
						<a class="btn btn-primary content-btn" role="button"
							href="index.php?url=vista_nuevo_contacto&grupo=<?= $nomGrupo ?>"><i class="fa fa-plus-circle"></i> Nuevo Contacto</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="divider"></div>
					</div>
				</div>
			<?php 
				if ($registros[0] != NULL) {

				echo "<div class=\"row content-table-cab\">
							<div class=\"col-md-2\"><h6>Nombre</h6></div>
							<div class=\"col-md-3\"><h6>Apellidos</h6></div>
							<div class=\"col-md-2\"><h6>Móvil</h6></div>
							<div class=\"col-md-3\"><h6>Email</h6></div>
							<div class=\"col-md-2\"><h6>Acciones</h6></div>
						</div>";

					foreach ($registros as $reg) {
						echo"<div class=\"row content-table-row\">";

							foreach ($reg as $key => $value) {
								if ($key == 'nombre') {
									echo "<div class=\"col-md-2\"><p><i class=\"fas fa-user-circle\"></i> ",$value,"</p></div>";
								} elseif ($key == 'apellidos') {
									echo "<div class=\"col-md-3\"><p>",$value,"</p></div>";
								} elseif ($key == 'movil') {
									echo "<div class=\"col-md-2\"><p><i class=\"fas fa-mobile\"></i> ",$value,"</p></div>";
								} elseif ($key == 'email') {
									echo "<div class=\"col-md-3\"><p><i class=\"fas fa-envelope\"></i> ",$value,"</p></div>";
								} 
							}
						echo"	<div class=\"col-md-2\">
									<a class=\"btn btn-primary action-btn-delete\" role=\"button\" data-toggle=\"tooltip\" title=\"Eliminar\"
										href=\"index.php?url=eliminar_contacto&id_contacto={$reg['id']}&grupo={$nomGrupo}\"><i class=\"fa fa-times\"></i></a>
									<a class=\"btn btn-primary action-btn-edit\" role=\"button\" data-toggle=\"tooltip\" title=\"Editar\"
										href=\"index.php?url=vista_editar_contacto&id_contacto={$reg['id']}\"><i class=\"fa fa-chevron-down\"></i></a>
								</div>
							</div>";
					}
				} else {
					echo "<div class=\"alert alert-info content-alert\" role=\"alert\">
								<h4 class=\"alert-heading\">Lo siento!</h4>
								<p>Pero aún no tiene contactos!<br>
							  		Agregue contactos y organícelos por grupos.</p>
							  	<hr>
							  	<i class=\"fab fa-ember\"></i>
							</div>";
				}
			?>

			</div>
		</div>
		<!-- END CONTENT -->
	</div>
	
<?php
	include_once('view/sidebar_right.php');
	include_once('view/footer.php');
}
?>