<?php
//implemento la funzione di logout
    include 'dbconfig.php';

    // Distruggo la sessione già attiva
    session_start();
    session_destroy();

    header('Location: login.php');
?>