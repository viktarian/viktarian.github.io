var hello_ru='<h1>Здравствуйте, меня зовут Виктор)</h1>';
var hello_en='<h1>Hallo, my name is Viktar)</h1>';
var aboutMe_ru='<p>Коротко о себе: в первой половине дня - программист, во второй - <a target="blank" href="http://repetitor.github.io/">преподаватель</a></p><p>Мои интересы частично отражены <a target="blank" href="http://horosho.github.io/">тут</a></p><p>Моя биография частично отражена <a target="blank" href="http://repetitor.github.io/career.html">тут</a></p>';
var aboutMe_en='<p>Some words about me: in the first half of the day I am programmer, in the second - <a target="blank" href="http://repetitor.github.io/">teacher</a></p><p>My interests are partly reflected <a target="blank" href="http://horosho.github.io/">here</a></p><p>My biography is partially reflected <a target="blank" href="http://repetitor.github.io/career.html">here</a></p>';

function ru(){
	document.getElementById('hello').innerHTML = hello_ru;
	document.getElementById('aboutMe').innerHTML = aboutMe_ru;
}
function en(){
	document.getElementById('hello').innerHTML = hello_en;
	document.getElementById('aboutMe').innerHTML = aboutMe_en;
}