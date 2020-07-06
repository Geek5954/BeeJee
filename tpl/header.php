<!DOCTYPE html>
<html>
<head>
	<title>Задачи</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="navbar navbar-expand navbar-dark bg-dark col-md-12 col-12">
				<ul class="navbar-nav col-lg-4 col-xs-4 col-sm-4 col-md-4 col-4">
					<li class="nav-item"><a href="/index.php" class="nav-link">Главная</a></li>
					<li class="nav-item"><a href="?sorting=login" class="nav-link">Имя</a> </li>
					<li class="nav-item"><a href="?sorting=mail" class="nav-link">Почта</a></li>
					<li class="nav-item"><a href="?sorting=status" class="nav-link">Статус</a></li>
				</ul>
				<div class="col-lg-8 col-xs-8 col-sm-8 col-md-8 col-8 text-right">
					<a href="?option=add"> <button class="btn btn-outline-light" type="button">Добавить задачу</button></a>
					<button class="btn btn-outline-light mr-sm-2"  type="button"><?php
					if (isset($_SESSION['user'])) {
						echo '<a href="?option=exits">Выйти</a>';
					}else{
						echo '<a href="?option=login">Авторизация</a>';
					}?> </button>
				</div>

			</div>
