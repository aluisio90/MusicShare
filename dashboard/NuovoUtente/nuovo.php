<?php 
    $user = new mysqli('localhost', 'root', 'pass', 'ACCOUNT');

    if($user->connect_errno){
        die("Impossibile conettersi al database");
    }
        $query = "INSERT INTO UTENTI (Username, Password)
        VALUES("."'$_POST[Username]',"."'$_POST[Password]');";

        if( $user->query($query) ){
            echo "Registrazione Effettuata con successo";
            echo "<form action= 'http://localhost/index.html' method= 'post'>
                    <input type= 'submit' value= 'Torna al Login'>
                  </form>";
        }
        else
            {
                echo "Errore Sconosciuto";
            }

        $user->close();
    
    
?>
