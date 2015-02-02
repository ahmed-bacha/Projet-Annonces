# Projet TSE Annonces #01

##### FI3 © 2014-2015 : 

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
* Les identifiants par defaut de la section **Admin**  
    * user : admin
    * mdp : admin

## Informations
---

*  Presque toutes les vues du site (utilisateur/admin) ont de l'Ajax par dessus, donc suivent une logique
    * un fichier pour la vue. 
    * un fichier js pour l'Ajax.
    * un fichier php pour le traitement.

*  Pour l'envoi des mails, on utilise l'API de MailGun (et non pas de fonction mail() de php) . 



