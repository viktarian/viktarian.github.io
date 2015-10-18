<?php
class HTMLpage{
	
	public $head='<title>site</title>'; function Head(){echo $this->head;}
	public $header=''; function header(){echo $this->header;}
	public $section=''; function section(){echo $this->section;}
	public $footer=''; function footer(){echo $this->footer;}
	
	function writePage(){
		$this->writeStart();
		$this->writeHeadStart();
			$this->Head();
		$this->writeHeadConstant();
		$this->writeHeadChange();
		$this->writeHeadEnd();
		$this->writeBodyStart();
			$this->header();
		$this->writeLogo();
		$this->writeBodyConstant1();
			$this->section();
		$this->writeBodyChange1();
			$this->footer();
		$this->writeBodyEnd();
		$this->writeEnd();
	}
	
	function writeStart(){
echo<<<INS
<!doctype html>
<html>

INS;
	}
	function writeHeadStart(){
echo<<<INS

<head>

INS;
	}
	function writeHeadConstant(){
echo<<<INS

<meta charset="utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="css/general.css">

INS;
	}
	function writeHeadChange(){}
	function writeHeadEnd(){
echo<<<INS

</head>

INS;
	}
	function writeBodyStart(){
echo<<<INS

<body>

INS;
	}
	function writeLogo(){}
	function writeBodyConstant1(){
		$this->spanForHideScript();
		$this->writeBodyConstant2();
	}
		function spanForHideScript(){
echo<<<INS
			
<span id="hideScript"></span>

INS;
		}
		function writeBodyConstant2(){}
	function writeBodyChange1(){
		$this->writeBodyChange2();
	}
		function writeBodyChange2(){}
	function writeBodyEnd(){
echo<<<INS

</body>

INS;
	}
	function writeEnd(){
echo<<<INS

</html>
INS;
	}
	//другие функции
	function formAutorization(){
		echo'
<div class="div autorization">
	Авторизируйтесь, пожалуйста.
	<form action="" method="post">
		<div class="login">Ваш логин: <input type="text" name="login"></div>
		<div class="password">Ваш пароль: <input type="password" name="password"></div>
		<div class="enter"><input type="submit" value="Войти"></div>
	</form>
</div>			
';
	}
}

class HTMLpageAdmin extends HTMLpage{
	
	public $head='<title>Admin</title>';
	
	function __construct($config){
		include($config);
		session_start();
	}
	function writeBodyConstant2(){
		//если админ только что вышел
		if(isset($_POST['exitAdmin'])){
			unset($_SESSION['login_admin']);
		}
		if(!isset($_SESSION['login_admin'])){
			//может быть только что были введены данные
			$this->testAutorizationAdmin();
			if(!isset($_SESSION['login_admin'])){
				$this->formAutorization();
				return;
			}
		}
		$this->writeBodyConstant3();
	}
		function writeBodyConstant3(){}
		
	function writeBodyChange2(){
		if(!isset($_SESSION['login_admin'])){
			return;
		}
		$this->writeBodyChange3();
	}
		function writeBodyChange3(){}
	//другие функции
	function testAutorizationAdmin(){
		if (isset($_POST['login'])){
			$login = $_POST['login']; if ($login == '') { unset($login);}
		
			if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
			if (empty($login) or empty($password)){
				echo 'Вы ввели не всю информацию, венитесь назад и заполните все поля!';
				return;
			}
			$login = stripslashes($login);
			$login = htmlspecialchars($login);
			$password = stripslashes($password);
			$password = htmlspecialchars($password);
			//удаляем лишние пробелы
			$login = trim($login);
			$password = trim($password);
			if ($login!==C_Admin_login or $password!==C_Admin_password ){
				echo 'Извините, введённый вами логин или пароль неверный.';
				return;
			}
			else {
				//если пароли совпадают, то запускаем админу сессию!
				$_SESSION['login_admin']=$login;
			}
		}
	}
	function echoExitAdmin(){
		echo'
<!-- выход из админки -->
<div class="exitAdmin">
	<form action="" method="post">
		<input type="hidden" name="exitAdmin">
		<input type="submit" value="ВЫЙТИ ИЗ АДМИНКИ">
	</form>
</div>
';	
	}
}

class HTMLpageUser extends HTMLpage{
	
	public $head='<title>User</title>';
	
	function __construct($config){
		include($config);
		session_start();
	}
	function writeBodyConstant2(){
		$this->writeBodyConstant3();
	}
		function writeBodyConstant3(){}
	function writeBodyChange2(){
		$this->writeBodyChange3();
	}
		function writeBodyChange3(){}
}
?>