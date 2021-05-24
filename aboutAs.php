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
    <div class="testoAboutas">
            <h1>  COME NASCE L'ASD TAEKWON-DO ITF CATANIA</h1>
            <p id="TestoaboutAs2">
                Dopo un lungo periodo di formazione con il Sabonim Carlos Mortillaro VI Dan, che 
                ha reintrodotto il Taekwon-Do ITF in Sicilia, nell'agosto del 2016, l'istruttore Davide Forte, 
                Gabriele Forte e l'allieva Laura Pennisi, si sono riuniti per fondare l'associazione sportiva 
                dilettantistica "TAEKWON-DO ITF CATANIA".
                Una società giovane ma che ha saputo distinguersi.
                Diverse sono state le esibizioni in puro stile marziale, facendo conoscere alle altre realtà che
                esiste ancora un Taekwon-Do originale, che non ha perso nè i principi nè la filosofia.
                Non sono mancati i successi nelle competizioni, con ottimi risultati ai campionati regionali.
                L'ASD TAEKWON-DO ITF CATANIA ha fatto partecipare i propri studenti a seminari in varie parti del mondo,
                Germania, Austria, Regno Unito e Stati Uniti, con i migliori maestri, vantando un'ottima formazione.
            </p>
        </div>

    </section>

<section id="contenutoAboutas">

        <div class="testoAboutas">
            <h1>  ECCO DOVE POTETE VENIRCI A TROVARE!</h1>
        </div>

                <div id="dovesiamo">
                        <div id="mappa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25299.676037719204!2d14.884575070570696!3d37.56779612345144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131150fb3979863b%3A0x50eda31502f2ed87!2s95047%20Patern%C3%B2%20CT!5e0!3m2!1sit!2sit!4v1621681352287!5m2!1sit!2sit" 
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div id="sezlaterale">                

                            <div class="iconeAbout">
                            <img src="img/location_map_pin_mark_icon_148685.png" alt=""> 
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25299.676037719204!2d14.884575070570696!3d37.56779612345144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x131150fb3979863b%3A0x50eda31502f2ed87!2s95047%20Patern%C3%B2%20CT!5e0!3m2!1sit!2sit!4v1621681352287!5m2!1sit!2sit">Via Emanuele Bellia, 24</br>Paternò (CT)</a>
                            </div> 
                          
                            <div class="iconeAbout">
                            <img src="img/whatsapp.png" alt="">
                            <a href="https://wa.me/393475191204"> +39 340 870 1359</a>
                            </div>


                            <div class="iconeAbout">
                            <img src="img/4202011emailgmaillogomailsocialsocialmedia-115677_115624.png" alt="">
                            <a href="mailto:davideforte@gmail.com"> davideforte@gmail.com</a>
                            </div>
                                

                        </div>


                    </div> 

 </section>

 <section>
     
             <div class="testoAboutas">
                <h1>VISITATE ANCHE LA NOSTRA PAGINA FACEBOOK E INSTAGRAM</h1>
                <div id="video">
                     <div id="video1">
                     <video  loop="true" controls autoplay>
                     <source src="img2/instagramGif.mp4" type="video/mp4">
                     </video>  
                     <a class= "segui" href="https://www.instagram.com/asd_taekwondo_itf_catania/"> Seguici su Instagram</a>  
                     </div>            
                   
                     <div id="video2">
                     <video  loop="true" controls autoplay height="529">
                     <source src="img2/videofacebook.mp4" type="video/mp4">
                     </video>
                     <a class= "segui" href="https://www.facebook.com/Taekwon-Do-ITF-Catania-277561505962884"> 
                     Seguici su Facebook</a> 
                    </div>
                </div>
            </div>
 </section>
                
                <footer>
                    <div id="social">
                        <img src="img/insta.png" alt="">
                        <img src="img/fb.png" alt="">
                        <img src="img/tw.png" alt="">
                    </div>  
                        <div id="nome"><em>Agata Rosselli</em></div>
                            <div id="matricola"> O46002240</div>                   
                </footer>
</body>
</html>