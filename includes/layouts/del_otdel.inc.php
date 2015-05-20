<?php
$otdel = new Otdels();

// берем id из адресной строки
if(isset($_GET['idotdel'])) $id = abs((int)$_GET['idotdel']);

$editOtdel = $otdel->getForEdit($id);
foreach($editOtdel as $row){
    foreach ($row as $i=>$value) {
        if($i == 'name') $name = $value;        
    } 
}
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Вы уверены, что хотите удалить отдел?</h4>
    <p>Название отдела: <strong><?php echo $name; ?></strong></p>
</div>

<form class="form-horizontal" method="post">
    <fieldset>
        <legend>Удалить отдел:</legend>
        <div class="form-group has-success">
            <label for="inputSuccess" class="col-lg-2 control-label">Название отдела:</label>
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
    if(!$otdel->remove($id)){
        $errMsg = "Ошибка при удалении отдела!";
        echo "Ошибка: " . $errMsg;
    }else{
        header("Location: /index.php?id=otdels");
        // exit; 
    }   
    
}
