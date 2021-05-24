<?php
require_once 'auth.php';
?>
<html>
    <head>
    <meta charset="utf-8"> <!-- settare la codifica-->
      <title>   TAEKWON-DO ITF CATANIA  </title>   
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:wght@400;700&family=Oswald:wght@600&family=Truculenta:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Carter+One&family=Kanit:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500&family=Ropa+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mhw1.css" />
    <script src="pageistruttori.js" defer="true"></script>
    </head>
    
    <body> 
        <header class="secondapag"> 
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
                    
                     
               <div id="tasto" >
                <?php if(checkAuth()){
                     
                     echo "<a href='logout.php' class='bottone'>LOGOUT </a>";
                    
                     }else{
                             echo "<a href='login.php' class='bottone'>LOG IN | SIGN UP </a>";
                     }
                     ?>
             </div>            
                    
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
    
               
            </nav>
        
                
        </header>   
        
        <section>

             <div class="titIstruttori">
                     <h1 class="istruttoriTitolo">I NOSTRI ISTRUTTORI</h1>
                     <form name="form_istr" method="get">
                     <input id="filtro" name="cerca" type="text" placeholder="Cerca istruttore...">
                     <input id="sumbit2" type="submit" value="invia" name="tasto_invia">
                     </form>
            </div>
             
        </section>
                        
        <section id="Istr">
                     <div class="scheda">

                     </div>
         </section>
                    
                    
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