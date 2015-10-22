<?php
include('../../config.php');
include('../../library/ClassMySQL.php');
$mysql=new ClassMySQL();
$mysql->update($table='subscription',$name_column='send',$info='0',$id=$_POST['id']);

echo'<p>Вы успешно отписаны.</p>';
?>