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
<script src="contens.js"></script>
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
                
                 
                <div id="tasto">
                   <?php 
                        if(checkAuth()){
                        
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
                   <div id="testocentrale">
                        <p>
                            "Avere la volontà di progredire</br> 
                            qualsiasi siano le difficoltà incontrate".
                        </p>
                        <h4><em>Gen. Choi Hong Hi</em></h4>
           
                   </div>         
    </header>
            
                <section id="contenuto0">
                    <div id="main">     
                        <p>
                            </br>In Sicilia lo stile del Taekwon-Do ITF è stato reintrodotto nel 2008,</br>
                            (dopo più di 35 anni di assenza), 
                            dal Sabonim Carlos Mortillaro, attualmente VI Dan.<br/>
                            Nel 2015 il Taekwon-Do ITF arriva per la prima volta in provincia di Catania.</br>
                            Esso fornisce una nobile morale, armonia e straordinaria forza fisica!</br></br>
                                <img src="img/circle.png" class="centro" alt="logo itf Sicilia" />
                        </p>
                    </div>
                </section>
       
                <section id="contenuto">
                    <div id="details">                     
                        <div >
                            <div class="image">  <img src= "img/itf-taekwon-vector-logo.png"/></div>
                                <h1><strong>TAE KWON DO</strong></h1>
                                    <div id="tae"> 
                                         <p id="txt"> <strong>TAE:</strong> Azione di piedi;</br>
                                                      <strong>KWON:</strong> Azione di mani;</br>
                                                      <strong>DO:</strong> Via, Strada, Cammino o Arte.
                                         </p>
                                    </div>
                        </div>
                       
                        <div>
                            <div class="image"> <img src= "img/logo.png"/></div>
                                <h1><strong>IL LOGO</strong></h1>
                                    <div id="txt2"><p> Logo dell'<strong>International 
                                                       Taekwon-Do Federation</strong>,
                                                       fondata nel 1966.
                                                   </p>
                                    </div>
                        </div>
            
                        <div>
                            <div class="image">  <img  src= "img/generaletop.png"> </div>
                                <h1><strong>GENERALE CHOI HONG HI</strong></h1>
                                    <p> Creatore del Taekwon-Do ITF, 
                                        nato il 9 novembre del 1918 a Pyongyang.
                                        Fondò l'<strong>International Taekwon-Do Federation (ITF)</strong> 
                                        il 22 Marzo 1966.
                                    </p>
                        </div>

                        <div >
                            <div class="image">  <img src= "img/dobok.jpg"/></div>
                                <h1><strong>DOBOK</strong></h1>
                                    <p> <strong>"DO"</strong> significa <strong>via</strong> o <strong>forma 
                                        di vita</strong>, <strong>"BOK"</strong> 
                                        si riferisce all'abbigliamento per l'allenamento.
                                        E' la divisa ufficiale del Taekwon-Do I.T.F, costituita da una giacca
                                        <strong>(Sangi)</strong>, 
                                        da un pantalone <strong>(Ha-i)</strong> di colore bianco e 
                                        dalla cintura <strong>(Ti)</strong>. 
                                    </p>               
                        </div>       
                    </div>
                 </section>
                
                <section id=contenuto2>
                    <div id="details2">
                        <h2 id=titolo2> "Lo sviluppo dell'allievo di TK-D ITF è paragonato 
                                         alla crescita di un albero".</h2>
                            <div>
                                <img src="img/bianca1.png" >
                                    <h1>CINTURA BIANCA</h1>
                                        <p>
                                            Significa l'assenza di conoscenze, l'innocenza.
                                            Per questo è il colore utilizzato dall'allievo che inizia. 
                                        </p>
                            </div>
          
                            <div>
                                <img src="img/gialla.png" >
                                    <h1 id="giallo">CINTURA GIALLA</h1>
                                        <p>
                                            Rappresenta la terra, che è coltivata e preparata per piantare il seme,
                                            che darà i primi germogli della pianta che ancora non ha una radice solida.
                                        </p>
                            </div>

                            <div>
                                <img src="img/verde.png" >
                                    <h1 id="verde">CINTURA VERDE</h1>
                                        <p>
                                            Si riferisce alla crescita delle pianta.
                                            L'allievo comincia a sviluppare la sua tecnica.
                                        </p>
                            </div>

                            <div>
                                <img src="img/blu.png" >
                                    <h1 id="blu">CINTURA BLU</h1>
                                        <p>
                                            Simboleggia il cielo verso il quale la pianta cresce, 
                                            mentre si va trasformando in albero.
                                        </p>
                            </div>

                            <div>
                                <img src="img/rossa.png">
                                    <h1 id="rosso">CINTURA ROSSA</h1>
                                        <p>
                                            Rappresenta il sole.</br>
                                            Al contempo simboleggia <strong>"pericolo"</strong>:</br> 
                                            l'allievo deve autocontrollarsi
                                            nell'applicazione delle tecniche, che sono già pericolose.
                                        </p>
                            </div>

                            <div>
                                <img src="img/nera1.png" >
                                    <h1 id="nero">CINTURA NERA</h1>
                                        <p>
                                            L'opposto del bianco.
                                            Rappresenta simbolicamente la maturità e la capacità in TK-D.
                                            E' l'infinito, la potenzialità.
                                        </p>
                            </div>

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