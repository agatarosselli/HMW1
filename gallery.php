<?php 
    require_once 'dbconfig.php';

    /*settiamo la risposta che vogliamo ottenere */
    header('Content-Type: application/json');
    
    /*definiamo la connessione con il database */
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

 

    /*definiamo la query */
    $query = "SELECT foto FROM gallery";

    /*serve ad eseguire la query che abbiamo definito */
    $res = mysqli_query($conn, $query);

    /*se questa condizione ritorna un valore vero allora ritorna il primo valore,
    altrimenti ritorna il secondo valore */
    $json_array=array();
  while($entry=mysqli_fetch_assoc($res))
  {
    //$foto = mysqli_real_escape_string($conn, $entry['foto']);
    $json_array[] =  array('foto' => $entry['foto']);
   
  
  }
  
    echo json_encode($json_array);
    mysqli_close($conn);
?>


