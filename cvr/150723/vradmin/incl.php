<?php
session_start();
include('./config.php');
include('./library/functionsSelf.php');
include('./library/functions.php');

echo'<link rel="stylesheet" href="http://horosho.github.io/css/general.css">';

connectBD($link);
?>