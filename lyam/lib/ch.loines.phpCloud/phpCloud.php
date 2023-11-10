<?php
//Credits :
// 1: DirSize
/*---------------------------------------------------------------*/
/*
    Titre : Calcul la taille d'un dossier en Octet                                                                        
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=688
    Auteur           : miistracy                                                                                          
    Date édition     : 22 Aout 2013                                                                                       
    Date mise à jour : 21 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
function DirSize($Rep)
    {
        $Racine=opendir($Rep);
        $Taille=0;
        while($Dossier = readdir($Racine))
        {
          if ( $Dossier != '..' And $Dossier !='.' )
          {
            //Ajoute la taille du sous dossier
            if(is_dir($Rep.'/'.$Dossier)) $Taille += DirSize($Rep.'/'.
$Dossier);
            //Ajoute la taille du fichier
            else $Taille += filesize($Rep.'/'.$Dossier);

          }
        }
        closedir($Racine);
        return $Taille;
}
function IsAppPlaced(string $name, string $path) {

    $JSON = json_decode(file_get_contents($path."user_infos.json"), true);
    if (!empty($JSON["apps"])) {
      if (!empty($JSON["apps"][$name])) {
        if ($JSON["apps"][$name] === true) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    } else {
      return false;
    }
}
function PlaceApp(string $name, string $path) {

    $JSON = json_decode(file_get_contents($path."user_infos.json"), true);
    if (!empty($JSON)) {
      if (!empty($JSON["apps"][$name])) {
        if ($JSON["apps"][$name] === true) {
          return 0;
        } else {
          $JSON["apps"][$name] = true;
        }
      } else {
        $JSON["apps"][$name] = true;
      }
    } else {
      file_put_contents($path."panel.php", file_get_contents($path."panel.php")."<script>alert('VOTRE CLOUD EST CORROMPU! VEUILLEZ CONTACTER L\'ASSISTANCE!')</script>");
      exit;
    }
    file_put_contents($path."user_infos.json", json_encode($JSON));
}