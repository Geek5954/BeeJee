<?php 
class model
 {
	protected $bd;
	public function __construct()
	 {
		$this->bd = new PDO('mysql:host=localhost;dbname=beejee;charset=utf8', "root", ""); 
	 }
	public function get_tasks()
     {
		if (isset($_SESSION['begin'])) {
			$_SESSION['begin'] = isset($_GET['p'])?intval($_GET['p']):$_SESSION['begin'];
		}else{$_SESSION['begin']="0";}
		
		if (isset($_SESSION['sorting'])) {
			$_SESSION['sorting'] = isset($_GET['sorting'])?trim(htmlspecialchars(($_GET['sorting']))):$_SESSION['sorting'];
		}else{$_SESSION['sorting']="id ASC";}
		$limit = 3;
		$result=$this->bd->query('SELECT * FROM `tasks` ORDER BY '.$_SESSION['sorting'].' LIMIT '.$_SESSION['begin'].','.$limit.'');
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
			$task[]=$row;
		}
		$task_result=$this->bd->query('SELECT COUNT(*) as `count` FROM `tasks`');
		$task_count = $task_result->fetch(PDO::FETCH_OBJ)->count;
		$pageCount = ceil($task_count/$limit);
		$navigation = NULL;
		for($i=0; $i<$pageCount; $i++) {
			$navigation .= '<a href="index.php?p='.($i*$limit).'">'.($i+1).'</a>';
		}
		$_SESSION['navigation']=$navigation;
		return $task;
	 }
	public function get_add($user,$mail,$text)
	 {
		$user=trim(htmlspecialchars($user));
		$mail=trim(htmlspecialchars($mail));
		$text=trim(htmlspecialchars($text));
		if ($user==null){
			echo "<script>alert('Заполните имя');</script>";
		}else{
			if ($text==null){
			echo "<script>alert('Заполните Описание');</script>";
		}else{
			if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$query=$this->bd->query("INSERT INTO `tasks` (`login`, `mail`, `texts`) VALUES ('".$user."','".$mail."','".$text."')");
			echo "<script>alert('Задача добавлена');</script>";
		}
		else
			{echo "<script>alert('Ошибка email не валиден');</script>";}
		}
		}
		
		
		
		
	 }
	public function get_log($user,$password)
	 {
		$user=trim(htmlspecialchars($user));
		$password=trim(htmlspecialchars($password));
		if ($user==null) {
			echo "<script>alert('Заполните поле логин');</script>";
		}else{
			if ($password==null) {
				echo "<script>alert('Заполните поле пароль');</script>";
			}else{
				$query=$this->bd->query('SELECT * FROM `login`');
		$row=$query->fetch(PDO::FETCH_ASSOC);
		if ($row['login'] == $user and $row['password'] == $password){
			$_SESSION['user']=$row['login'];
			echo "<script>window.location.href = 'index.php';</script>";

		}else{
			echo "<script>alert('Неправильные реквизиты доступа');</script>";}
		}	
			}
		}
		
    public function get_adm($vt,$text,$num) 
	 {
			$vt=trim(htmlspecialchars($vt));
			$text=trim(htmlspecialchars($text));
			$id=trim(htmlspecialchars($num));
			if (isset($_SESSION['user'])=='admin') {
			$que=$this->bd->query("SELECT * FROM `tasks` WHERE id='".$id."'");
			$rowrt=$que->fetch(PDO::FETCH_ASSOC);
			if ($text==$rowrt['texts']) 
			{
				$queryf=$this->bd->query("UPDATE `tasks` SET `texts`='".$text."',`status`='".$vt."' WHERE id='".$id."'");
				echo "<script>alert('Изменено');
				window.location.href = 'index.php';
				</script>";
			}else{
				$queryf=$this->bd->query("UPDATE `tasks` SET `texts`='".$text."',`status`='".$vt."',`history`='Отредактировано администратором' WHERE id='".$id."'");
				echo "<script>alert('Изменено');
				window.location.href = 'index.php';
				</script>";
			}
		}
		else
		{
			echo "<script>window.location.href = 'index.php?option=login';</script>";
		}

	 }






	 }
?>