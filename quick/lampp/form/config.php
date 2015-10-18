<?php 
//define
define ('C_DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
//home directory
	//real site
		/* define('C_HD', '/home/cvr/public_html');//путь к корневой папке
		define ('C_HD_l', '/');//путь к корневой папке, заданной через настройки сервера	  */
	//localhost
		define('C_HD', 'D:\xampp\htdocs\test\form');//путь к корневой папке
		define ('C_HD_l', '/remrep/test/form/');//путь к корневой папке, заданной через настройки сервера

		
//подключение к базе
	$bd_server = 'localhost';
	define('C_bd_server',$bd_server);
	
	//real site
	// $bd_user='cvr_start';
	// $bd_pass='Start123123123';
	// $bd_name='cvr_start';
	
	//localhost
	$bd_user='root';
	$bd_pass='';
	$bd_name='poligraff';
	
	define('C_bd_user',$bd_user);
	define('C_bd_pass',$bd_pass);
	define('C_bd_name',$bd_name);

	
//вход в админку
	define('C_Admin_login','admin');
	define('C_Admin_password','admin');
?>