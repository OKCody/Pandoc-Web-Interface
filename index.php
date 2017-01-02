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
</head>
<body>
  <div class="row">
    <div class="twelve columns">
      <h1>Markdown File Converter</h1>
    </div>
  </div>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="twelve columns">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload"></input>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        Output formats:
        HTML <input type="checkbox" name="HTML" value="HTML"></input>
        PDF <input type="checkbox" name="PDF" value="PDF"></input>
        DOCX <input type="checkbox" name="DOCX" value="DOCX"></input>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        none <input type="radio" name="stylesheet" value="none" checked="checked"></input>
        retro.css <input type="radio" name="stylesheet" value="retro"></input>
        screen.css <input type="radio" name="stylesheet" value="screen"></input>
        avenir-white.css <input type="radio" name="stylesheet" value="avenir-white"></input>

      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        <input type="submit" value="Upload" name="submit"></input>
      </div>
    </div>
  </form>

</body>
</html>
