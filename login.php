<?php
     require_once 'dbconfig.php';

    // Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
    include 'auth.php';
    
    if (checkAuth()) {
        header('Location: mhw2.php');
        exit;
    }

    //se non sono campi vuoti, ovvero i campi sono stati riempiti
    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        //Se username e password sono stati inviati allora mi collego al database
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
       

        // Permette l'accesso tramite email o username in modo intercambiabile
        $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username";
       
        $query = "SELECT id, username, password FROM istruttore WHERE $searchField = '$username'";
    
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
       
        if (mysqli_num_rows($res) > 0) { //se maggiore di 0 l'utente esiste
            $entry = mysqli_fetch_assoc($res);

            //verifichiamo la password che ci viene inviata
            if (password_verify($_POST['password'], $entry['password'])) {
    
                // Imposto una sessione dell'utente
                $_SESSION["_tkd_username"] = $entry['username'];
                $_SESSION["_tkd_user_id"] = $entry['id'];
                header("Location: mhw2.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }

?>


<html>
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Carter+One&family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Ropa+Sans&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='mhw1.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">

        <title>Taekwon-Do ITF CATANIA - Accedi</title>
    </head>
    <body>
    <header> 
    <nav>      
                <div id="logo">
                     <img src="img/animation (2).gif"> 
                </div>  
             
                <div id="comandi">                                  
                        <a href="mhw1.php">HOME</a>
                        <a href="aboutAs.php">ABOUT US</a> 
                        <a href="page2.php">IL TAEKWON-DO ITF</a>
                        <!--<a href="paginaLogGoogle.php">EVENTI</a>-->
                        <a href="gallery1.php">GALLERY</a>
                        <a href="pageistruttori2.php">ISTRUTTORI</a>
                </div>
           
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
           
        </nav>
        <main class="login">

        <section class="main_right">
            <h1>Ciao!</h1>
            <form name='login' method='post'>
                <!-- Seleziono il valore di ogni campo sulla base dei valori inviati al server via POST,
                mantengo inoltre i valori inseriti in caso di ricarica della pagina -->
               
                <div class="riquadro" id="riqLogin">
                
                <h3>Sei un istruttore del nostro team?</br> Accedi o registrati</h3>
                <div class="username">
                    <div><label for='username'>Nome utente o email</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];}  /*questo significa che se sono state
                    inviate delle informazioni alla variabile post username, allora stampo il suo valore riempiendo il campo del form
                    con il valore inserito precedentemente*/ ?>></div> 
                </div>  
             

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>

                <div class="remember">
                    <div><input type='checkbox' name='remember' value="1" <?php if(isset($_POST["remember"])){echo $_POST["remember"] ? "checked" : "";} ?>></div>
                    <div><label for='remember'>Ricordami</label></div>
                </div>

                <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
            ?>

                <div >
                    <input  class="accedi" type='submit' value="Accedi">
                </div>
            </form>

            <div class="signup">Non hai un account? <a class="iscriviti" href="signup.php">Iscriviti</a>
            </div>

        </section>
        </main>
    
        </header>
        <footer>
                    <div id="social">
                        <img src="img/insta.png" alt="">
                        <img src="img/fb.png" alt="">
                        <img src="img/tw.png" alt="">
                    </div>  
                        <div id="nome"><em> Agata Rosselli</em></div>
                            <div id="matricola"> O46002240</div>                   
        </footer>
       </body>
</html>