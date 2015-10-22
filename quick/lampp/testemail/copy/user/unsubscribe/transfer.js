function transfer(data,result_id,url){
	var result_id = result_id || '#divDynamic';
	// Отсылаем паметры
		$.ajax({
			type: 'POST',
			dataType: 'html', //Тип данных 
			data: data || 0,
			url: url || 'script.php',
			
			// Выводим то, что вернул script
			success: function(html){
				//предварительно очищаем нужный элемент страницы
				$(result_id).empty();
				//и выводим ответ скрипта
				$(result_id).append(html);
			}
		})
};

function unsubscribeYes(id){
	var idNote=id;
	var data='id='+idNote;
	transfer(data);
	// document.getElementById('divDynamic').innerHTML = 'Вы собираетесь отписать абонента под номером '+id+'.';
}

/* $(document).ready(function(){
	$('#yes').click( function(){
		document.getElementById('divDynamic').innerHTML = 'Вы успешно отписаны.';

		// var text=document.getElementById('text').value;
		// var data='process=script2'+
			// '&text='+text;
		// transfer(data);
	});
}); */

$(document).ready(function(){
	$('#no').click( function(){
		document.getElementById('divDynamic').innerHTML = 'Вы все еще подписаны.';
	});
});