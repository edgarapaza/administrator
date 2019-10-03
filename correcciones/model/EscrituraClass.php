<?php

class EscrituraClass
    {
        private $conn;
        function __construct(){
            require '../coreapp/Conexion.php';
            $conection = new Conexion();
            $this->conn= $conection->Conectar();
            return $this->conn;
        }

        function Escrituras($numero) {

            $sql = "SELECT cod_sct,cod_not,num_sct,cod_dst,fec_doc,cod_sub,nom_bie,can_fol,cod_pro,obs_sct,num_fol,cod_usu,hra_ing,proy_id FROM escrituras1 WHERE cod_pro = $numero";
            $rpta = $this->conn->query($sql);
            $data = $rpta->fetch_array();
            return $data;
        }

        function ListadoOtorgantes($numero) {

            $sql = "SELECT cod_inv,cod_inv_ju FROM escriotor1 WHERE cod_sct= $numero;";
            $rpta = $this->conn->query($sql);
            $data = $rpta->fetch_assoc();
            return $data;
        }

        function ListadoFavorecido($numero) {
            $sql= "SELECT cod_inv,cod_inv_ju FROM escrifavor1 WHERE cod_sct= $numero;";

            $rpta = $this->conn->query($sql);
            $data = $rpta->fetch_assoc();
            return $data;
        }

        function Buscar($numEscritura, $protocolo){
            $sql = "SELECT cod_sct FROM escrituras1 WHERE num_sct = $numEscritura AND cod_pro = $protocolo;";
            $rpta = $this->conn->query($sql);
            $data = $rpta->fetch_assoc();
            return $data;
        }
    }

/*
    $escri = new EscrituraClass();
    $data = $escri->Escrituras(2504);

    echo $data[0];
    */
?>