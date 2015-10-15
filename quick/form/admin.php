<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Подписка на рассылку</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="script.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
include('config.php');
include('ClassMySQL.php');
$mysql=new ClassMySQL();
?>

<table rules="cols">
	<tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>рассылка</td>
	</tr>
	<?php
	// $mysql->allNotes($table='subscription',$arrayCols=array('id','name','email','send'));
	$mysql->allNotes2($table='subscription',$arrayCols=array('id','name','email'));
	?>
</table>

<div id="divDynamic"></div>

<div class="send" id="send">
	Введите текст рассылки:<br>
	<textarea id="text">test</textarea><br>
	<button class="buttonSend" id="buttonSend">Send</button>
</div>

</body>
</html>