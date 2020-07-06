<?php 
session_start();
function __autoload($class)
{
	if (file_exists("controller/".$class.".php")) {
		require_once "controller/".$class.".php";
	}elseif (file_exists("moduls/".$class.".php")) {
		require_once "moduls/".$class.".php";}
}
if ($_GET['option']) {
	$classe=trim(htmlspecialchars($_GET['option']));
}
else
{
$classe='content';
	
}
if (class_exists($classe)) {
	$obj=new $classe;
	$obj->get_body($classe);
}
else
{
	exit("Нет данных для входа");
}

 ?>