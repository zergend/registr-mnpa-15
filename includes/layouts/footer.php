<!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Авторизация</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" class="form-control" id="login" name="login" autofocus="" placeholder="Введите логин">
          </div>
          <div class="form-group">
            <label for="pwd">Пароль:</label>
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Введите пароль">
          </div>          

                
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Войти</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>     
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Выход из системы</h4>
      </div>
      <div class="modal-body">           
        <div class="alert alert-warning" role="alert">
            <p>После выхода из системы станут не доступны возможности добавления / редактирования!</p>
        </div>                
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Выйти</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>     
      </div>
      </form>
    </div>
  </div>
</div>
            
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login = trim($_POST["login"]); 
    $password = trim($_POST["pwd"]);
    $loginUser = new Users();
    $resultLogIn = $loginUser->logIn($login, $password);
    if($resultLogIn){
        // echo "логин/пароль верные!";
        $_SESSION["user"]=$login;
        $_SESSION["role"]=$loginUser->getRole($login);
        header("Location: " . $_SERVER['REQUEST_URI']);        
    }else{
        $_SESSION["user"]='';
        $_SESSION["role"]='Гость';
        header("Location: /");
    }    
}
 
?>
    
  </body>
</html>