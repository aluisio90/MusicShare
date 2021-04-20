<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css"></head>
  <body>
    <div class="row" id="i6io">
      <div class="cell"><div class="row" id="i0gd">
        <div class="cell" id="ifo4"></div>
      </div>
      <div class="row"><div class="cell">
      </div>
    </div>
    <div class="row"><div class="cell">
    </div>
  </div>
  <div class="row">
    <div class="cell">
    </div>
  </div>
  <div class="row" id="inf64">
    <div class="cell" id="ini7h"><div id="ix7hz"><a href= 'http://localhost/MusicShare/index.html' >Indietro</a></div>
  </div>
</div>
<div class="row"><div class="cell" id="il5gx">
</div>
</div>
<div class="row"><div class="cell">
</div>
</div>
<div class="row"><div class="cell">
</div></div><div class="row"><div class="cell">
</div></div><div class="row">
  <div class="cell">
</div>
</div>
</div>
<?php
  $mydb = new mysqli('localhost', 'root', 'pass', 'LIBRERIA');
  if ($mydb->connect_errno){
    

            echo "

            <div class='cell' id='irdf'>
              <div class='row' id='iv9k4'>
              <div class='cell' id='i1989'>
                <div class='row' id='izzjf'>
                <div class='cell' id='iyqr9'>
                </div>
                <div class='cell' id='ikwj2'>
                <div id='ib0lj'><a href='' class='link'></a>Errore, impossibile conettersi al database</div>
                </div>
              </div>
            </div>
            </div>
            </div> ";   
  }
  echo "OK";

  $query = "SELECT DISTINCT Titolo, Durata, Nome AS Genere FROM BRANI INNER JOIN GENERI On GENERI.CodGenere = BRANI.CodGenere WHERE Nome = 'Classico';";

  if (!$result = $mydb->query( $query ) ){
    die ("Errore impossibile eseguire la query");
  }
  else {
    $rows = $result->fetch_array();

    while( $rows ){
      echo "

              <div class='cell' id='irdf'>
                <div class='row' id='iv9k4'>
                <div class='cell' id='i1989'>
                  <div class='row' id='izzjf'>
                  <div class='cell' id='iyqr9'>
                  </div>
                  <div class='cell' id='ikwj2'>
                    <div id='ib0lj'><a href='' class='link'></a>$rows[Titolo]</div>
                  </div>
                </div>
              </div>
              </div>
              </div> ";
    }
  }


?>


<div class="cell" id="iab1">
  <div class="row" id="ijir">
    <div class="cell" id="i5ef">
    </div></div><div class="row">
      <div class="cell">
      </div></div><div class="row">
        <div class="cell"></div>
      </div>
      <div class="row" id="ilnrn">
        <div class="cell" id="ip558"></div>
      </div>
      <div class="row"><div class="cell">
      </div></div><div class="row">
        <div class="cell">
        </div>
      </div>
      <div class="row"><div class="cell">
      </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
    </div>
  </div>
</div>
</body>
<html>
