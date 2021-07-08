<?php
require "Conexion.php";

class Validacion
{
	private $conn;

    function __construct()
    {
    	$this->conn = new Conexion();
    	return $this->conn;
    }

	function ValidacionCuenta($user, $pass)
	{
		$sql = "SELECT cod_usu, niv_usu FROM usuarios WHERE log_usu='$user' AND psw_usu ='$pass' LIMIT 1";
		$res = $this->conn->ConsultaArray($sql);
		return $res;
	}

}
