<?php
session_start();
include('./config.php');
include('./library/functionsSelf.php');
include('./library/functions.php');

//echo'<link rel="stylesheet" href="http://horosho.github.io/css/general.css">';

echo'

	<link rel="stylesheet" href="general.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="general.js"></script>
	<script src="http://tinymce.cachefly.net//4.1/tinymce.min.js"></script>
	<script>tinymce.init({selector:"textarea"});</script>
';

connectBD($link);
?>