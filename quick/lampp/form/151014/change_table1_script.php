<meta charset="utf-8">
<?php
//примитивные действия с таблицей (переименовать названия, удалить, добавить строчку, видим/не видим)
	//add new note
echo $_POST['data2'].'<br>';
if(isset($_POST['id_note'])){echo'1<br>';}
if(isset($_POST['id_note']) and ($_POST['id_note']=='new')){
	/* $sql='INSERT INTO `table1` (`name`) VALUES ("'.$_POST["title"].'")';
	$res=mysqli_query($link,$sql); */
	echo 'Новое название '.$_POST["title"].' добавлено в базу.<br>';
}
else{
	echo'что-то пока не совсем идет так<br>';
}
?>