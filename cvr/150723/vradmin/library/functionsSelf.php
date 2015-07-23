<?php
//connect to BD
function connectBD(&$link){
	//в подключающемся файле обязательно должен быть подключен конфиг
	global $bd_server,$bd_user,$bd_pass,$bd_name;
	if (!isset($bd_server)) {exit('issue1 - problem with server');}
	if (!isset($bd_user)) {exit('issue2');}
	if (!isset($bd_pass)) {exit('issue3');}
	if (!isset($bd_name)) {exit('issue4');}
	$link = mysqli_connect($bd_server,$bd_user,$bd_pass,$bd_name);
	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	/* change character set to utf8 */
	mysqli_set_charset($link, 'utf8');
}

//вход/выход в админку
function autorizationAdmin(){
	//если админ только что вышел
	if(isset($_POST['exitAdmin'])){
		unset($_SESSION['login_admin']);
	}
	//если в сессии нет сохраненных данных
	if(!isset($_SESSION['login_admin'])){
		//может быть только что были введены данные
		if (isset($_POST['login'])){
			$login = $_POST['login']; if ($login == '') { unset($login);}
		
			if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
			if (empty($login) or empty($password)){
				exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
			}
			$login = stripslashes($login);
			$login = htmlspecialchars($login);
			$password = stripslashes($password);
			$password = htmlspecialchars($password);
			//удаляем лишние пробелы
			$login = trim($login);
			$password = trim($password);
			if ($login!==C_Admin_login or $password!==C_Admin_password ){
				exit ("Извините, введённый вами логин или пароль неверный.");
			}
			else {
				//если пароли совпадают, то запускаем админу сессию!
				$_SESSION['login_admin']=$login;
			}
		}
		//иначе предлагаем авторизоваться
		else{
			echo '
			<div class="autorization">
				Авторизируйтесь, пожалуйста.
				<form action="" method="post">
					<div class="login">Ваш логин: <input type="text" name="login">
					<div class="password">Ваш пароль: <input type="password" name="password"></div>
					<div class="enter"><input type="submit" name="submit" value="Войти"></div>
				</form>
			</div>
			';
			exit();
		}
	}
}
function exitAdmin(){
	echo'
	<!-- если удалось войти, должна быть возможность выйти -->
		<!-- выход из админки -->
		<div>
			<form action="" method="post">
				<input type="hidden" name="exitAdmin">
				<input type="submit" value="ВЫЙТИ ИЗ АДМИНКИ">
			</form>
		</div>';	
}
// /вход/выход в админку
?>