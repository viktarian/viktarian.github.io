//я бы сказал, ядро аякса
function ajaxWithData(url,result_id,data){
	//var
	// Отсылаем паметры
		$.ajax({
			type: 'POST',
			dataType: 'html', //Тип данных 
			url: url,
			data: data,
			// Выводим то, что вернул PHP
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$(result_id).empty();
				//и выводим ответ php скрипта
				$(result_id).append(html);
			}
		})
};

$(document).ready(function(){
	$('#mainnav-one').click( function(){
		var url = url || 'testPages/main.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});
$(document).ready(function(){
	$('#mainnav-one').click( function(){
		var url = url || 'testPages/main.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});
$(document).ready(function(){
	$('#mainnav-two').click( function(){
		var url = url || 'testPages/job.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});
$(document).ready(function(){
	$('#mainnav-three').click( function(){
		var url = url || 'testPages/life.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});
$(document).ready(function(){
	$('#mainnav-four').click( function(){
		var url = url || 'testPages/service.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});
$(document).ready(function(){
	$('#mainnav-five').click( function(){
		var url = url || 'testPages/contact.html';
		var data = '';
		var result_id = '#result_div';
		//sent
		ajaxWithData(url,result_id,data);
	});
});