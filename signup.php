<?php
    require_once 'dbconfig.php';
   
      
    /*Verifica l'esistenza di dati POST
    ovvero se tutti i campi sono riempiti per evitare che vengano lasciati vuoti alcuni campi*/
    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && //empty se esiste ma è vuota
        !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["confirm_password"]) 
        && !empty($_POST["allow"]))
    {
        //Vado a connettermi al database
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        //Creiamo un array contenente tutti gli errori
        $error = array();

        //Leggiamo lo username
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        //verifico che non ci siano altri utenti con lo stesso username all'interno del database
        $query = "SELECT username FROM istruttore WHERE username = '$username'";
        //effettuo la query 
        $res = mysqli_query($conn, $query);
        
         /*controllo il numero di righe che ci vengono ritornate,
             se >0 esiste già un utente con lo stesso username*/
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Username non disponibile";
        }

        //***********************ADESSO EFFETTUO IL CONTROLLO DELLA PASSWORD************************
        
      
        //Verifico che la lunghezza della password non sia minore di 8 caratteri
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Numero caratteri password insufficienti";
        } 

        //Conferma della password, per vedere se coincidono o meno
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Attenzione, le password non coincidono!!";
        }


        //**********************ADESSO EFFETTUO IL CONTROLLO DELL'EMAIL****************************** 
            //leggo l'email
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $query = "SELECT email FROM  istruttore WHERE email = '$email'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) { //esiste già un utente con la stessa email
                $error[] = "Email già utilizzata!";
            }
        

   /*****************************************caricamento immagine del profilo **************************************/
            # UPLOAD DELL'IMMAGINE DEL PROFILO  
        if (count($error) == 0) { 
            if (isset($_FILES['avatar'])) {
                $file = $_FILES['avatar'];
                $type = exif_imagetype($file['tmp_name']);
                $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
                if (isset($allowedExt[$type])) {
                    if ($file['error'] === 0) {
                        if ($file['size'] < 7000000) {
                            $fileNameNew = uniqid('', true).".".$allowedExt[$type];
                            $fileDestination = 'img2/'.$fileNameNew;
                            move_uploaded_file($file['tmp_name'], $fileDestination);
                        } else {
                            $error[] = "L'immagine non deve avere dimensioni maggiori di 7MB";
                        }
                    } else {
                        $error[] = "Errore nel carimento del file";
                    }
                } else {
                    $error[] = "I formati consentiti sono .png, .jpeg, .jpg e .gif";
                }
            }
        }

            echo json_encode($error);
        //controlliamo che il numero degli errori sia uguale a 0, ovvero che non ci siano errori
        if(count($error) == 0){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);
      
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO istruttore( username, password, nome, cognome, email, foto_profilo) 
            VALUES('$username', '$password', '$name', '$surname', '$email', '$fileDestination')";
        echo $query;
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["_tkd_username"] = $_POST["username"];
                $_SESSION["_tkd_user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);

                header("Location: mhw2.php"); //reindirizziamo l'utente alla pagina degli allievi
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
            mysqli_close($conn);
        }
        else if (isset($_POST["username"])) { //se esiste la variabile
           
            $error = array("Non hai riempito tutti i campi!");
        }
    
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
        <meta charset="utf-8">
        <script src="signup.js" defer></script>

        <title>Taekwon-Do ITF CATANIA - Iscriviti</title>
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

        <main class="login2">
        <section class="main_right">

            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
            
 
            <div class="riquadro" id="riqIscriz">

                    <div class="name" >
                        <div><label for='name'>Nome</label></div>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                        <div><input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> ></div>
                        <span class="avviso"></span> <!-- lo span visualizzerà il messaggio d'errore-->
                    </div>

                    <div class="surname">
                        <div><label for='surname'>Cognome</label></div>
                        <div><input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ></div>
                        <span class="avviso"></span>
                    </div>

          

                <div class="username1">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span class="avviso"></span>
                </div>

                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                    <span class="avviso"></span>
                </div>

                <div class="password1">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span class="avviso"></span>
                </div>

                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                    <span class="avviso"></span>
                </div>

                <div class="fileupload">
                    <div><label for='avatar'>Scegli un'immagine profilo</label></div>
                    <div>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div><div class="file_size"></div></div>
                    </div>
                    <span class="avviso"></span>
                </div>
              
                <div class="allow"> 
                    <div><input type='checkbox' name='allow' value="1" <?php if(isset($_POST["allow"])){echo $_POST["allow"] ? "checked" : "";} ?>></div>
                    <div class="didascalia"><label for='allow'>Acconsento al trattamento dei dati personali</label></div>
                </div>

                <div class="submit">
                    <input class="accedi" type='submit' value="Registrati" id="submit" disabled >

                </div>
        
                </form> 
                
                
                <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>".json_encode($error)."</span>";
                }
                
            ?>

                <div class="signup">Hai già un account? <a class="iscriviti" href="login.php">Accedi</a>

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