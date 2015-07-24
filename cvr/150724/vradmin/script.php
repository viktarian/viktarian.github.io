<?php include('incl.php');?>
<?php 
if(isset($_POST['addTitle'])){
	insertMySQL($table='materials',$name_column='title',$info=$_POST['addTitle']);
	updateMySQL($table='materials',$name_column='text',$info=$_POST['addText'],$id=lastIdMySQL($table='materials',$name_column='id'));
}
?>