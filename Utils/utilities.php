<?php


/**
* Affichage propore des tableaux PHP
* @param  ARRAY : tableau a afficher
*/
function show($_array){

    echo '<pre>';
    print_r($_array);
    echo '</pre>';

}

/**
* Calcul la signature MD5 d'un fichier
* @param  STRING file_path : chemin vers le fichier ABSOLUT
* @param  STRING signature : signature MD5 du fichier
*/
function md5ForFile($file_path){

  if(file_exists($file_path)){

    return md5_file($file_path);

  }else{

    return INVALIDE;
  }

}


/**
* Envoi un mail
* @param  array(
*     'to'        => '',
*     'sujet'     => 'Hello',
*     'reply-to'  => 'address@domain.com',
*     'message'   => 'Testing some Mailgun awesomness!');
*
*/

function sendEmail($_array){


  require_once("includeAll.php");
  
  $mgClient = new Mailgun\Mailgun('key-0b2cb3464af253c6c7317430cbe59abf');

  $domain = "https://api.mailgun.net/v2/sandbox360b4037a0f140c6be0f136ce5c80ea7.mailgun.org";

  $result = $mgClient->sendMessage($domain, array(
    'from'        => 'Projet-Annonces MailGun <postmaster@sandbox360b4037a0f140c6be0f136ce5c80ea7.mailgun.org>',
    'to'          => $_array['to'],
    'h:Reply-To'  => $_array['reply-to'],
    'subject'     => $_array['sujet'],
    'html'        => $_array['message']
  ));

  if($result->http_response_code == 200){
    return true;
  }

  return false;
}



 ?>
