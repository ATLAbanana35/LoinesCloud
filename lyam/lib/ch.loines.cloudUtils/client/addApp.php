<?php

include_once "../../ch.loines.phpCloud/phpCloud.php";
session_start();
include_once "../../../pin.php";
if (!empty($_SESSION["pin"])) {
    if (password_verify($_SESSION["pin"], $code)) {
    } else {
        echo "VOUS N'ÊTES PAS AUTORISÉ À ACCEDER À CETTE PAGE <script>setTimeout(() => {window.location = './login.php';}, 4000)</script>";
        exit;
        }
} else {
    echo "VOUS N'ÊTES PAS AUTORISÉ À ACCEDER À CETTE PAGE <script>setTimeout(() => {window.location = './login.php';}, 4000)</script>";
    exit;
}
  if (!empty($_GET["t"])) {
    if (!IsAppPlaced($_GET["t"] ,"../../../")) {
         $JSON = json_decode(file_get_contents("../".$_GET["t"].".json"), true);
         $codeName = $JSON["codename"];
         $path = $JSON["content"];
         mkdir("../../../CLOUD/apps/".$codeName);
         copy("../content/".$path, "../../../CLOUD/apps/".$codeName."/content".$JSON["ext"]);
        copy("../bundle/".$JSON["bundle"]["version"]."/index.php", "../../../CLOUD/apps/".$codeName."/index.php");
        PlaceApp($_GET["t"] ,"../../../");
    }
  }
?>