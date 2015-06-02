<?php
$sotrudniki = new Sotrudniki();
$errMsg = "";
?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

<?php  
    if(isset($_GET['new'])){
        $id = abs((int)$_GET['new']);
        header("Location: /index.php?id=new_sotrudnik");        
    }

    if(isset($_GET['del'])){
        $id = abs((int)$_GET['del']);
        header("Location: /index.php?id=del_sotrudnik&idsotrudnik=" . $id);        
    } 

    if(isset($_GET['edit'])){ // редактирование сотрудника
        $id = abs((int)$_GET['edit']);
        header("Location: /index.php?id=edit_sotrudnik&idsotrudnik=" . $id);
    } 

    // список сотрудников
    require "get_sotrudniki.inc.php";
?>  
</div>