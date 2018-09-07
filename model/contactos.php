<?php
require_once('core/db_model.php');


class GrupoContactos extends DBModel {

	protected $db_name = 'david';
	public $id;
	public $nom_grupo;

	public function crearGrupoContactos($data) {
		$this->consulta = "
			INSERT INTO grupo (nom_grupo)
			VALUES ('$data[nom_grupo]')
		";
		$this->ejecutarConsulta();
	}

	public function listarGruposContactos() {
		$this->consulta = "
			SELECT nom_grupo
			FROM grupo
		";
		$this->obtenerRegistros();
		return $this->registros;
	}

	public function eliminarGrupoContactos($nomGrupo) {

	}
}

class Contactos extends DBModel {

	protected $db_name = 'david';
	public $fvrt;
	public $nom;
	public $ape;
	public $mov;
	public $email;
	public $grupo_id;

	public function listaContactos($data) {

		if ($data == 'Todo') {
			$this->consulta = "
				SELECT id, nombre, apellidos, movil, email
				FROM contactos
			";
		} elseif ($data == 'Favorito') {
			$this->consulta = "
				SELECT c.id, nombre, apellidos, movil, email, g.nom_grupo
				FROM contactos as c
				JOIN grupo as g ON g.id = c.id_grupo
				WHERE c.favorito = 1
			";	
		} else {
			$this->consulta = "
				SELECT c.id, nombre, apellidos, movil, email
				FROM contactos as c
				JOIN grupo as g ON g.id = c.id_grupo
				WHERE g.nom_grupo = '$data'
			";
		}
		$this->obtenerRegistros();
		return $this->registros;
	}

	public function crearContacto($data, $grupo) {

		isset($data['favorito']) ? $fav = 1 : $fav = 0;
		$this->consulta = "
			SELECT id
			FROM grupo 
			WHERE nom_grupo = '$grupo'
		";
		$this->obtenerRegistros();
		$id = $this->registros[0]['id'];
		$this->registros = array(); //formatear 'registros' despues de obtener id de 'grupo' para luego listar contactos

		$this->consulta = "
			INSERT INTO contactos (favorito, nombre, apellidos, movil, email, id_grupo)
			VALUES ($fav, '$data[nombre]', '$data[apellidos]', $data[movil], '$data[email]', $id)
		";
		$this->ejecutarConsulta();
	}

	public function vistaEditarContacto($idContacto) {

		$this->consulta = "
			SELECT favorito, nombre, apellidos, movil, email, g.nom_grupo
			FROM contactos as c
			JOIN grupo as g ON g.id = c.id_grupo
			WHERE c.id = $idContacto
		";
		$this->obtenerRegistros();
		return $this->registros;
	}

	public function actualizarContacto($data, $idContacto) {
		
		isset($data['favorito']) ? $fav = 1 : $fav = 0;
		$this->consulta = "
			SELECT id
			FROM grupo
			WHERE nom_grupo = '$data[nom_grupo]'
		";
		$this->obtenerRegistros();
		$id_grupo = $this->registros[0]['id'];
		$this->registros = array(); //formatear 'registros'

		$this->consulta = "
			UPDATE contactos
			SET favorito = $fav, nombre = '$data[nombre]', apellidos = '$data[apellidos]', movil = $data[movil], email = '$data[email]', id_grupo = $id_grupo
			WHERE id = $idContacto
		";
		$this->ejecutarConsulta();
		return $data['nom_grupo'];
	}

	public function eliminarContacto($idContacto) {
		$this->consulta = "
			DELETE FROM contactos
			WHERE id = $idContacto
		";
		$this->ejecutarConsulta();
	}
}







