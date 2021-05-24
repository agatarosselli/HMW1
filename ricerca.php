<?php

    require_once 'dbconfig.php';

    header('Content-Type: application/json');


    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $cognome = mysqli_real_escape_string($conn, $_GET['cognome']);

    mysqli_set_charset($conn, 'utf8mb4');

    $query= "SELECT nome, cognome FROM istruttore WHERE nome='$nome' and cognome='$cognome' ";
    $res= mysqli_query($conn, $query);

   
    $json_array=array();
    
    while($entry=mysqli_fetch_assoc($res))
    {
        $json_array[]=$entry;
   
    }

    echo json_encode($json_array);
    mysqli_close($conn);
?>