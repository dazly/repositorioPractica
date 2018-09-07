<?php
/*
 * Clase para interactuar con la DB
 */

class DBModel {

	private static $host = 'localhost';
	private static $user = 'root';
	private static $pass = 'root';
	protected $db_name;

	public $conn;
	protected $consulta;
	protected $registros = array();
	

	//Conectar a la base de datos
	function openConnection() {
		$this->conn = new mysqli(self::$host, self::$user, self::$pass, $this->db_name);
		mysqli_set_charset($this->conn, 'utf8');
	}

	//Desconectar de la base de datos
	function closeConnection() {
		$this->conn->close();
	}

	//Ejecutar consulta que retorna un valor
	function ejecutarConsulta() {
		$this->openConnection();
		$res = $this->conn->query($this->consulta);
		$this->closeConnection();
		return $res;
	}

	//Obtener registros de la base de datos
	function obtenerRegistros($datos = []) {
		$this->openConnection();
		$sentencia = $this->conn->prepare($this->consulta);
		if(!empty($datos)){
			foreach ($datos as $key => $value) {
				$sentencia->bind_param($key, $value);
			}
		}
		$sentencia->execute();
		$reg = $sentencia->get_result();
		$rows = $reg->num_rows;
		$i = 0;
		do {
			$this->registros[] = $reg->fetch_assoc();
			$i++;
		} while ($i < $rows);
		$this->closeConnection();
	}
}