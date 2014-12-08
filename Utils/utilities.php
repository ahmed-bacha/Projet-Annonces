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
* @param  STRING file_path : chemin vers le fichier
* @param  STRING signature : signature MD5 du fichier
*/
function md5ForFile($file_path){

  if(file_exists($file_path){

    return md5_file($file_path);

  }else{

    return "invalideFilePath";
  }

}


 ?>
