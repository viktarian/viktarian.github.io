<?php
//////////// стандартные операции с MySQL
//insert
function insertMySQL($table,$name_column,$info){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='INSERT INTO `'.$table.'` (`'.$name_column.'`) VALUES ("'.htmlspecialchars($info).'")';
	$res=mysqli_query($link,$sql);
}
//last id
function lastIdMySQL($table='general',$name_column='id'){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql = 'SELECT * FROM `'.$table.'` ORDER BY `'.$name_column.'` DESC LIMIT 1';
	$res = mysqli_query($link,$sql);
	$note = mysqli_fetch_assoc($res);
	$last_id = $note['id'];
	return $last_id;
}
//update
function updateMySQL($table,$name_column,$info,$id){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='UPDATE `'.$table.'` SET `'.$name_column.'` = "'.htmlspecialchars($info).'" WHERE `id`="'.$id.'"';
	$res=mysqli_query($link,$sql);
}	
	
//текст конкретной ячейки
function textCellMySQL($table,$name_column,$id){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='SELECT * FROM `'.$table.'` WHERE `id`="'.$id.'"';
	$res=mysqli_query($link,$sql);
	$note = mysqli_fetch_assoc($res);
	$textCell = $note[$name_column];
	return $textCell;
}
//delete
function deleteFromMySQL($table,$idNote){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	//"DELETE FROM `rlt_search-project`.`general` WHERE `general`.`id` = 66"
	//$sql='INSERT INTO `'.$table.'` (`'.$name_column.'`) VALUES ("'.htmlspecialchars($info).'")';
	$sql='DELETE FROM `'.$table.'` WHERE `id` = '.$idNote;
	$res=mysqli_query($link,$sql);
}
/////////// end - стандартные операции с MySQL

//////////// операции с файлами
//извлечь файлы из данной папки
function selectWaysToFiles($docDir){
	clearstatcache();
	//$docDir - ПУТЬ к папке с файлами
	$files = scandir($docDir);
	for($i = 0, $length = count($files); $i < $length; $i++){
		// Исключаем из списка директории:
		if( is_dir($files[$i]) ){
			unset($files[$i]);
		}
	}
	return $files;
}
//////////// end - операции с файлами

//извлечь инфу из таблицы в форме выпадающего списка
function select($table){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="div_class_'.$table.'" id="div_id_'.$table.'">';
		echo'<select name="select_name_'.$table.'" class="select_class_'.$table.' cs-select cs-skin-underline" id="select_id_'.$table.'">';
			echo'<option value="0">--Любой вариант--</option>';
			
			$sql = 'SELECT * FROM `'.$table.'` WHERE `show`=1 order by `name`';
			$res=mysqli_query($link,$sql);
			while($note=mysqli_fetch_assoc($res)){
				echo '<option';
					echo ' value="'.$note['id'].'"';
					//с учетом того, что пользователь мог что-то свое выбрать
					/* //было
					if($note['autoselect']==1){echo 'selected="selected"';} */
					//стало
					if (isset($_POST['select_name_'.$table]) and $note['id']==$_POST['select_name_'.$table]){
						echo 'selected="selected"';
					}
					else{
						if($note['autoselect']==1){echo 'selected="selected"';};
					}
					//end - стало
				echo '>';
						echo $note['name'];
				echo '</option>';
			}
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
}
	//special for назначенные/к продаже. похожее. переделать.
//извлечь инфу из таблицы в форме выпадающего списка
function select2($table){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="div_class_'.$table.'" id="div_id_'.$table.'">';
		echo'<select name="select_name_'.$table.'" class="select_class_'.$table.' knopkione" id="select_id_'.$table.'" size="2">';
			//echo'<option value="0">--Любой вариант--</option>';
			
			//$sql = 'SELECT * FROM `'.$table.'` WHERE `show`=1 order by `name`';
			$sql = 'SELECT * FROM `'.$table.'` WHERE `show`=1';
			$res=mysqli_query($link,$sql);
			while($note=mysqli_fetch_assoc($res)){
				echo '<option';
					echo ' value="'.$note['id'].'" id="razdel'.$note['id'].'"';
					//с учетом того, что пользователь мог что-то свое выбрать
					if (isset($_POST['select_name_'.$table]) and $note['id']==$_POST['select_name_'.$table]){
						echo 'selected="selected"';
					}
					else{
						if($note['autoselect']==1){echo 'selected="selected"';};
					}
				echo '>';
						echo $note['name'];
						/* //считаем число записей с данным параметром
						$sql2 = 'SELECT * FROM `general` WHERE `id_table2`="'.$note['id'].'"';
						$res2 = mysqli_query($link,$sql2);
						$count=0;
						while($note2 = mysqli_fetch_assoc($res2)){$count=$count+1;};
						//и выводим
						//echo ' ('.count($note2).')';
						echo ' ('.$count.')'; */
						//считаем число записей с данным параметром, разрешенных для отображения
						$sql2 = 'SELECT * FROM `general` WHERE `id_table2`="'.$note['id'].'" and `show`=1';
						$res2 = mysqli_query($link,$sql2);
						$count=0;
						while($note2 = mysqli_fetch_assoc($res2)){$count=$count+1;};
						//и выводим
						//echo ' ('.count($note2).')';
						echo ' ('.$count.')';
						
				echo '</option>';
			}
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
}
	//end - special for назначенные/к продаже. похожее. переделать.
	
			//в виде кнопок вместо списка
