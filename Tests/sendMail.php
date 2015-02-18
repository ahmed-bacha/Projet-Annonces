<?php

/*
	Sending email via MailGUN API
*/

require_once("../Utils/includeAll.php");

/*
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-0b2cb3464af253c6c7317430cbe59abf');

$domain = "https://api.mailgun.net/v2/sandbox360b4037a0f140c6be0f136ce5c80ea7.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
  'from'        => 'Projet-Annonces MailGun <postmaster@sandbox360b4037a0f140c6be0f136ce5c80ea7.mailgun.org>',
  'to'          => 'kimkero13@gmail.com',
  'h:Reply-To'  => 'ahmedbacha69@gmail.com',
  'subject'     => 'Hello',
  'html'        => 'hello de TSE, hello <b>Team4J</b>'));


var_dump($result);

echo $result->http_response_code;
*/


/* TEST de la fonction sendEmail*/

$_array = array(
    'to'          => 'kimkero13@gmail.com',
    'reply-to'    => 'ahmedbacha69@gmail.com',
    'sujet'       => 'Hello',
    'message'     => 'Hi from TSE, hello <b>Team4J</b>'
);

//echo sendEmail($_array);


$name = "hello.txt";
var_dump(generateImageLink($name));


 ?>
