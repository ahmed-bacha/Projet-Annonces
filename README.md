# Projet Architecture N-Tiers :  

###TSE Annonces -  Team #01

##### FI3 © 2014-2015 : 

![](screenshot/annonces-login.jpg)


Membres : 

* MARIN Olivier
* BOUHERROU Nacer
* AMENTAGUE Siham
* AHMED BACHA Abdelkrim

## Presentation
---
Dans ce projet, le but est de développer un site (style LeBonCoin) pour les étudiants de TSE afin qu'ils puissent avoir les annonces des logements disponibles (misent à disposition par l'école **nouvelle cité** ou par d'autres autres étudiants).

Repository GitHub (Branche #dev) :
https://github.com/ahmed-bacha/Projet-Annonces/tree/dev

## Structure du projet 
---

```
├── configure
├── configure.in
├── Demo
│   ├── cgi
│   │   ├── cgi0.sh
```


* BDD (fichier SQL de la BDD)
* Admin (section admin du site)
    * /JS : javascript admin
    * /CSS : css  admin
    * /fonts & /font-awesome : fonts boostraps et custom
    *  *.php : page vues/traitement en PHP 
* Utils
* UnitTest
* Vues 
    * /JS : javascript des vues
    * /CSS : css des vues
    * /resources-img : images du thème du site
    * /images : dossier des images des annonces
    * /fonts & /font-awesome : fonts boostraps et custom
    *  *.php : page vues/traitement en PHP 
* Modeles
* Controlleurs

   
## Accès
---
* Le portail est accessible seulement aux utilisateurs inscrits.

![](screenshot/annonces-admin-login.jpg)


* Les identifiants par defaut de la section **Admin**  (/Admin)
    * user : admin
    * mdp : admin

![](screenshot/annonces-admin-board.jpg)

## Informations
---

*  Presque toutes les vues du site (utilisateur/admin) ont de l'Ajax par dessus, donc suivent une logique
    * un fichier pour la vue. 
    * un fichier js pour l'Ajax.
    * un fichier php pour le traitement.

*  Pour l'envoi des mails, on utilise l'API de MailGun (et non pas de fonction mail() de php) . 

## Deploy ! 
---

***Prerequis***

Avoir un serveur Web (ex: Apache) avec php et MySQL+PhpMyAdmin installés.

***Etape 01 : Base de données***

Créer une base de données nommée : ***annonce***

Charger la base de données fournie, qui se trouve sous ***/BDD/annonces.sql*** , dans PhpMyAdmin avec un import.

***Etape 02 : variables utiles***

Mettre à jour les variables globales (user/password MySQL ...) dans le fichier ***/Utils/includeAll.php***

``` php
        define('DB_URL',        "localhost");
        define('DB_USER',       "root");
        define('DB_PASS',       "root");
        define('DB_NAME',       "annonce");
```

Remarque : 

en modifiant la variable ***SERVEUR*** dans /Utils/context.php, on peut configurer deux profils (LOCAL,SERVER)

***Etape 03 : MailGun API***

Activer le support pour l'envoie des emails via l'API MailGun, en cas de volonté de changement (envoie via Mail de PHP), modifier la fonction ***sendEmail()*** dans /Utils/utilities.php)


```shell
curl -sS https://getcomposer.org/installer | php
```

puis : 


```shell
php composer.phar require mailgun/mailgun-php:~1.7.2
```

***Etape 04 : Urls ***


* URL publique : http://< ***your localhost*** > / < ***Project Dir. Name*** > /

exemple

```shell
http://localhost/Projet-Annonces/
```

* URL admin : http://< ***your localhost*** > / < ***Project Dir. Name*** > / Admin

exemple

```shell
http://localhost/Projet-Annonces/Admin
```






