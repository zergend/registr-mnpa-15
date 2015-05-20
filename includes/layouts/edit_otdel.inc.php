<?php
$otdel = new Otdels();

// берем id из адресной строки
if(isset($_GET['idotdel'])) $id = abs((int)$_GET['idotdel']);

$editOtdel = $otdel->getForEdit($id);
foreach($editOtdel as $row){
    foreach ($row as $i=>$value) {
        if($i == 'name'){
            $name = $value;
        }
    } 
}
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<div class="alert alert-dismissible alert-info">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Старое название отдела: </strong> <?php echo $name; ?>
</div>

<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Изменить название отдела:</legend>
        <div class="form-group has-success">
            <label for="inputSuccess" class="col-lg-2 control-label">Новое название:</label>
            <div class="col-lg-8">
                <input class="form-control" id="inputSuccess" name="newname" value="<?php echo $name;?>"  type="text" />
            </div>
            <div class="col-lg-2">
               <button type="submit" class="btn btn-primary btn-sm">Изменить</button>                
            </div>   
        </div>
    </fieldset>
</form>
</div>
    
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $n = trim($otdel->clearStr($_POST["newname"]));
    if(!$otdel->edit($id, $n)){
        $errMsg = "Ошибка при изменении отдела!";
        echo "Ошибка: " . $errMsg;
    }else{
        header("Location: /index.php?id=otdels");
        // exit; 
    }   
    
}
