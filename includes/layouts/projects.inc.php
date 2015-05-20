<?php
$projects = new Projects();
$errMsg = "";
?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

<?php  

    if(isset($_GET['new'])){
        $id = abs((int)$_GET['new']);
        header("Location: /index.php?id=new_project");        
    }

    if(isset($_GET['del'])){
        $id = abs((int)$_GET['del']);
        header("Location: /index.php?id=del_project&idproject=" . $id);        
    } 

    if(isset($_GET['edit'])){ // редактирование проекта
        $id = abs((int)$_GET['edit']);
        header("Location: /index.php?id=del_project&idproject=" . $id);
    } 

    // список проектов МНПА
    require "get_projects.inc.php";
?>  
</div>