/* function select2Button($table){
	
} */
		
		
		
		
		//special for назначенные/к продаже. похожее. переделать. теперь уже в виде кнопок
			//все время повторяется то, что нужно извлечь, но каждый раз меняется в каком виде извлечь
			
			function selectShow1($table,$how=''){
				//обязательно до вызова функции должна быть связь с базой
				global $link;if (!isset($link)) {exit('issue5');}
				
				//готовимся к старту
				
				//функции для соответствующего вывода информации
					//для вывода кнопок
				function showButton($value,$idNote){
					global $table;
					//echo'<div class="div_class_'.$table.'">';
						echo'<input type="button" value="'.$value.'" id="button_razdel'.$idNote.'" />';
					//echo'</div>';
				}
				
					//в виде выпадающего списка, при этом первые 3 элемента уже развернуты
				
				//считаем число записей с данным параметром, разрешенных для отображения
				function countNotes($parameter,$idNote){
					global $link;
					$sql = 'SELECT * FROM `general` WHERE `'.$parameter.'`="'.$idNote.'" and `show`=1';
					$res = mysqli_query($link,$sql);
					$count=0;
					while($note = mysqli_fetch_assoc($res)){$count=$count+1;};
					return $count;
				}
				
				// end - готовимся к старту
				
				//go
					//в виде отдельных кнопок
					//в скрытом поле будем хранить выбранный id, по умолчанию вроде у назначенных id=3
					//echo '<input type="hidden" id="select_id_'.$table.'" value="3">';
					//select info from mysql
					$sql = 'SELECT * FROM `'.$table.'` WHERE `show`=1';
					$res=mysqli_query($link,$sql);		
					while($note=mysqli_fetch_assoc($res)){
						//showButton($value=$note['name'].countNotes($parameter='id_table2',$idNote=$note['id']),$idNote=$note['id']);
						showButton($value=$note['name'].' ('.countNotes($parameter='id_table2',$idNote=$note['id']).')',$idNote=$note['id']);
					}
						
			}
			
			

	
	
	

//узнать название соответсвующей айдишки
function nameOfId($table,$id_note){

	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='SELECT * FROM `'.$table.'` WHERE id='.$id_note;
	$res=mysqli_query($link,$sql);
	$note=mysqli_fetch_assoc($res);
	echo $note['name'];
}

//создать массив разновидностей параметра (пример: create массив районов)
function createArrayViewsOfParameter($table,&$array,$table_owner='no'){

	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	//позже модернизировать
	if(!isset($_POST['select_name_table2'])){
		$_POST['select_name_table2']=3;
	}
	
	$array=array();
	if($_POST['select_name_'.$table]>0){
		array_push($array, $_POST['select_name_'.$table]);
	}
	else{
		//if exists owner (for sub)
		if($table_owner!='no'){
			if($_POST['select_name_'.$table_owner]>0){
				$sql='SELECT * FROM `'.$table.'` WHERE id_table1='.$_POST['select_name_'.$table_owner];
			}
			else{
				$sql='SELECT * FROM `'.$table.'`';
			}
		}
		//для просто таблиц без sub
		else{
			$sql = 'SELECT * FROM `'.$table.'`';
		}
		$res=mysqli_query($link,$sql);
		while($note=mysqli_fetch_assoc($res)){
			array_push($array, $note['id']);
		}
	}
}


////////////////////////////////////////////////////////
///////////////////////admin
//извлечь инфу из таблицы в форме выпадающего списка
function selectForAddNote($table){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="divForAddNote_class_'.$table.'" id="divForAddNote_id_'.$table.'">';
		
		/* echo'<input type="checkbox"> добавить новое название <input type="text"><br>'; */
		
		echo'<select name="selectForAddNote_name_'.$table.'" class="selectForAddNote_class_'.$table.'" id="selectForAddNote_id_'.$table.'">';
			
			$sql = 'SELECT * FROM `'.$table.'` WHERE `show`=1 order by `name`';
			$res=mysqli_query($link,$sql);
			while($note=mysqli_fetch_assoc($res)){
				echo '<option';
					echo ' value="'.$note['id'].'"';
					if($note['autoselect']==1){echo 'selected="selected"';}
				echo '>';
						echo $note['name'];
				echo '</option>';
			}
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
}

