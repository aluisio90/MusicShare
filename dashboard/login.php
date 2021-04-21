<?php
    $db= new mysqli('localhost', 'root', 'pass', 'ACCOUNT');

    if( $db->connect_errno ){
        die("Impossibile verificare i dati immessi, Database inacessibile");
    }

    $query = "  SELECT * 
                FROM UTENTI
                 WHERE UTENTI.Username = '$_POST[username]' AND UTENTI.Password = '$_POST[password]';";

    if ( !$utente = $db->query( $query )  ) {
        echo "Impossibile verificare i dat immessi, errore generico";
        echo $query;
    }
    else
    {
        $row = $utente->fetch_array();
        if( $row[Username] == '' || $row[Password] == '' ){
            echo "Utente non registrato, impossibile accedere al servizio, registrarsi o cambiare credenziali";
            echo "<form action= 'index.html'>
                    <input type= 'submit' value= 'Riprova'>
                  </form>"; 
        }
        else
        {
            
                echo "<h1>Le credenziali immesse sono valide: accesso come <b>AMMINISTRATORE</b></h1>
                    <form action = 'ControlPanel.html'>
                        <input type= submit value= 'Procedi'>
                    </form>
                    <form action = 'index.html'>
                        <input type= submit value= 'Indietro'>
                    </form>
                    ";

        }
    }

    $db->close();
