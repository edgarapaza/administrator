<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DistritoClas
 *
 * @author archivox
 */
class DistritoClass {
    
    public function VerDistrito($codigo) {
        require '../coreapp/conection.php';
        
        $sql = "SELECT des_dst AS distrito FROM distritos WHERE cod_dst = $codigo;";
        $result = $mysqli->query($sql);
        $fila = $result->fetch_assoc();
        //echo $fila['distrito'];
        return $fila['distrito'];
    }
}