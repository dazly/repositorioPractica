<?php
require_once('model/contactos.php');

include_once('view/layout.php');
include_once('view/contactos/contactos.php');
include_once('view/contactos/nuevo_contacto.php');


class Controller {

	private $grupoContactos;
	private $contactos;

	function __construct() {
		$this->grupoContactos = new GrupoContactos;
		$this->contactos = new Contactos;
	}


	//-- Clase ContactosGrupo --//
	public function crearGrupoContactos($data) {
		$this->grupoContactos->crearGrupoContactos($data);
		$nom_grupo = $data['nom_grupo']; //creo una variable para extraer el nombre del grupo de contactos del array $data
		viewContactos(NULL, $nom_grupo);
	}

	public function listarGruposContactos($data) {
		if ($data = 'nomGrupoSidebar') {
			$registros = $this->grupoContactos->listarGruposContactos();
			return $registros;
		}
	}
	//-- END Clase ContactosGrupo --//



	//-- Clase Contactos --//
	public function vistaLayoutWeb() {
		$fav = 'Favorito';
		$registros = $this->contactos->listaContactos($fav);
		viewLayoutWeb($registros, $fav);
	}

	public function listaContactos($data) {
		$registros = $this->contactos->listaContactos($data);
		viewContactos($registros, $data);
	}

	public function vistaNuevoContacto($nomGrupo) {
		viewNuevoContacto($nomGrupo);
	}

	public function crearContacto($data, $grupo) {
		$this->contactos->crearContacto($data, $grupo);
		$this->listaContactos($grupo);
	}

	public function vistaEditarContacto($idContacto) {
		$registros = $this->contactos->vistaEditarContacto($idContacto);
		viewNuevoContacto($registros);
	}

	public function actualizarContacto($data, $idContacto) {
		$nomGrupo = $this->contactos->actualizarContacto($data, $idContacto);
		$this->listaContactos($nomGrupo);
	}

	public function eliminarContacto($idContacto, $nomGrupo) {
		$this->contactos->eliminarContacto($idContacto);
		$nomGrupo == 'Favorito' ? $this->vistaLayoutWeb() : $this->listaContactos($nomGrupo);
	}
	//-- END Clase Clase Contactos --//
}











