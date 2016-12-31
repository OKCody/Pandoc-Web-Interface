<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <p>.html <input type="checkbox" name="HTML" value="HTML">
     .pdf <input type="checkbox" name="PDF" value="PDF">
     .docx <input type="checkbox" name="DOCX" value="DOCX"></p>
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
