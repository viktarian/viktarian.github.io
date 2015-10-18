<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Подписка на рассылку</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php
include('config.php');
include('ClassMySQL.php');
$mysql=new ClassMySQL();
$mysql->update($table='subscription',$name_column='send',$info='0',$id=$_GET['id']);
//echo 'id - '.$_GET['id'];
?>
<p>Вы успешно отписаны.</p>

</body>
</html>