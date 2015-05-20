<?php
// error_reporting(E_ALL);
$otdel = new Otdels();
$errMsg = "";
?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

<?php    
    if($_SERVER["REQUEST_METHOD"]=="POST") require "new_otdel.inc.php";
    if(isset($_GET['del'])){
        $id = abs((int)$_GET['del']);
        header("Location: /index.php?id=del_otdel&idotdel=" . $id);        
    } // require "del_otdel.inc.php";

    if(isset($_GET['edit'])){ // изменение отдела
        $id = abs((int)$_GET['edit']);
        header("Location: /index.php?id=edit_otdel&idotdel=" . $id);
    } 

    // список отделов
    require "get_otdels.inc.php";
?>
   
    <form class="form-horizontal" method="post">
    <fieldset>
        <legend>Добавить отдел:</legend>
        <div class="form-group has-success">
            <label for="inputSuccess" class="col-lg-2 control-label">Название отдела:</label>
            <div class="col-lg-8">
                <input class="form-control" id="inputSuccess" type="text" name="nameOtdel" />
            </div>
            <div class="col-lg-2">
               <button type="submit" class="btn btn-primary btn-sm">Добавить</button>                
            </div>  
        </div>
    </fieldset>
    </form>   
    
</div>