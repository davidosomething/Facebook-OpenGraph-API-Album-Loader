<?php

$album_id = 10150106474643702;
if (isset($_GET['id']) && is_integer($_GET['id'])) {
  $album_id = $_GET['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
<title>Facebook OpenGraph API Album Retriever</title>
<style>
* { margin: 0; padding: 0; }
body { background: #111; color: #f0f0f0; font: 14px/1 Sans-serif; position: }
a {text-decoration: none; color: #ff0; }
#container { width: 960px; margin: 20px auto; position: relative; }
fieldset { margin: 1em; padding: 1em; }
#info { overflow: hidden; }
#album-cover img { float: left; margin: 0 1em 0 0; width: 200px; height: 100px; }
h1 { line-height: 1; }
#main-photo { text-align: center; margin: 20px auto; }
#photos { margin: 20px auto; overflow: hidden; width: 860px; }
#photos a {
 background-position: center 20%;
 background-repeat: no-repeat;
 border: 1px #444 solid;
 float: left;
 height: 0;
 margin: 10px;
 overflow: hidden;
 padding-top: 100px;
 width: 150px;
}
#toggle-help { display: inline-block;
 border-radius: 1em;
 color: #fff;
 font-weight: bold;
 font-size: 12px;
 margin: 0 5px;
 padding: 5px;
 background: #444;
 border: 1px black solid;
}
#help { border: 1px white solid; box-shadow: 0 0 5px 5px rgba(0,0,0,0.5); display: none; position: absolute; left: 0; top: 50px; }
</style>
</head>
<body>

<div id="container">
<form name="formGetId" id="form-get_id" action="index.php" method="GET">
<fieldset>
  <label for="field-id">Album ID:</label>
  <input type="number" name="id" id="field-id" placeholder="999999999999" value="<?php echo $album_id; ?>" />
  <input type="submit" />

  <a href="help.jpg" target="_blank" id="toggle-help">?</a>
  <img src="help.jpg" id="help" />

  <p>Here are some sample Album IDs:</p>
  <ul>
    <li>OceanSpray album: <a href="?id=152269324816712">152269324816712</a></li>
    <li>Carnival Profile photos: <a href="?id=429264099583">429264099583</a></li>
  </ul>
</fieldset>
</form>

<div id="result">
  <div id="info"><div id="album-cover"></div></div>
  <div id="main-photo"></div>
  <div id="photos"></div>
</div>

</div><!-- /#container -->

<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="script.js"></script>

</body></html>