//выпадающий список, ordered by name
//often 
//	$where='WHERE `show`=1'
//	$infoForCompare='1'
//	$infoForCompare='autoselect'
function selectOption($table,$fieldForCompare,$infoForCompare,$where='',$selectClass='',$selectId='',$divClass='',$divId=''){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="'.$divClass.'" id="'.$divId.'">';
		
		echo'<select class="'.$selectClass.'" id="'.$selectId.'">';
			
			$sql = 'SELECT * FROM `'.$table.'` '.$where.' order by `name`';
			$res=mysqli_query($link,$sql);
			while($note=mysqli_fetch_assoc($res)){
				echo '<option';
					echo ' value="'.$note['id'].'"';
					if($note[$fieldForCompare]==$infoForCompare){echo 'selected="selected"';}
				echo '>';
						echo $note['name'];
				echo '</option>';
			}
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
	
}

/* function selectOptionForParent($table,$tableChild,$fieldForCompare,$infoForCompare,$where='',$selectClass='',$selectId='',$divClass='',$divId=''){
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="'.$divClass.'" id="'.$divId.'">';
		
		echo'<select class="'.$selectClass.'" id="'.$selectId.'" onclick="updateChild(idParent=$(this).val(),tableParent=\''.$table.'\',idChild=,tableChild=\''.$tableChild.'\',url=\'changeChild.php\');">';
			
			$sql = 'SELECT * FROM `'.$table.'` '.$where.' order by `name`';
			$res=mysqli_query($link,$sql);
			while($note=mysqli_fetch_assoc($res)){
				echo '<option';
					echo ' value="'.$note['id'].'"';
					if($note[$fieldForCompare]==$infoForCompare){echo 'selected="selected"';}
				echo '>';
						echo $note['name'];
				echo '</option>';
			}
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
	
} */

//для изменения области района
/* function selectForUpdateTablesub($table,$idNote){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	echo'<div class="divForAddNote_class_'.$table.'" id="divForAddNote_id_'.$table.'">';
				
		echo'<select name="selectForAddNote_name_'.$table.'" class="selectForAddNote_class_'.$table.'" id="selectForAddNote_id_'.$table.'">';
			
			$sql = 'SELECT * FROM `'.$table.'` WHERE `id`='.$idNote;
			$res=mysqli_query($link,$sql);
			$note=mysqli_fetch_assoc($res);
				echo '<option';
					echo ' value="'.$note['id'].'"';
					if($note['autoselect']==1){echo 'selected="selected"';}
				echo '>';
						echo $note['name'];
				echo '</option>';
			
			unset($sql);unset($res);unset($note);
	
		echo'</select>';
	echo'</div>';
} */

//id надэлемента
function idParent($table,$tableParent,$idNote){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='SELECT * FROM `'.$table.'` WHERE id='.$idNote;
	$res=mysqli_query($link,$sql);
	$note=mysqli_fetch_assoc($res);
		$sql2='SELECT * FROM `'.$tableParent.'` WHERE id='.$note['id_'.$tableParent];
		$res2=mysqli_query($link,$sql2);
		$note2=mysqli_fetch_assoc($res2);
		return $note2['id'];
}
//название надэлемента
function nameParent($table,$tableParent,$idNote){
	
	//обязательно до вызова функции должна быть связь с базой
	global $link;if (!isset($link)) {exit('issue5');}
	
	$sql='SELECT * FROM `'.$table.'` WHERE id='.$idNote;
	$res=mysqli_query($link,$sql);
	$note=mysqli_fetch_assoc($res);
		$sql2='SELECT * FROM `'.$tableParent.'` WHERE id='.$note['id_'.$tableParent];
		$res2=mysqli_query($link,$sql2);
		$note2=mysqli_fetch_assoc($res2);
		echo $note2['name'];
}



//map
	//блок для вставки кода карты на сайт
function divCodeMap($code){
	echo'
				<div class="mapUpload mceNoEditor">
				<form action="" method="post">
					
					Код для вставки карты на сайт:<br>
					<textarea  rows="7" cols="70" id="codeMap" class="codeMap" name="codeMap">'.$code.'</textarea >
					<input type="button" value="Изменить" id="uploadMap">
				</form>
				</div>
				';	
}


//отображение даты и время события
function timeEvent($time,$timeOld){
	
	//new
	if($time>1000){
		date_default_timezone_set('Europe/Minsk');
		return date("d.m.y H:i", $time);
	}
	//old
	else{
		return $timeOld;
	}
}

?>