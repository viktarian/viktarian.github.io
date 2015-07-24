<?php include('incl.php');?>
<?php
echo '<p>'.textCellMySQL($table='materials',$name_column='title',$id=$_POST['id_note']).'</p>';
echo '<p>'.textCellMySQL($table='materials',$name_column='text',$id=$_POST['id_note']).'</p>';
echo '<a href="#" onClick="changeMaterial()">Изменить - в ожидании</a>';
?>