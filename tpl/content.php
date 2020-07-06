    <div class="col-sm-12">
        <?php 
        if (isset($_POST['admedit'])) {
           $this->adm($_POST["vt"],$_POST["text"],$_POST['num']);}
       foreach ($tasks as $row) :?>
        <div class="row">
            <div class="tasks">
                <form method="POST">     
                    <div class="tasksName">Имя пользователя: <span class="task"><?php echo $row['login'] ?></span> Email: <span class="task"><?php echo $row['mail'] ?></span> Статус: <span class="task"><?php if ($_SESSION['user']=="admin") {
                        echo '<select name="vt">
                        <option selected>'.$row['status'].'</option>
                        <option value="Выполнено">Выполнено</option> 
                        <option value="Не выполнено">Не выполнено</option>
                        </select>';
                    }
                    else{ echo $row['status'];}?></span></div>
                    <hr>
                    <div class="context">Текст задачи</div>
                    <div class="tasksText"><?php if ($_SESSION['user']=="admin") {
                        echo '<textarea name="text">'.$row['texts'].'</textarea>';
                    }
                    else{ echo $row['texts'];} ?>
                    <?php if ($_SESSION['user']=="admin") {
                        echo '<input type="submit" class="btn btn-outline-dark" name="admedit" value="Сохранить">';
                    }
                    echo '<select class="number" name="num">
                    <option value="'.$row['id'].'">'.$row['id'].'</option>
                    </select>';
                    ?>
                </div>
            </form>
            <div class="history">
                <?php if ($row['history']!=null) {
                echo ' <hr>
                <div class="context">Отметка</div> 
                
                   <div class="historyText"><span class="context"><span>'; echo $row['history']; echo "</span></div>";}?>
                </div>
            </div>
        </div>
    <?php endforeach;?> 
</div>
</div>

</div>
<div class="container">
    <div class="row justify-content-center my-4">
        <?php
        echo $_SESSION['navigation'];
        ?>
    </div>
</div>
</body>
</html>