<?php

require_once 'dbconfig.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

//faccio l'escape string
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);


//scrivo la query da eseguire, gli allievi mi vengono inseriti all'interno della già esistente tabella
$query = "DELETE FROM  allievo WHERE nome='$nome' and cognome='$cognome' ";
$res=mysqli_query($conn, $query);

echo $query;
mysqli_close($conn);
?>