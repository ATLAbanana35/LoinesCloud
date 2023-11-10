<?php
include_once "../lib/ch.loines.phpCloud/phpCloud.php";
session_start();
include_once "../pin.php";
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
function rrmdir($dir) {
if (is_dir($dir)) {
$objects = scandir($dir);
foreach ($objects as $object) {
if ($object != "." && $object != "..") {
if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
rrmdir($dir. DIRECTORY_SEPARATOR .$object);
else
unlink($dir. DIRECTORY_SEPARATOR .$object);
}
}
rmdir($dir);
}
}
if ($_GET["action"] == "rename") {
if ($_GET["val_1"] !== "fileAction.php") {
rename("_/".$_GET["val_1"],"_/".$_GET["val_2"].".".pathinfo($_GET["val_1"], PATHINFO_EXTENSION));
}
}
if ($_GET["action"] == "delete") {
if ($_GET["val_1"] !== "fileAction.php") {
if (is_file("_/".$_GET["val_1"])) {
unlink("_/".$_GET["val_1"]);
} else {
rrmdir("_/".$_GET["val_1"]);
}
}
}
if ($_GET["action"] == "updateHTML") {
if ($_GET["val_1"] !== "fileAction.php" && pathinfo($_GET["val_1"], PATHINFO_EXTENSION) === "html") {
    file_put_contents("_/".$_GET["val_1"], $_GET["val_2"]);
}
}
if ($_GET["action"] == "addFolder") {
mkdir("_/".$_GET["val_1"]);
}
if ($_GET["action"] == "addHTMLFile") {
    file_put_contents("_/".$_GET["val_1"].".html", "");
}
?>