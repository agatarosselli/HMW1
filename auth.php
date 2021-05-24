<?php
    /*serve a controllare che l'utente sia già autenticato*/
    require_once 'dbconfig.php';
    session_start();

    function checkAuth() {
        GLOBAL $dbconfig;
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['_tkd_user_id'])) {
            return $_SESSION['_tkd_user_id'];
        } else 
            return 0;
    }
?>