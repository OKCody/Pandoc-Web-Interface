<?php

// Start the session and housekeeping
session_start();
date_default_timezone_set('America/Chicago');

// File path variables
$_SESSION["target_dir"] = "uploads/";
$target_dir = $_SESSION["target_dir"];
$_SESSION["unique_ID"] = date(YmdHis) . _ . uniqid();
$unique_ID = $_SESSION["unique_ID"];
$_SESSION["target_file"] = basename($_FILES["fileToUpload"]["name"]);
$target_file = $_SESSION["target_file"];


// Status variables
shell_exec("mkdir $target_dir/$unique_ID");
$uploadOk = 1;
$imageFileType = pathinfo($_SESSION["target_file"],PATHINFO_EXTENSION);
$message = '';

// Check if image file is a actual file or fake file
if($imageFileType == "zip" || $imageFileType == "ZIP"){
    $uploadOk = 1;
} else {
    if(isset($_POST["submit"])) {
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check) {
            //file is of non-zero size
            $uploadOk = 1;
        } else {
            $message = $message . "Error: Filesize = 0 bytes or no file selected. Please uploade a file of non-zero size. <br>";
            $uploadOk = 0;
        }
    }
}
// Check if file already exists
if (file_exists($target_dir . $_SESSION["unique_ID"] . $_SESSION["target_file"])) {
    $message = $message . "Error: File already exists. <br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 104857600) {
    $message = $message . "Error: File is too large. Limit = 100Mb <br>";
    $uploadOk = 0;
}
// Check filetype. md, MD, txt, TXT, zip, and ZIP are allowed.
if($imageFileType != "md" && $imageFileType != "MD" && $imageFileType != "txt"
&& $imageFileType != "TXT" && $imageFileType != "zip" && $imageFileType != "ZIP"){
    $message = $message . "Error: Supported filetypes are .md, .txt, and .zip <br>";
    $uploadOk = 0;
}
// read in output formats
$output2 = '';
$output3 = '';
$output4 = '';
$output5 = '';
if (isset($_POST["HTML"])) {
    $output2 = 'html';
}
if (isset($_POST["PDF"])) {
    $output3 = 'pdf';
}
if (isset($_POST["EPUB"])) {
    $output4 = 'epub3';
}
if (isset($_POST["DOCX"])) {
    $output5 = 'docx';
}
if (empty($output2) && empty($output3) && empty($output4) && empty($output5)){
    $message = $message . "Error: No output format selected. <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0. If so, indicate a general error at least
if ($uploadOk == 0) {
    $message = $message . "Error: Your file was not uploaded. <br>";
// If everything is OK, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $_SESSION["target_dir"] . $_SESSION["unique_ID"] . '/' . $_SESSION["target_file"])) {
        $message = $message . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
        // Download file directly to browser without loading new page.
        header("Location: download.php");
    } else {
        // If a file was indeed selected to be uploaded and this error is still
        //  being thrown,the error is more than likely being caused by something
        //  out of the user's control.
        // Make sure PHP's max_upload_size is set to 100Mb and that PHP is the
        //  owner of and has permission to write to www/
        $message = $message . "Error: There was an error uploading your file. <br>";
    }
}

// end upload error checking, and validation


// Select a stylesheet to be applied.
// Pandoc ignores stylesheets for PDF and DOCX formats natively.
//  This fact is exploited in Pandoc call in convert.sh
$stylesheet = $_POST['stylesheet']; // empty string corresponds to "false"
if ($stylesheet == "retro") {
    $stylesheet = 'stylesheets/retro.css';
}
if ($stylesheet == "screen") {
    $stylesheet = 'stylesheets/screen.css';
}
if ($stylesheet == "avenir-white") {
    $stylesheet = 'stylesheets/avenir-white.css';
}

// Call convert.sh script where the actual conversion takes place.
// Optins here are passed to convert.sh script and their purposes are detailed
//  on the first few lines of convert.sh
shell_exec("bash convert.sh $target_dir/$unique_ID/ $stylesheet $output2 $output3 $output4 $output5");

if ($message == ''){
    // When executed without error download file directly to index.php
    //header("index.html");
    echo $stylesheet;
}
else {
    // Sandwich error message between top and bottom halves of error page.
    echo file_get_contents( "errorHead.html" );
    echo $message;    //Display accumulated error message.
    echo file_get_contents( "errorTail.html" );
}

?>
