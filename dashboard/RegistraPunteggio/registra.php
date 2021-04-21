<?php 
    $db = new mysqli('localhost', 'root', 'pass', 'GARE_INTERNAZIONALI');
    
    if($db->connect_errno){
        die("ERRORE, database non disponibile");
    }
    
    $query = "INSERT INTO PARTECIPANO_A VALUES("."'$_POST[ID_A]',"."'$_POST[ID_G]',"."'$_POST[Punteggio_A]',"."'$_POST[Posizione_A]');";

    if( !$db->query($query) ){
        echo "Errore inaspettato<br>";
        echo $query;
    }
        
    else
        echo "OK";
    
        $db->close();
?>