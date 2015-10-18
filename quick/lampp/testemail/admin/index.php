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
echo'
<div class="exitAdmin">';$this->echoExitAdmin();echo'</div>
<table rules="cols">
	<tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>рассылка</td>
	</tr>';
	include('./../library/ClassMySQL.php');
	$mysql=new ClassMySQL();
	$mysql->allNotes2($table='subscription',$arrayCols=array('id','name','email'));
echo'</table>
<div id="divDynamic"></div>
';
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