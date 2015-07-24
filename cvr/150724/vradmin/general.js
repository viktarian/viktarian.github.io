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

/* $(document).ready(function(){
	$('#materials').click( function(){
		var url = 'materials.php';
		var data = '';
		var result_id = '#divDynamic';
		//sent
		ajaxWithData(url,result_id,data);
	});
}); */

//раскрываем последние материалы
$(document).ready(function(){$('#materials').click( function(){ajaxWithData(url='materials.php',result_id='#divDynamic',data='');});});

//добавить новый материал
$(document).ready(function(){
	$('#addMaterial').click( function(){
		var url = 'addMaterial.php';
		var data = '';
		var result_id = '#divDynamic';
		//sent
		ajaxWithData(url,result_id,data);
	});
});

//test
$(document).ready(function(){
	$('#form1').click( function(){
		alert('form1');
	});
});
$(document).ready(function(){
	$('#form2').click( function(){
		alert('form2');
	});
});

function func(){
	alert('form22');
};

function material(idNote){
	/* alert(idNote); */
	ajaxWithData(url='material.php',result_id='#material',data='id_note='+idNote);
	location.hash='mater';
	//window.location.hash = 'mater';
	//$(window).scrollTop($('mater').offset().top);
	//mater.scrollTop = 9999;
};

function addMaterial(){
	title=document.getElementById('addTitle').value;
	text=document.getElementById('addText').value;
	/* alert(title); */
	ajaxWithData(url='script.php',result_id='#divDynamic',data='addTitle='+title+'&addText='+text);
}