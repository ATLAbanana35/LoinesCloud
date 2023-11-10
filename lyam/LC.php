<?php
include_once "pin.php";
include_once "MySQL.php";
$connexion = mysql();
$command = $connexion->prepare("SELECT * FROM `Users` WHERE `pseudo`=:pse AND `mdp`=:pass");
$command->BindParam(":pse", $_COOKIE["USERSP"]);
$command->BindParam(":pass", $_COOKIE["USERSM"]);
$command->execute();
$server_response = $command->fetchAll();
if (password_verify($server_response[0]["loinesCLOUD"], $code) && $_COOKIE["USERSP"] === json_decode(file_get_contents("user_infos.json"), true)["name"]) {
    echo "All OK";
    session_start();
    $_SESSION["pin"] = $server_response[0]["loinesCLOUD"];
    header("Location: panel.php");
} else {
    echo "Erreur, vos identifiants ne sont pas valides!";
    header("Location: ./error.php");
}
?>