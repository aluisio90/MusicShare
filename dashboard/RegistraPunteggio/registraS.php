<?php 
    $db = new mysqli('localhost', 'root', 'pass', 'GARE_INTERNAZIONALI');

    if( $db->connect_errno ){
        die("Impossibile stabilire una connesione");
    }
    $idsq = $_POST[ID_Sqx];
    $idg = $_POST[ID_Gx];
    $psq = $_POST[Punteggio_Sqx];
    $possq = $_POST[Posizione_Sqx];
    $query = "INSERT INTO PARTECIPANO_S
              VALUES( '$idsq', '$idg', '$psq', '$possq' );";
    
    if( !$db->query( $query ) ){
        echo "<h2>Impossibile completare la registrazione</h2>";
        echo $query;
    }

    $db->close();