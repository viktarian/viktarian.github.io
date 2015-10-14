<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Подписка на рассылку</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<a href="admin.php" target="blank">админка</a><br>

<?php
include('config.php');
include('ClassMySQL.php');

if(isset($_POST['send'])){
	//insert in mysql
	$name=$_POST['sender_name'];
	$email=$_POST['sender_email'];
	$send=1;
	$mysql=new ClassMySQL();
	$mysql->insert($table='subscription',$name_column='name',$info=$name);
		$idNote=$mysql->lastId($table='subscription',$name_column='id');
	$mysql->update($table='subscription',$name_column='email',$info=$email,$id=$idNote);
	$mysql->update($table='subscription',$name_column='send',$info=$send,$id=$idNote);
	
	echo'Вы успешно подписаны';
}
else{
	echo<<<INS
	<a class="show-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='block';document.getElementById('fade').style.display='block'">Подписаться</a>
	<div id="envelope" class="envelope">
		<a class="close-btn" href="javascript:void(0)" onclick = "document.getElementById('envelope').style.display='none';document.getElementById('fade').style.display='none'">Закрыть</a>
		<!-- <h1 class="title">Отправить нам сообщение</h1> -->
		<form method="post" action="index.php">
		     <input type="text" name="sender_name" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваше Имя':this.value;" value="* Ваше Имя" class="your-name"/>
		     <input type="text" name="sender_email" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'* Ваш Email':this.value;" value="* Ваш Email" class="email-address"/>
		     <!-- <textarea class="your-message">Пожалуйста, введите своё сообщение здесь ..</textarea> -->
		     <input type="submit" name="send" value="Подписаться" class="send-message">
		</form>
	</div>
	<div id="fade" class="black-overlay"></div>
INS;
}
?>


</body>
</html>