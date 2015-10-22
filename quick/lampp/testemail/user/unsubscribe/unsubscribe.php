<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Отписка от рассылки</title>
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="transfer.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<?php 
//$_GET['id']=3;
if(isset($_GET['id'])){
	echo'<p>Вы действительно хотите отписаться от рассылки poligraff.by?</p>';
	echo'<div class="divDynamic" id="divDynamic">
		<button class="btn yes" id="yes" onclick="unsubscribeYes(\''.$_GET["id"].'\')">Да</button>
		<button class="btn no" id="no">Нет</button>
	</div>';
}
?>

</body>
</html>