<?php include('incl.php');?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>CVR - admin</title>
	<link rel="stylesheet" href="general.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="general.js"></script>
</head>
<body>

<!-- 4. Блок №4. Презентационный блок -->
<div class="class"><h1>Центр выгодных решений</h1></div>

<!-- авторизация -->
<div class="autorizationAdmin"><?php autorizationAdmin();//log in?></div>

<!-- 5. Блок №5. Дополнительная навигация -->
<div class="class"><a href="" target="blank">Консоль управления - в ожидании</a></div>
<div class="class"><a href="http://cvr.by/" target="blank">Перейти на сайт</a></div>
<div class="exitAdmin"><?php exitAdmin();//log out?></div>
<br>

<!-- 7. Блок №7. Основное меню -->
<div class="hrefs">
	<a href="" target="blank" id="materials">Материалы - в ожиданииb</a><br>
	<a href="" target="blank">Комментарии - в ожидании</a><br>
	<a href="" target="blank">Разделы - в ожидании</a><br>
	<a href="" target="blank">Метки - в ожидании</a><br>
	<a href="" target="blank">Менеджер файлов - в ожидании</a><br>
	<a href="" target="blank">Менеджер изображений - в ожидании</a><br>
	<a href="" target="blank">Пользователи - в ожидании</a><br>
</div>
<br>

<div class="divDynamic" id="divDynamic">
	<!-- 6. Блок №6. Добавить материал -->
	<div class="rightCol">
		<a href="" target="blank">Добавить материал - в ожидании</a><br>
	</div>

	<!-- 1. Блок №1. Материалы -->
	<div class="rightCol">
		<a href="" target="blank">Блок №1. Материалы - в ожидании</a><br>
	</div>

	<!-- 2. Блок №2. Комментарии -->
	<div class="rightCol">
		<a href="" target="blank">Блок №2. Комментарии - в ожидании</a><br>
	</div>

	<!-- 3. Блок №3. Статистика -->
	<div class="rightCol">
		<a href="" target="blank">Блок №3. Статистика - в ожидании</a><br>
	</div>
</div>
	
</body>
</html>