<?php 
echo $_GET['access_token'];
// Verifica che l'utente sia già loggato, in caso positivo va direttamente alla home
include 'auth.php';

if (checkAuth()) {
    header('Location: mhw2.php');
    exit;
}


function calendario(){
    $client_id="428089864512-7em4c2pi7t44mkajoa51khm75f304brt.apps.googleusercontent.com"
   // $client_secret='';

  

    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id))); 
    $token=json_decode(curl_exec($ch), true);
    curl_close($ch);    

   $query = urlencode($_GET["q"]);
    $url = 'https://www.googleapis.com/auth/calendar.readonly';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    # prendo il token senza bisogno di fare lo split dalla barra di ricerca
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;

}
?>