<?php include('incl.php');?>
<p>Материалы:</p>
<?php
$id_note=lastIdMySQL($table='materials',$name_column='id');
$count=0;
/* for ($i=$id_note;$i>0 and $count<2;$i--){
	if(textCellMySQL($table='materials',$name_column='title',$id=$i)!=''){
		echo'<div>';
			echo '<div>'.textCellMySQL($table='materials',$name_column='title',$id=$i).'</div>';
			echo '<div>'.textCellMySQL($table='materials',$name_column='text',$id=$i).'</div>';
			$count++;
		echo'</div>';
	}
} */
/* //вывод 10 последних заголовков материалов
for ($i=$id_note;$i>0 and $count<10;$i--){
	if(textCellMySQL($table='materials',$name_column='title',$id=$i)!=''){
			echo '<p><a href="material.php?id_note='.$i.'" target="blank">'.textCellMySQL($table='materials',$name_column='title',$id=$i).'</a></p>';
			echo '<p><a href="material.php?id_note='.$i.'" target="blank">'.textCellMySQL($table='materials',$name_column='title',$id=$i).'</a></p>';
			$count++;
	}
} */
//вывод 10 последних заголовков материалов
for ($i=$id_note;$i>0 and $count<10;$i--){
	if(textCellMySQL($table='materials',$name_column='title',$id=$i)!=''){
			echo '<p><a href="#" onClick="material(\''.$i.'\')">'.textCellMySQL($table='materials',$name_column='title',$id=$i).'</a></p>';
			$count++;
	}
}
?>

<div class="div" id="material">
	<?php
	echo '<p>'.textCellMySQL($table='materials',$name_column='title',$id=$id_note).'</p>';
	echo '<p>'.textCellMySQL($table='materials',$name_column='text',$id=$id_note).'</p>';
	?>
</div>
<a name="mater"></a>