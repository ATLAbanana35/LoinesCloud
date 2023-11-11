<?php
if (isset($_POST["user"])) {
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
        $user = $_POST["user"];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $zipPath = "./cloud.zip";
        mkdir("../users/" . htmlspecialchars($user));
        // Create a new ZIP archive
        $zip = new ZipArchive();
        
        // Open the ZIP archive for reading
        if ($zip->open($zipPath) === true) {
        
            // Extract all the files from the ZIP archive
            $zip->extractTo("../users/" . htmlspecialchars($user));
        
            // Close the ZIP archive
            $zip->close();
        
            echo 'ZIP archive extracted successfully.';
            file_put_contents("../users/" . htmlspecialchars($user)."/pin.php", "
            <?php
\$code = '".$password."'
?>
");
file_put_contents("../users/" . htmlspecialchars($user) . "/user_infos.json", '
{ "name": "'.htmlspecialchars($user).'", "apps": {} }
');
mkdir("../users/" . htmlspecialchars($user) . "/CLOUD/_");
mkdir("../users/" . htmlspecialchars($user) . "/CLOUD/apps");
} else {
echo 'Failed to extract ZIP archive.';
}
}
}
?>