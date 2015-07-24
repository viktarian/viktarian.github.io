<?php
/////////echo dirname(__FILE__);
//bd
	$bd_server = 'localhost';

	//real site
	/* $bd_user='rlt_mv';
	$bd_pass='3X8?K0*ukG$U'; */

	//localhost
	$bd_user='root';
	$bd_pass='';

	$bd_name='cvr';

//CONSTANTS (С - Constant; t - text; ru - russian; s - single; p - plural)
define ('C_DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
//вход в админку
define('C_Admin_login','admin');
define('C_Admin_password','admin');
	
	//home directory
//all right
//$sitePath = realpath(dirname(__FILE__) . C_DS) . C_DS;var_dump($sitePath);
/*
define ('C_HD', $sitePath); // путь к корневой папке  
*/
		//real site
/* define('C_HD', '/home/rlt/public_html/aukcion');//путь к корневой папке
define ('C_HD_l', '/aukcion/');//путь к корневой папке, заданной через настройки сервера	 */ 

		//localhost
define('C_HD', 'D:\xampp\htdocs\remrep\rltby\site\aukcion');//путь к корневой папке
define ('C_HD_l', '/remrep/rltby/site/aukcion/');//путь к корневой папке, заданной через настройки сервера

	//
define('C_t_ru_s_table1', 'Область');define('C_t_ru_p_table1', 'Области');
	define('C_t_ru_s_table1sub1', 'Район');define('C_t_ru_p_table1sub1', 'Районы');
define('C_t_ru_s_table2', 'Раздел');define('C_t_ru_p_table2', 'Разделы');
define('C_t_ru_s_table3', 'Вид аукционов');define('C_t_ru_p_table3', 'Виды аукционов');
	//
define('C_t_ru_s_field', 'Заголовок');
define('C_t_ru_s_field1', 'Начальная цена');
	define('C_t_ru_s_field1sub1', 'от');
	define('C_t_ru_s_field1sub2', 'до');
define('C_t_ru_s_field2', 'Дата и время проведения аукциона');
?>