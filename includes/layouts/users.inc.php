<?php
$users = new Users();
$errMsg = "";
?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

<?php  

    if(isset($_GET['new'])){
        $id = abs((int)$_GET['new']);
        header("Location: /index.php?id=new_user");        
    }

    if(isset($_GET['del'])){
        $id = abs((int)$_GET['del']);
        header("Location: /index.php?id=del_user&idu=" . $id);        
    } 

    if(isset($_GET['edit'])){ // редактирование пользователя
        $id = abs((int)$_GET['edit']);
        header("Location: /index.php?id=edit_user&idu=" . $id);
    } 

    // список пользователей
    require "get_users.inc.php";
?>  
</div>