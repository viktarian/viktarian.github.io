<?php include('incl.php');?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>CVR - admin</title>
	<link rel="stylesheet" href="general.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="general.js"></script>
</head>
<body>

<p>Заголовок: <input type="text" id="addTitle"></p>
<p>Описание:</p>
<textarea rows="4" cols="50" id="addText"></textarea><br>
<p><input type="button" value="Добавить" onClick="addMaterial()"></p>

</body>
</html>