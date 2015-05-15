<?php

function DatosEscrituras($numero) {
    
        require '../model/EscrituraClass.php';
        require '../model/NotariosClass.php';
        require '../model/DistritoClass.php';
        
        $notario = new NotariosClass();
        $distritos = new DistritoClass();

        
        $recojo = new EscrituraClass();
        
        $dataEscrituras = $recojo->Escrituras($numero);
        
        $fila = $dataEscrituras->fetch_assoc();
        
            $archivo = file_get_contents("../correcciones/index.php");
            
            
            $html = str_replace('[[codigoEscritura]]', $fila['cod_sct'], $archivo);
            $html = str_replace('[[notario]]', $notario->VerNotario($fila['cod_not']), $archivo);
            $html = str_replace('[[escritura]]', $fila['num_sct'] , $archivo);
            $html = str_replace('[[distrito]]', $distritos->VerDistrito($fila['cod_dst']) , $archivo);
            $html = str_replace('[[fecha]]', $fila['fec_doc'] , $archivo);
            $html = str_replace('[[serie]]', $fila['cod_sub'] , $archivo);
            $html = str_replace('[[bien]]', $fila['nom_bie'] , $archivo);
            $html = str_replace('[[totalFolios]]', $fila['can_fol'] , $archivo);
            $html = str_replace('[[protocolo]]', $fila['cod_pro'] , $archivo);
            $html = str_replace('[[observaciones]]', $fila['obs_sct'] , $archivo);
            $html = str_replace('[[numeroFolio]]', $fila['num_fol'] , $archivo);
            $html = str_replace('[[usuario]]', $fila['cod_usu'] , $archivo);
            $html = str_replace('[[hora]]', $fila['hra_ing'] , $archivo);
            $html = str_replace('[[proyecto]]', $fila['proy_id'] , $archivo);
            
            echo $html;
            
            
                        
            
            /*
            echo $fila['cod_sct']."<br>";
            echo $fila['cod_not']."<br>";
            echo $fila['num_sct']."<br>";
            echo $fila['cod_dst']."<br>";
            echo $fila['fec_doc']."<br>";
            echo $fila['cod_sub']."<br>";
            echo $fila['nom_bie']."<br>";
            echo $fila['can_fol']."<br>";
            echo $fila['cod_pro']."<br>";
            echo $fila['obs_sct']."<br>";
            echo $fila['num_fol']."<br>";
            echo $fila['cod_usu']."<br>";
            echo $fila['hra_ing']."<br>";
            echo $fila['proy_id']."<br>";    
             *              */
            
            /*
            echo 'Codigo Escritura: '.$fila['cod_sct']."<br>";
            echo 'Codigo Notario: '.$notario->VerNotario($fila['cod_not'])."<br>";
            echo 'Numero de Escritura: '.$fila['num_sct']."<br>";
            echo 'Cod distrito: '.$distritos->VerDistrito($fila['cod_dst'])."<br>";
            echo 'Fecha del Documento: '.$fila['fec_doc']."<br>";
            echo 'Codigo sub serie: '.$fila['cod_sub']."<br>";
            echo 'Nombre del bien: '.$fila['nom_bie']."<br>";
            echo 'Cantidad de Folios: '.$fila['can_fol']."<br>";
            echo 'Numero de Protocolo: '.$fila['cod_pro']."<br>";
            echo 'Observaciones: '.$fila['obs_sct']."<br>";
            echo 'Numero de Folio: '.$fila['num_fol']."<br>";
            echo 'Codigo de usuario: '.$fila['cod_usu']."<br>";
            echo 'Hora de ingreso: '.$fila['hra_ing']."<br>";
            echo 'Codigo del Proyecto: '.$fila['proy_id']."<br>";
             * */
            
            
        
        
        echo $html;
            
        echo "Otorgantes -----------------------------------------------------<br>";
        $dataOtorgantes = $recojo->ListadoOtorgantes($numero);
        
        while($filao = $dataOtorgantes->fetch_assoc())
        {
            echo $filao['cod_inv']."<br>";
        }
        echo "Otorgantes Juridicos-----------------------------------------------------<br>";
        while($filao = $dataOtorgantes->fetch_assoc())
        {
            echo $filao['cod_inv_ju']."<br>";
        }
        
        echo "Favorecidos -----------------------------------------------------<br>";
        $dataFavorecidos = $recojo->ListadoFavorecido($numero);
        
        while($filaf = $dataFavorecidos->fetch_assoc())
        {
            echo $filaf['cod_inv']."<br>";
        }
        echo "Favorecidos Juridicos-----------------------------------------------------<br>";
        while($filaf = $dataFavorecidos->fetch_assoc())
        {
            echo $filaf['cod_inv_ju']."<br>";
        }
        
        
        
        
    }
    
    
    