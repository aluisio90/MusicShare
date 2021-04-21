<?php 
    $db = new mysqli('localhost','root', 'pass', 'GARE_INTERNAZIONALI');

    if($db->connect_errno){
        die("Impossibile stabilire una connesione con il database");
    }

    $query = "DELETE 
            FROM ATLETI
            WHERE ('".$_POST[Nome_A]."' = Nome_A AND '".$_POST['Cognome_A']."' = Cognome_A) OR
            '".$_POST['ID_A']."' = ID_A;";

    
    if( $db->query( $query ) ){
        echo "L'atleta è stato eliminato<br> -> ogni atleta sarà qualificato automaticamente da ogni gara a cui a partecipato";
    }
    else
    {
        echo "Errore Generico dato dal Database.";
    }