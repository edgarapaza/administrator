<?php
class conexionclass {

    public function conectarse(){
        $server="localhost";
        $user="root";
        $password="admin";
        $db="dbarp";
        $port="3306";

        //Vista de las Fucniones de Conexxion
        if(!$link=mysql_connect($server,$user,$password)){
            echo "Error Conectando con el Servidor";
            exit ();
        }

        if(!mysql_select_db($db,$link)){
            echo "Error seleccionando la Base de Datos";
            exit ();
        }

        return $link;
    }

}
?>
