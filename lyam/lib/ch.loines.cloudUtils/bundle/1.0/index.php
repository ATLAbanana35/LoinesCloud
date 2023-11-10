<?php
// Obtenez le contenu du fichier dans une chaîne
$fileContent = file_get_contents("./content.json");

// Analysez le contenu JSON pour obtenir un tableau associatif
$entries = json_decode($fileContent, true);

// Parcours des entrées et création des fichiers ou répertoires avec file_put_contents ou mkdir
foreach ($entries as $fileName => $content) {
    // Nettoyez le contenu pour enlever les échappements
    $content = stripslashes($content);

    // Si le contenu est égal à 0, cela signifie que c'est une div (répertoire)
    if ($content == "0") {
        // Créez un répertoire avec le nom du fichier
        mkdir($fileName);
    } else {
        // Créez le fichier avec file_put_contents
        file_put_contents($fileName, str_replace("u00e8","è",str_replace("u00e9","é",$content)));
    }
}
?>