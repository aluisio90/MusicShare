<?php
  $db = new mysqli('localhost','root', 'pass', 'LIBRERIA' );

  if($db->connect_errno){
    die("<h1>Connesione fallita</h1>");
  }
  
   $albumID = "  SELECT DISTINCT CodAlbum 
			FROM ALBUM
			WHERE".$_POST['TitoloAlbum']; 
  if( !$db->query($albumID)  ){
  	$insertAlbum = "INSERT INTO ALBUM
  			VALUES('".$_POST['DurataAlbum']."','".$_POST['Titolo']."','".$_POST['Copertina']."','".$_POST['DataPub']."','".$_POST['CodiceID']."');";	
  }
  else
  {
    $trovaM = $db->query("SELECT DISTINCT CodMusicista FROM MUSICISTA
                          WHERE Nome = '".$_POST['Interprete']."')");

    $trovaG = $db->query("SELECT DISTINCT CodGenere FROM GENERI
                              WHERE Nome = '".$_POST['Genere']."')");

    $musicista = $trovaM->fetch_array();
    $genere =    $trovaG->fetch_array();
    
    if( $musicista['CodMusicista'] != ' ' && $genere['CodGenere'] != ' ')
    $insertAlbum = "INSERT INTO BRANI
                    VALUES('".$_POST['TitoloBrano']."','".$_POST['DurataPezzo']."','".$_POST['CodiceIDbr']."','".$musicista['CodMusicista']."','".$genere['CodGenere'].");";
    else
    {
      echo "Impossibile inserire il brano, autore o Genere musicale non registrabile";
    } 
  }
	 
  
  if( $db->query( $query ) )
    echo "Registrazione Eseguita";
  else {
    echo "Errore inaspettato, impossibile registrare nuovo utente<br>";
    echo $query;
  }
    
  $db->close();

?>
