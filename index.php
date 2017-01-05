<!DOCTYPE html>
<html>
<head>
<!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Skeleton: Responsive CSS Boilerplate</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" type="text/css" href="normalize.css">
  <link rel="stylesheet" type="text/css" href="skeleton.css">
  <link rel="stylesheet" type="text/css" href="custom.css">

</head>
<body>
  <div class="container">
    <div class="row" id="title">
      <div class="twelve columns uploadForm">
        <h1>Markdown File Converter</h1>
      </div>
    </div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="twelve columns uploadForm">
          <b>Select file to upload </b>
          <input type="file" name="fileToUpload" id="fileToUpload"></input>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns uploadForm">
          <b>Output formats: </b>
          <input type="checkbox" name="HTML" value="HTML">HTML</input>
          <input type="checkbox" name="PDF" value="PDF">PDF</input>
          <input type="checkbox" name="DOCX" value="DOCX">DOCX</input>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns uploadForm">
          <b>Stylesheet: </b>
           <input type="radio" name="stylesheet" value="none" checked="checked">none</input>
           <input type="radio" name="stylesheet" value="retro">retro.css</input>
           <input type="radio" name="stylesheet" value="screen">screen.css</input>
          <input type="radio" name="stylesheet" value="avenir-white">avenir-white.css</input>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns uploadForm">
          <input type="submit" value="Convert" name="submit"></input>
        </div>
      </div>
    </div>
  </form>

</body>
</html>
