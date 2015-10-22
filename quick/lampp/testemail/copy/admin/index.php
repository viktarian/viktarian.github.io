<?php
// css-код в css/general.css
// в самом конце файла есть head, header, section, footer. туда внутрь можно вбивать любой html, js, scc
// сверху файла внутри класса также можно вбивать различный код, но следует быть осторожным с кавычками (верх, по идее, удобен для добавления названия классов определенных блоков и изменения основного каркаса)
// сейчас все реализовано так, что админка представлена одной страницей, и блок с id="divDynamic" динамически меняется. Если понадобится создать подобную страницу, class HTMLpageAdminCVR будет вынесен в отдельный файл
// динамический блок обновляется благодаря коду в public_html/library/Articles.php
include('./../library/HTMLpage.php');
class HTMLpageAdminCVR extends HTMLpageAdmin{
	
	public $head='<title>testemail - admin</title>';
	
	function writeHeadChange(){
		echo'<script src="'.C_HD_l.'admin/transfer.js"></script>';
	}
	function writeBodyConstant3(){
		echo'<div class="exitAdmin">';$this->echoExitAdmin();echo'</div>';
		echo'<br>';
		echo'<table rules="cols">
			<tr>
				<td>id</td>
				<td>имя</td>
				<td>email</td>
				<td>рассылка</td>
			</tr>';
			include('./../library/ClassMySQL.php');
			$mysql=new ClassMySQL();
			$mysql->allNotes2($table='subscription',$arrayCols=array('id','name','email'));
		echo'</table>';
		echo'<br>';
		echo'<div id="divDynamic"></div>';
		echo'<br>';
		//tinyMCE
			echo'<script src="'.C_HD_l.'library/textEditor/tiny_mce/tiny_mce.js"></script>';
			echo'<script src="'.C_HD_l.'library/textEditor/tinyMCE_init.js"></script>';
		echo'
		<div class="send" id="send">
			<input type="text" id="topic" placeholder="тема письма"><br><br>
			<textarea class="text textEdit_tinyMCE" id="text" placeholder="текст рассылки"></textarea><br>
			<button class="buttonSend" id="buttonSend">Разослать</button>
		</div>';
	}
}

$page=new HTMLpageAdminCVR($config='./../config.php');

$page->head=<<<INS

<title>testemail - Admin</title>

INS;
$page->header=<<<INS



INS;
$page->section=<<<INS



INS;
$page->footer=<<<INS



INS;

$page->writePage();
?>