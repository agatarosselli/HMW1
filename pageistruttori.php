<?php 
    require_once 'dbconfig.php';

    /*settiamo la risposta che vogliamo ottenere */
    header('Content-Type: application/json');
    
    /*definiamo la connessione con il database */
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


    /*definiamo la query */
    $query = "SELECT i.id, i.nome, i.cognome, i.foto_profilo FROM istruttore i 
    join acq_autodifesa aa on i.id=aa.istruttore 
    join acq_combattimento ac on  i.id=ac.istruttore GROUP BY i.id";
    /*serve ad eseguire la query che abbiamo definito */
    $res = mysqli_query($conn, $query);

    /*se questa condizione ritorna un valore vero allora ritorna il primo valore,
    altrimenti ritorna il secondo valore */
    $json_array=array();
    $json_array2=array();
    $json_array3=array();
    $json_array4=array();

  while($entry=mysqli_fetch_assoc($res))
  {
    
    $query2= "SELECT DISTINCT qa.nome as nome_qual_aut FROM acq_autodifesa aa /*qualifiche autodifesa */
    join q_autodifesa qa on aa.autodifesa=qa.id 
    WHERE aa.istruttore=".$entry['id'];
    $res2 = mysqli_query($conn, $query2);

    while($entry2=mysqli_fetch_assoc($res2)){

      $json_array2[]=$entry2;
    }

    $query3="SELECT DISTINCT qc.nome as nome_qual_comb FROM acq_combattimento ac /*qualifiche combattimento */
    join q_combattimento qc on ac.combattimento=qc.id 
    WHERE ac.istruttore=".$entry['id'];
    $res3 = mysqli_query($conn, $query3);

    while($entry3=mysqli_fetch_assoc($res3)){

      $json_array3[]=$entry3;
    }

    $query4= "SELECT DISTINCT c.nome as nome_corso FROM iscrizione i join corso c on i.corso=c.codice /*nomi dei corsi */
    WHERE i.istruttore=".$entry['id'];
    $res4 = mysqli_query($conn, $query4);

    while($entry4=mysqli_fetch_assoc($res4)){

      $json_array4[]=$entry4;
    }
    
    $entry['autodifesa']=$json_array2;
    $entry['combattimento']=$json_array3;
    $entry['corsi']=$json_array4;
    $json_array[] = $entry;
  }
  
    echo json_encode($json_array);
    mysqli_close($conn);
?>

