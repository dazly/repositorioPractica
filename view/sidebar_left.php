<?php
include_once('controller/controller.php');
$controller = new Controller;
?>

		<!-- SIDEBAR LEFT -->
		<div class="daz-sidebar-left">
			<div class="sidebar-left-wrapper">
				<div class="sidebar-left-spacer">
					<div class="sidebar-left-scroll">
						<div class="sidebar-left-content">
							<ul class="sidebar-elements">
								<li class="divider"></li>
								<li class="active"><a href="index.php"><i class="fa fa-desktop"></i>Home</a></li>
								<li><a href="#"><i class="far fa-address-book"></i>Contactos</a>
									<ul class="submenu">
										<?php
											$regSidebar = $controller->listarGruposContactos('nomGrupoSidebar');
											foreach ($regSidebar as $key => $value) {
												echo "<li><a href=\"index.php?url=lista_contactos&grupo={$value['nom_grupo']}\">{$value['nom_grupo']}</a></li>";
											}
										?>
										<li><a class="nuevoGrupo" href="#">Nuevo Grupo <i class="fa fa-plus-circle"></i></a>
											<form method="post" action="index.php?url=nuevo_grupo">
												<div>
													<label for="crearGrupoContactos" class="sr-only">Crear Grupo</label>
													<input type="text" class="form-control" name="nom_grupo" id="validationDefaultUsername" placeholder="Nombre Grupo" aria-describedby="inputGroupPrepend2" required>
												</div>
												<button type="submit" class="btn btn-primary" name="crear_grupo">Crear</button>
											</form>
										</li>
									</ul>
								</li>
								<li><a href="#"><i class="far fa-sticky-note"></i>Notas</a>
									<ul class="submenu">
										<li><a href="#">Todos</a></li>
										<li><a href="#">Nuevo Proyecto <i class="fa fa-plus-circle"></i></a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END SIDEBAR LEFT -->