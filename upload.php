<?php
// Start the session
session_start();
date_default_timezone_set('America/Chicago');

$_SESSION["target_dir"] = "uploads/";
$target_dir = $_SESSION["target_dir"];
$_SESSION["unique_ID"] = date(YmdHis) . _ . uniqid();
$unique_ID = $_SESSION["unique_ID"];
$_SESSION["target_file"] = basename($_FILES["fileToUpload"]["name"]);
$target_file = $_SESSION["target_file"];

//echo $target_dir . "<br>";
//echo $unique_ID . "<br>";
//echo $target_file . "<br>";
//echo $_FILES["fileToUpload"]["tmp_name"] . "<br>";

//phpinfo();

shell_exec("mkdir $target_dir/$unique_ID");
$uploadOk = 1;
$imageFileType = pathinfo($_SESSION["target_file"],PATHINFO_EXTENSION);
$message = '';

//echo $unique_ID . '/' . $target_file;

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
// Allow certain file formats
if($imageFileType != "md" && $imageFileType != "MD" && $imageFileType != "txt"
&& $imageFileType != "TXT" && $imageFileType != "zip" && $imageFileType != "ZIP"){
    $message = $message . "Error: Supported filetypes are .md, .txt, and .zip <br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message = $message . "Error: Your file was not uploaded. <br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $_SESSION["target_dir"] . $_SESSION["unique_ID"] . '/' . $_SESSION["target_file"])) {
        $message = $message . "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
        echo "<form action='download.php' method='post'>
            <input type='submit' name='submit' value='Download File' />
        </form>";
    } else {
        $message = $message . "Error: There was an error uploading your file. <br>";
        //use echo phpinfo(); to check max_upload_size should if file being uploaded is larger than this setting this error will be returned.
    }
}

// end upload error checking, and validation

// read in output formats
$output2 = '';
$output3 = '';
$output4 = '';
if (isset($_POST['HTML'])) {
    $output2 = 'html';
}
if (isset($_POST['PDF'])) {
    $output3 = 'pdf';
}
if (isset($_POST['DOCX'])) {
    $output4 = 'docx';
}
if (!isset($_POST['HTML']) && !isset($_POST['PDF']) && !isset($_POST['DOCX'])){
    $message = $message . "Error: No output format selected. <br>";
}


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

shell_exec("bash convert.sh $target_dir/$unique_ID/ $stylesheet $output2 $output3 $output4 ");

//echo $target_dir . $_SESSION["unique_ID"] . '/' . $_SESSION["target_file"];

echo $message;
?>
