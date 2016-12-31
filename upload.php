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

echo $target_dir . "<br>";
echo $unique_ID . "<br>";
echo $target_file . "<br>";
echo $_FILES["fileToUpload"]["tmp_name"] . "<br>";

phpinfo();

shell_exec("mkdir $target_dir/$unique_ID");
$uploadOk = 1;
$imageFileType = pathinfo($_SESSION["target_file"],PATHINFO_EXTENSION);

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
            echo "Error: Filesize = 0 bytes.";
            $uploadOk = 0;
        }
    }
}

// Check if file already exists
if (file_exists($target_dir . $_SESSION["unique_ID"] . $_SESSION["target_file"])) {
    echo "Error: File already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 104857600) {
    echo "Error: File is too large. Limit = 100Mb";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "md" && $imageFileType != "MD" && $imageFileType != "txt"
&& $imageFileType != "TXT" && $imageFileType != "zip" && $imageFileType != "ZIP"){
    echo "Error: Supported filetypes are .md, .txt, and .zip";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Error: Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $_SESSION["target_dir"] . $_SESSION["unique_ID"] . '/' . $_SESSION["target_file"])) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo "<form action='download.php' method='post'>
            <input type='submit' name='submit' value='Download File' />
        </form>";
    } else {
        echo $_FILES["fileToUpload"]["tmp_name"];
        echo "Error: There was an error uploading your file.";
        //use echo phpinfo(); to check max_upload_size should if file being uploaded is larger than this setting this error will be returned.
    }
}

shell_exec("bash convert.sh $target_dir/$unique_ID/");

//echo $target_dir . $_SESSION["unique_ID"] . '/' . $_SESSION["target_file"];

?>
