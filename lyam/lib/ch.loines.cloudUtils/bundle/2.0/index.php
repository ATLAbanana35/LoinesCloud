<?php
$zipFileName = 'content.zip';
$extractPath = './';
// Create a new ZIP archive
$zip = new ZipArchive();

// Open the ZIP archive for reading
if ($zip->open($zipFileName) === true) {
    // Create the directory to extract the files
    if (!is_dir($extractPath)) {
        mkdir($extractPath, 0755, true);
    }

    // Extract all the files from the ZIP archive
    $zip->extractTo($extractPath);

    // Close the ZIP archive
    $zip->close();

    echo 'ZIP archive extracted successfully.';
    unlink("test.php");
    unlink($zipFileName);
} else {
    echo 'Failed to extract ZIP archive.';
}

?>