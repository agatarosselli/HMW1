<?php

require_once 'dbconfig.php';

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

//faccio l'escape string
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
$data_nascita = mysqli_real_escape_string($conn, $_POST['data_nascita']);

//scrivo la query da eseguire, gli allievi mi vengono inseriti all'interno della già esistente tabella
$query = "INSERT INTO allievo( nome, cognome, data_nascita)  
VALUES('$nome', '$cognome', '$data_nascita')";

$res=mysqli_query($conn, $query);

echo $query;

?>