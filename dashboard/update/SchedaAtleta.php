<?php

  
  $db = new mysqli('localhost', 'root', 'pass', 'GARE_INTERNAZIONALI');

  if( $db->connect_errno){
    die('Impossibile stabilire una connesione con il database');
  }

  $query = "SELECT *
            FROM ATLETI
            WHERE ('".$_POST[Nome_A]."' = Nome_A AND '".$_POST['Cognome_A']."' = Cognome_A) OR
            '".$_POST['ID_A']."' = ID_A;";
            echo $query;
  if( !$result = $db->query( $query ) ){
    echo "Atleta non trovato";
  }
  else
  {
    $atleta = $result->fetch_array();
    echo " <form action= update.php method= 'POST'>".
              "Nome Atleta:<input type= 'text' name= 'Nome_A' value= ".$atleta['Nome_A']."><br>".
              "Cognome Atleta:<input type= 'text' name= 'Cognome_A' value= ".$atleta['Cognome_A']."><br>".
              "Data di Nascita:<input type= 'date' name= 'Data_N' value= ".$atleta['Data_N']."><br>".
              "Nazionalità dell'atleta:<input type= 'text' name= 'Nazionalità_A' value= ".$atleta['Nazionalità_A']."><br>".
              "Istituto di Provvenienza:<input type= 'text' name= 'Istituto' value= ".$atleta['Istituto']."><br>".
              "ID <i>(rigenerato automaticamente)</i>:<input type= 'text' name= 'ID_A' value= ".$atleta['ID_A']."><br>".
              "<input type= 'submit' value= 'Aggiorna'>"."</form>";

  }
