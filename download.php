<?php
// "Resume/continue" session
session_start();

// Path where converted.zip can be found
$path = $_SESSION["target_dir"] . $_SESSION["unique_ID"] . '/';
$file = $path . pathinfo($_SESSION["target_file"], PATHINFO_FILENAME) . '.zip';
$file = $path . 'converted' . '.zip';


// I don't really understand this. I think it came straight vrom W3Schools or
//    PHP documentation.
if (file_exists($file)) {
    // No echo before this point!
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}

// Remove all session variables
session_unset();
// Destroy the session
session_destroy();

?>
