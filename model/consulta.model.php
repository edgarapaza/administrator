<?php
require "Conexion.php";

class Consulta()
{
	private $conn;

	function __construct()
	{
		$this->conn = new Conexion();
		return $this->conn;
	}

	function NumeroIngresoDiarios()
	{
		$fecha = date('Y-m-d');
		$sql = "";
		$this->conn->ConsultaArray($sql);
	}
}