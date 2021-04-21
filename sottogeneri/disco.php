<!doctype html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <link rel='stylesheet' href='style.css'></head>
  <body>
  
    <div id='i6io' class='row'>
  <div class='cell'>
    <div id='i0gd' class='row'>
      <div id='ifo4' class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div id='inf64' class='row'>
      <div id='ini7h' class='cell'>
        <div id='ix7hz'> <a href= '../index.html'>Indietro</a>
        </div>
      </div>
    </div>
    <div class='row'>
      <div id='il5gx' class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
  </div>
  <div id='irdf' class='cell'>
<?php

  $maria =  new mysqli('localhost', 'root', 'pass', 'LIBRERIA');
  if( $maria->connect_errno ){
    echo "
    <div id='iv9k4' class='row'>
      <div id='i1989' class='cell'>
        <div id='izzjf' class='row'>
          <div id='iyqr9' class='cell'>
          </div>
          <div id='ikwj2' class='cell'>
            <div id='ib0lj'>
              <a href='' class='link'></a>Errore inaspettato, impossibile stabilire una conessione con il database...
            </div>
          </div>
        </div>
      </div>
    </div>";
  }
  

   $query = "SELECT DISTINCT BRANI.Titolo AS TitoloBrani, ALBUM.Titolo AS Album, BRANI.CodBrano FROM ALBUM, BRANI, CONTENGONO, GENERI 
            WHERE ALBUM.CodAlbum = CONTENGONO.CodAlbum AND BRANI.CodBrano = CONTENGONO.CodBrano AND GENERI.Nome = 'Disco' AND GENERI.CodGenere = BRANI .CodGenere
            GROUP BY ALBUM.Titolo;";

  if( $result = $maria->query( $query ) ){
    while($rows = $result->fetch_assoc()){
      echo "
      <div id='iv9k4' class='row'>
      <div id='i1989' class='cell'>
        <div id='izzjf' class='row'>
          <div id='iyqr9' class='cell'>
          </div>
          <div id='ikwj2' class='cell'>
            <div id='ib0lj'>
              <a href='http://localhost/MusicShare/sottogeneri/ottieniBrani.php?codice=".$rows['CodBrano']."'". "class='link' style='font-size:20px'>"."Titolo: ".$rows['TitoloBrani']."  Album: ".$rows['Album']."</a>
            </div>
          </div>
        </div>
      </div>
    </div>";
    }
    
  }
  else
  {
    die(" errore generico....");
  }
  $maria->close();
  


?>
  </div>
  <div id='iab1' class='cell'>
    <div id='ijir' class='row'>
      <div id='i5ef' class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div id='ilnrn' class='row'>
      <div id='ip558' class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
      <div class='cell'>
      </div>
    </div>
    <div class='row'>
    </div>
    <div class='row'>
    </div>
  </div>
</div>
</body>
<html>
