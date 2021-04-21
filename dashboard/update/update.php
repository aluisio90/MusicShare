<?php 
    function genera(){
    $nome = $_POST[Nome_A];
    $naz = $_POST[Nazionalità];
    $data = $_POST[Data_N];

    $code = $nome[2].$naz[0].$naz[1].$data[3].$data[4];
    return $code;
  }
    $db = new mysqli('localhost','root', 'pass', 'GARE_INTERNAZIONALI');

    if($db->connect_errno){
        die("Impossibile stabilire una connesione con il database");
    }

    $query = " UPDATE ATLETI
               SET Nome_A =".$_POST[Nome_A].",Cognome_A =".$_POST[Cognome_A].",Data_N =".$_POST[Data_N].
               ",Nazionalità_A =".$_POST[Nazionalità_A].",Istituto =".$_POST[Istituto].",ID_A =".genera().
               "WHERE ('".$_POST[Nome_A]."' = Nome_A AND '".$_POST['Cognome_A']."' = Cognome_A) OR
            '".$_POST['ID_A']."' = ID_A;";

    echo $query;
    if( $db->query( $query ) ){
        echo "L'atleta è stato eliminato<br> -> ogni atleta sarà qualificato automaticamente da ogni gara a cui a partecipato";
    }
    else
    {
        echo "Errore Generico dato dal Database.";
    }
    $db->close();