//like button "submit" for senting datum form's
function likeSubmit(result_id,form_id,url) {
	jQuery.ajax({ 
		url:     url, //Адрес подгружаемой страницы 
		type:     "POST", //Тип запроса 
		dataType: "html", //Тип данных 
		data: jQuery("#"+form_id).serialize(),
		success: function(response) { //Если все нормально 
			document.getElementById(result_id).innerHTML = response; 
		}, 
		error: function(response) { //Если ошибка 
			document.getElementById(result_id).innerHTML = "Ошибка при отправке формы"; 
		}
	}); 
};

//изменение списка подразделов при выборе раздела
 $(document).ready(function(){
	$('#select_id_table1').click( function(){
		//Получаем параметры
		var data = $('#select_id_table1').val();
		var url = $('#subfile_table1sub1').val();
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			data: "data="+data,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#div_id_table1sub1').empty();
				//и выводим ответ php скрипта
				$('#div_id_table1sub1').append(html);
			}
		})
	});
});

/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
//со стороны админа

//click on button "add note"
 $(document).ready(function(){
	$('#button_add_note').click( function(){
		var url = 'add_note1.php';
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#add_note1').empty();
				//и выводим ответ php скрипта
				$('#add_note1').append(html);
			}
		})
	});
});

//после клика по полю для ввода заголовка
 $(document).ready(function(){
	$('#title').click ( function(){
		var url = 'add_note2.php';
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#add_note2').empty();
				//и выводим ответ php скрипта
				$('#add_note2').append(html);
			}
		})
	});
});
//изменение списка подразделов при выборе раздела
 $(document).ready(function(){
	$('#selectForAddNote_id_table1').click( function(){
		//Получаем параметры
		var data = $('#selectForAddNote_id_table1').val();
		var url = $('#subfileForAddNote_table1sub1').val();
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			data: "data="+data,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#divForAddNote_id_table1sub1').empty();
				//и выводим ответ php скрипта
				$('#divForAddNote_id_table1sub1').append(html);
			}
		})
	});
});

//change table
	//click on button "initialise edit table"
 $(document).ready(function(){
	$('#start_change_table1').click( function(){
		var url = 'change_table1.html';
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#div_change_table1').empty();
				//и выводим ответ php скрипта
				$('#div_change_table1').append(html);
			}
		})
	});
});
	//finish function submit

	
	
 $(document).ready(function(){
	$('#but_add').click( function(){
		//Получаем параметры
		/* var data = $('#id_note').val(); */
		var data = $('#title').val();
		var url = 'change_table1_script.php';
		/* var url = $('#subfileForAddNote_table1sub1').val(); */
		// Отсылаем паметры
		$.ajax({
			type: 'POST',
			url: url,
			data: "data2="+data,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$('#div_change_table1').empty();
				//и выводим ответ php скрипта
				$('#div_change_table1').append(html);
			}
		})
	});
});