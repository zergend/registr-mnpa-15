<?php
function __autoload($class){
    require '/includes/'.$class.'.class.php';
}
$sotrudnik = new Sotrudniki();

// берем id из адресной строки
if(isset($_GET['idsotrudnik'])) $id = abs((int)$_GET['idsotrudnik']);

$editSotrudnik = $sotrudnik->getForEdit($id);
foreach($editSotrudnik as $row){
    foreach ($row as $i=>$value) {
        if($i == 'f') $name = $value;        
    } 
}
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Вы уверены, что хотите удалить сотрудника?</h4>
    <p>Сотрудник: <strong><?php echo $name; ?></strong></p>
</div>

<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Удалить сотрудника:</legend>
        <div class="form-group has-success">
            <label for="inputSuccess" class="col-lg-2 control-label">Сотрудник:</label>
            <div class="col-lg-8">
                <input class="form-control" id="inputSuccess" name="newname" value="<?php echo $name;?>"  type="text" />
            </div>
            <div class="col-lg-2">
               <button type="submit" class="btn btn-primary btn-sm">Удалить</button>                
            </div>   
        </div>
    </fieldset>
</form>
</div>
    
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    // $n = trim($otdel->clearStr($_POST["newname"]));
    if(!$sotrudnik->remove($id)){
        $errMsg = "Ошибка при удалении отдела!";
        echo "Ошибка: " . $errMsg;
    }else{
        header("Location: /index.php?id=sotrudniki");
        // exit; 
    }   
    
}
