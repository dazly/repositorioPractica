<?php 

//Incluimos el controlador de las clases
include_once('controller/controller.php');
$controller = new Controller;


//Accede cuando se interactua con las vistas
if (isset($_GET['url'])) {
	
	//Accede a diferentes rutas 
	switch ($_GET['url']) {

		//Ruta para crear grupo de contactos en 'sidebar_left.php'
		case 'nuevo_grupo':
			isset($_POST['crear_grupo']) ? $controller->crearGrupoContactos($_POST) : viewLayoutWeb();
			break;

		//Ruta para listar Contactos....
		case 'lista_contactos':
			isset($_GET['grupo']) ? $controller->listaContactos($_GET['grupo']) : viewLayoutWeb();
			break;

		case 'vista_nuevo_contacto':
			isset($_GET['grupo']) ? $controller->vistaNuevoContacto($_GET['grupo']) : viewLayoutWeb();
			break;

		case 'crear_contacto':
			isset($_POST['crear_contacto']) ? $controller->crearContacto($_POST, $_GET['grupo']) : viewLayoutWeb();
			break;

		case 'vista_editar_contacto':
			isset($_GET['id_contacto']) ? $controller->vistaEditarContacto($_GET['id_contacto']) : viewLayoutWeb();
			break;

		case 'actualizar_contacto':
			isset($_POST['crear_contacto']) ? $controller->actualizarContacto($_POST, $_GET['id_contacto']) : viewLayoutWeb();
			break;

		case 'eliminar_contacto':
			isset($_GET['id_contacto']) ? $controller->eliminarContacto($_GET['id_contacto'], $_GET['grupo']) : viewLayoutWeb();
			break;
		
		default:
			$controller->vistaLayoutWeb();
			break;
	}
} else {
	$controller->vistaLayoutWeb();
}