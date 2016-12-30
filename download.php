<?php
session_start();
$path = $_SESSION["target_dir"] . $_SESSION["unique_ID"] . '/';
$file = $path . pathinfo($_SESSION["target_file"], PATHINFO_FILENAME) . '.html';

if (file_exists($file)) {
    // no echo before this point
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

// remove all session variables
session_unset();
// destroy the session
session_destroy();

?>
