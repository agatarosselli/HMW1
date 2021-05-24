<?php 
    require_once 'dbconfig.php';

    /*settiamo la risposta che vogliamo ottenere */
    header('Content-Type: application/json');
    
    /*definiamo la connessione con il database */
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


    /*definiamo la query */
    $query = "SELECT a.nome as nome, a.cognome as cognome, a.data_nascita as data_nascita, c.nome as nome_corso FROM allievo a join iscrizione i
    on a.id=i.allievo join corso c on c.codice=i.corso";
    /*serve ad eseguire la query che abbiamo definito */
    $res = mysqli_query($conn, $query);

    /*se questa condizione ritorna un valore vero allora ritorna il primo valore,
    altrimenti ritorna il secondo valore */
    $json_array=array();
    while($entry=mysqli_fetch_assoc($res))
    {
      $json_array[] = array('nome' => $entry['nome'], 
                          'cognome' => $entry['cognome'],
                          'data_nascita' => $entry['data_nascita']);
    }
  
    echo json_encode($json_array);
    mysqli_close($conn);
?>

