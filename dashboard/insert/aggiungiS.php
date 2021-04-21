<?php
  $db = new mysqli('localhost','root', 'pass', 'GARE_INTERNAZIONALI' );

  if($db->connect_errno){
    die("<h1>Connesione fallita</h1>");
  }
 
    $query = "INSERT INTO SQUADRE VALUES("."'$_POST[ID_Sq]',"."'$_POST[Nazionalità_Sq]',"."'$_POST[Nome_Sq]');"; 
  if( $db->query( $query ) )
    echo "Registrazione Eseguita";
  else {
    echo "Errore inaspettato, impossibile registrare nuovo Squadra<br>";
    echo $query;
  }
    
  $db->close();

?>
