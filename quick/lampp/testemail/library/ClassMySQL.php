<?php
class ClassMySQL{
	public $link;
	//connect to BD
	function __construct(){
		$this->link = mysqli_connect(C_bd_server,C_bd_user,C_bd_pass,C_bd_name);
			if (!isset($this->link)) {exit('issue5');}
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		/* change character set to utf8 */
		mysqli_set_charset($this->link, 'utf8');
	}
	
	//текст конкретной ячейки
	function textCell($table,$name_column,$id){
		$sql='SELECT * FROM `'.$table.'` WHERE `id`="'.$id.'"';
		$res=mysqli_query($this->link,$sql);
		$note = mysqli_fetch_assoc($res);
		$textCell = htmlspecialchars_decode($note[$name_column]);
		return $textCell;
	} 
	//insert
	function insert($table,$name_column,$info){
		$sql='INSERT INTO `'.$table.'` (`'.$name_column.'`) VALUES ("'.htmlspecialchars($info).'")';
		$res=mysqli_query($this->link,$sql);
	}
	//last id
	function lastId($table='general',$name_column='id'){
		$sql = 'SELECT * FROM `'.$table.'` ORDER BY `'.$name_column.'` DESC LIMIT 1';
		$res = mysqli_query($this->link,$sql);
		$note = mysqli_fetch_assoc($res);
		$last_id = $note['id'];
		return $last_id;
	}
	//update
	function update($table,$name_column,$info,$id){
		$sql='UPDATE `'.$table.'` SET `'.$name_column.'` = "'.htmlspecialchars($info).'" WHERE `id`="'.$id.'"';
		$res=mysqli_query($this->link,$sql);
	}
	//delete
	function delete($table,$idNote){
		$sql='DELETE FROM `'.$table.'` WHERE `id` = '.$idNote;
		$res=mysqli_query($this->link,$sql);
	}
	
	//show info in table ----- do do do
		//просто вся инфа
	function allNotes($table,$arrayCols){
		$numberCols=count($arrayCols);
		$lastId=$this->lastId($table,$name_column='id');
		$id=$lastId;
		while($id>0){
			echo'<tr>';
				$i=0;
				while($i<$numberCols){
					echo'<td>'.$this->textCell($table=$table,$name_column=$arrayCols[$i],$id=$id).'</td>';
					$i=$i+1;
				}
			echo'</tr>';
			$id=$id-1;
		}
	}
		//просто вся инфа + последний столбик - checkbox
	function allNotes2($table,$arrayCols){
		$numberCols=count($arrayCols);
		$lastId=$this->lastId($table,$name_column='id');
		$id=$lastId;
		while($id>0){
			echo'<tr>';
				$i=0;
				while($i<$numberCols){
					echo'<td>'.$this->textCell($table=$table,$name_column=$arrayCols[$i],$id=$id).'</td>';
					$i=$i+1;
				}
				//checkbox
				if($this->textCell($table=$table,$name_column='send',$id=$id)==1){
					echo'<td><input type="checkbox" checked onClick="checkbox(\''.$id.'\')" id="check'.$id.'"></td>';
				}
				else{echo'<td><input type="checkbox" onClick="checkbox(\''.$id.'\')" id="check'.$id.'"></td>';}
			echo'</tr>';
			$id=$id-1;
		}
	}
}
?>