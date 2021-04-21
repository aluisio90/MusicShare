<?php 

  $maria = new mysqli('localhost', 'root', 'pass', 'LIBRERIA');

  if( $maria->connect_errno ){
    die ("Database non raggiungibile via rete...");
  }
  else 
  {
    echo "<p style: font-color:'green' >Connesione stabilita...</p>";
  }

  $query = "SELECT BRANI.Durata AS DurataBrano, 
    GENERI.Nome AS NomeGenere,
		BRANI.Titolo 
		AS TitoloBrani,
		Copertina, DataPub,
		BRANI.CodBrano,
		ALBUM.Titolo AS TitoloAlbum,
		ALBUM.Durata AS DurataAlbum,
		AUTORI.Nome AS NomeAutore,
		MUSICISTI.Nome AS NomeMusicista,
		DataInizioCar, 
		DataFineCar,
		Biografia FROM ALBUM, CONTENGONO, BRANI, GENERI, SCRIVONO, AUTORI, MUSICISTI
            WHERE ALBUM.CodAlbum = CONTENGONO .CodAlbum  
            AND BRANI.CodBrano = CONTENGONO.CodBrano
            AND BRANI.CodGenere = GENERI.CodGenere
            AND SCRIVONO.CodAutore = AUTORI.CodAutore 
            AND SCRIVONO.CodBrano = BRANI.CodBrano 
            AND MUSICISTI.CodMusicista = BRANI.CodMusicista
            AND BRANI.Titolo='".$_REQUEST['TitoloBrano']."';";
            
  if(!$result = $maria->query( $query ) ){
    echo "Errore generico...";
  }

  $row = $result->fetch_assoc();
  echo "
<!doctype html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <link rel='stylesheet' href='stylefold.css'>
</head>

<body>
  <div class='row' id='ij1h'>
    <div class='cell' id='iix4'></div>
    <div class='cell' id='ip67'>
      <div class='row' id='izja'>
        <div class='cell' id='ivvw'></div>
      </div>
      <div class='row' id='if6g'>
        <div class='cell' id='ieb6'>
          <div data-tabs='1' id='ihr5'>
            <nav data-tab-container='1' class='tab-container' id='i3bxq'><a href='#tab1' data-tab='1' class='tab' id='i2bkm'> Info Brano</a><a href='#tab2' data-tab='1' class='tab' id='ievdw'>Biografia Musicista</a><a href='#tab3' data-tab='1' class='tab' id='iyxtn'>Info Album</a></nav>
            <div id='tab1' data-tab-content='1' class='tab-content'>
              <div id='i3vfr'>
                <div><br /></div>
                <div><br />
                  <div id='im1nk'>Titolo Brano: ".$row['TitoloBrani']." </div>
                </div>
                <div><br />
                  <div id='i9894'>Durata(min): ".$row['DurataBrano']."</div>
                </div>
                <div><br />
                  <div id='illz7'>Genere Musicale: ".$row['NomeGenere']."</div>
                </div>
                <div><br />
                  <div id='i7a1k'>Autore:  ".$row['NomeAutore']." </div>
                  <div id='iglwh'>Interprete: ".$row['NomeMusicista']."</div>
                </div>
              </div>
            </div>
            <div id='tab2' data-tab-content='1' class='tab-content'>
              <div id='inlvf'>
                <div><br /></div>
                <div><br /></div>
                <div><br />
                  <div id='i3zfj'>Nome Musicista: ".$row['NomeMusicista']."</div>
                  <div id='idzbf'>Biografia: ".$row['Biografia']."<div><br /></div>
                    <div><br /></div>
                    <div><br /></div>
                  </div>
                  <div id='i3oh7'>Anno inizio Attività:".$row['DataInizioCar']."</div>
                  <div id='iblpj'>Anno fine attività:".$row['DataFineCar']." </div>
                </div>
              </div>
            </div>
            <div id='tab3' data-tab-content='1' class='tab-content'>
              <div id='if75r'>
                <div><br /></div>
                <div><br />
                  <div id='in62m'>Titolo Album:".$row['TitoloAlbum']." </div>
                </div>
                <div><br /></div>
                <div><br /><img id='iznph' src='//placehold.it/350x250/78c5d6/fff/image1.jpg' /></div>
                <div><br /></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class='cell' id='ik2u'></div>
  </div>
  <script>
    var items = document.querySelectorAll('#ihr5');
    for (var i = 0, len = items.length; i < len; i++) {
      (function() {
        var t, e = this,
          a = '[data-tab]',
          n = document.body,
          r = n.matchesSelector || n.webkitMatchesSelector || n.mozMatchesSelector || n.msMatchesSelector,
          o = function() {
            var a = e.querySelectorAll('[data-tab-content]') || [];
            for (t = 0; t < a.length; t++) a[t].style.display = 'none'
          },
          i = function(n) {
            var r = e.querySelectorAll(a) || [];
            for (t = 0; t < r.length; t++) {
              var i = r[t],
                s = i.className.replace('tab-active', '').trim();
              i.className = s
            }
            o(), n.className += ' tab-active';
            var l = n.getAttribute('href'),
              c = e.querySelector(l);
            c && (c.style.display = '')
          },
          s = e.querySelector('.tab-active' + a);
        s = s || e.querySelector(a), s && i(s), e.addEventListener('click', function(t) {
          var e = t.target;
          r.call(e, a) && i(e)
        })
      }.bind(items[i]))();
    }
  </script>
</body>
<html>
";

?>
