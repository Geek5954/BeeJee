<?php 
if ($_POST["add"]) {   
    $this->get_edit($user=$_POST["user"],$mail=$_POST["mail"],$text=$_POST["task"]);
}
 ?>
  <div class="col-sm-12">
    <div class="row">
    	<a href="?option=content">Назад</a>
        <div class="tasks">
        	<form method="POST" accept-charset="utf-8">
        		<div class="tasksName">
        			Имя: <span class="task"><input type="text" name="user"></span> 
        			Почта: <span class="task"><input type="text" name="mail" ></span></div>
            <hr>
            <div class="context">Описание</div>
            <div class="tasksText"><textarea  name="task"></textarea></div>
        </div>
    </div>
    <input type="submit" class="btn btn-outline-dark" name="add" value="Сохранить задачу">
            	</form>
     </div>
  </div>

</div>