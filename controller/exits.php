<?php 
class exits extends core
{
	
	function __construct()
	{
		setcookie ("user", "", time()-14800);
		session_destroy();
		echo "<script>window.location.href = 'index.php';</script>";
	}
}


 ?>