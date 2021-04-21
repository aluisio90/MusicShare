

<html>
	<head>
		<title>Iscrizione</title>
		<meta name= 'lang' value= 'it'>
		<meta name= 'charset' value= 'utf-8'>

		<style>
			body{
				background-image: url('../source/logo.jpg');

			}

			form{
				background-color: white;
				border-radius: 30px;
				font-size: 0.5cm;
			}
			input{ font-size: 0.5cm;}

			h1{
				color: red;
				background-color: white;
			}
		</style>
	</head>
	<body>
		<h1>Registra un nuovo pezzo</h1>
		<form action= 'aggiungi.php' method= 'POST' name= "modulo"><br>
			Titolo Album: <input type= 'text' name= 'TitoloAlbum' id= 'tit_a'><br>
			Durata in secondi: <input type= 'time' name= 'DurataAlbum' id= 'dur_a'><br>
			Copertina del disco: <input type= 'image' name= 'Copertina' id= 'cop'><br>
			Data di pubblicazione: <input type= 'time' name= 'DataPub' id= 'dat_p'><br>


			CodiceID: <input name= 'CodiceID' id= 'id' value= <?php   echo random_int(500, 999) ?> ><br>

			_________________________________________________________________________________________<br>
			Titolo del brano: <input type= 'text' name= 'TitoloBrano'><br>
			Durata del pezzo: <input type= 'text' name= 'DurataPezzo'><br>
			Autore:  <input type= 'text' name= 'Autore' ><br>
			Genere: <select type= 'text' name= 'Genere' >
				<option value= 'Classica'>classico</option>
				<option value= 'Pop'>pop</option>
				<option value= 'Country'>country</option>
				<option value= 'Disco'>disco</option>
				<option value= 'Antica'>antica</option>
				<option value= 'Soul'>soul</option>
				<br>
			CodiceID: <input name= 'CodiceID' id= 'id' value= <?php   echo random_int(500, 999) ?>><br>
				<button type="submit" name="invio">REGISTRA</button><button type="reset" name="clear">CANCELLA</button>



		</form>



	</body>
</html>
