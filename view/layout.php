<?php
function viewLayoutWeb($registros, $nomGrupo) {
	include_once('view/header.php');
	include_once('view/sidebar_left.php');
?>
		<!-- CONTENT -->
		<div class="daz-content">
			<div class="daz-main-content container-fluid">

				<div class="row">
					<div class="col-12 col-lg-6 col-xl-3">
						<div class="card card-note">
							<div class="card-header">
								<h4 class="card-title">Nota <a href="#"><i class="fa fa-check-circle"></i></a></h4>
							</div>
							<div class="card-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero non neque voluptatem veniam, necessitatibus.</p>
							</div>
						</div>
					</div>
				</div>
				

			<?php 
				if ($registros[0] != NULL) {

				echo	"<div class=\"row content-header content-favoritos\">
							<div class=\"col-md-12\">
								<h4 class=\"card-title\"><i class=\"far fa-star tx-color-amarillo\"></i> Contactos Favoritos</h4>
							</div>
						</div>

						<div class=\"row content-table-cab\">
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
									<a class=\"btn btn-primary action-btn-delete\" role=\"button\"
										href=\"index.php?url=eliminar_contacto&id_contacto={$reg['id']}&grupo={$nomGrupo}\"><i class=\"fa fa-times\"></i></a>
									<a class=\"btn btn-primary action-btn-edit\" role=\"button\" 
										href=\"index.php?url=vista_editar_contacto&id_contacto={$reg['id']}\"><i class=\"fa fa-chevron-down\"></i></a>
								</div>
							</div>";
					}
				} else {
					echo "<div class=\"alert alert-info content-alert\" role=\"alert\">
								<h4 class=\"card-title\"><i class=\"far fa-star tx-color-amarillo\"></i> Contactos Favoritos</h4>
								<p>Lo siento, pero aún no tiene contactos Favoritos!<br>
							  		Agregue contactos y seleccionalos como favoritos.</p>
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