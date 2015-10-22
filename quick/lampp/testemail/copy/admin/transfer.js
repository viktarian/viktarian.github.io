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

function checkbox(idNote){
	if(document.getElementById('check'+idNote).checked){
		check=1;
	}
	else{check=0;}
	var data='process=script1'+
		'&send='+check+
		'&idNote='+idNote;
	transfer(data);
}

$(document).ready(function(){
	$('#buttonSend').click( function(){
		// var text=document.getElementById('text').value;
		// tinyMCE.get('editDescription').getContent();
		var text=tinyMCE.get('text').getContent();
		var topic=document.getElementById('topic').value;
		var data='process=script2'+
			'&topic='+topic+
			'&text='+text;
		transfer(data);
	});
});