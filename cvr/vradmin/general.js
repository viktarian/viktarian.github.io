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
	$('#materials').click( function(){
		var url = url || 'materials.php';
		var data = '';
		var result_id = '#divDynamic';
		//sent
		ajaxWithData(url,result_id,data);
	});
});