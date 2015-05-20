<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Авторизация</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин">
          </div>
          <div class="form-group">
            <label for="pwd">Пароль:</label>
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Введите пароль">
          </div>          
          <button type="submit" class="btn btn-primary">Войти</button>
        </form>        
      </div>
      <div class="modal-footer">
        <a  href="<?php echo $_SERVER['REQUEST_URI'];?> " class="btn btn-primary">Войти</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмета</button>        
      </div>
    </div>
  </div>
</div>
   
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login = trim($_POST["login"]); // ???глобально - имя пользователя???
    $password = trim($_POST["pwd"]);
    $loginUser = new Users();
    $resultLogIn = $loginUser->logIn($login, $password);
    if($resultLogIn){
        // echo "Похоже, логин/пароль верные!";
        $_SESSION[$login]=true;
    }else{
        $_SESSION[$login]=false;
        // echo "Что-то не правильно!";
    }
}

  
?>
    
  </body>
</html>