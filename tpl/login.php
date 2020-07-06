<?php 
if ($_POST["login"]) {   
$this->get_login($_POST["user"],$_POST["password"]);
}
 ?>
  <div class="col-sm-12">
    <div class="row">
    	<a href="?option=content">Назад</a>
        <div class="tasks">
        	<form method="POST" accept-charset="utf-8">
        		<div class="tasksName">
        			login: <span class="task"><input type="text" name="user" required></span> 
        			Password: <span class="task"><input type="password" name="password" required></span></div>
    </div>
    <input type="submit" class="btn btn-outline-dark" name="login" value="Войти">
            	</form>
     </div>
  </div>

</div>