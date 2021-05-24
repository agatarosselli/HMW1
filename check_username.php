<?php 
    /*Controllo che l'username sia unico*/
   
    require_once 'dbconfig.php';


    /*settiamo la risposta che vogliamo ottenere */
    header('Content-Type: application/json');
    
    /*definiamo la connessione con il database */
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    /*andiamo a leggere il campo q dall'array get, passato dal client
    in modo da andare a leggere lo username che vogliamo controllare*/
    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    /*definiamo la query */
    $query = "SELECT username FROM istruttore WHERE username = '$username'";
    /*serve ad eseguire la query che abbiamo definito */
    $res = mysqli_query($conn, $query);

    /*se questa condizione ritorna un valore vero allora ritorna il primo valore,
    altrimenti ritorna il secondo valore */
    $json_array = (array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    $json= json_encode($json_array);
    echo $json;
    mysqli_close($conn);
?>