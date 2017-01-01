<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Select file to upload: <input type="file" name="fileToUpload" id="fileToUpload"></p>
    <p><input type="checkbox" name="HTML" value="HTML"> .html</input><input type="checkbox" name="PDF" value="PDF"> .pdf</input><input type="checkbox" name="DOCX" value="DOCX"> .docx</input></p>
    <p><input type="radio" name="stylesheet" value="none" checked="checked">none</input><input type="radio" name="stylesheet" value="retro"> retro.css</input><input type="radio" name="stylesheet" value="screen"> screen.css</input><input type="radio" name="stylesheet" value="avenir-white"> avenir-white.css</input></p>
    <p><input type="submit" value="Upload" name="submit"></input></p>
</form>

</body>
</html>
