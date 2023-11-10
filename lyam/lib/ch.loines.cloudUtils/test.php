<?php
header("content-type: application/json");
function addJSONAsDIR($dir, $data) {
if ($dh = opendir($dir)) {
    while (($entry2 = readdir($dh)) !== false) {
        if ($entry2 != "." && $entry2 != "..") {
            $entry2 = $dir . $entry2;
                // Obtenez le contenu du fichier et échappez-le correctement avant de l'insérer dans la chaîne JSON
                // Créez un tableau associatif pour encoder en JSON
                // Retournez le contenu JSON dans la réponse
                if (is_dir($entry2)) {
                    $data[$entry2] = 0;
                    $data = addJSONAsDIR($entry2."/", $data);
                } else {
                    $fileContent = file_get_contents($entry2);
                    $data[$entry2] = $fileContent;
                }
        }
    }
}
return $data;
}

echo json_encode(addJSONAsDIR("./", []));