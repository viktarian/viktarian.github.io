<?php include('incl.php');?>
<div>Материалы</div>
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
//вывод 10 последних заголовков материалов
for ($i=$id_note;$i>0 and $count<10;$i--){
	if(textCellMySQL($table='materials',$name_column='title',$id=$i)!=''){
			echo '<div>'.textCellMySQL($table='materials',$name_column='title',$id=$i).'</div>';
			$count++;;
	}
}
?>