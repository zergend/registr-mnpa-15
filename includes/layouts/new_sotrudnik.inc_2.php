<?php
$sotrudnik = new Sotrudniki();
$otdel = new Otdels();
?>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<h1>Новый сотрудник</h1>
<div class="jumbotron">
<form class="form-inline" method="post">
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <input type="text" class="form-control" id="f" placeholder="Фамилия" name="f">
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <input type="text" class="form-control" id="i" placeholder="Имя" name="i">
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <input type="text" class="form-control" id="o" placeholder="Отчество" name="o">
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<?php
echo "Выберите отдел: ";
$listO = $otdel->getOtdels();
foreach($listO as $row){
    echo '<br><div class="radio">
            <label>
            <input type="radio" name="radioOtdel" '; 
    foreach ($row as $i=>$value) {
        if($i == 'id'){
            echo 'value="'.$value.'">';
        }else{
            echo $value.'</label>'; 
        }
    }
    echo "</div>";
}
?>

</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <input type="text" class="form-control" id="dolzhnost" placeholder="Должность" name="dolzhnost">
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <input type="text" class="form-control" id="dr" placeholder="Дата рождения" name="dr">
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <input type="text" class="form-control" id="phone" placeholder="Телефон" name="phone">
</div>
</div> 
<button type="submit" class="btn btn-primary btn-sm">Добавить</button>  
</form>

</div>
</div>
    
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $f = trim($sotrudnik->clearStr($_POST["f"]));
    $i = trim($sotrudnik->clearStr($_POST["i"]));
    $o = trim($sotrudnik->clearStr($_POST["o"]));
    $dolzn = trim($sotrudnik->clearStr($_POST["dolzhnost"]));
    $otdel = abs((int)$_POST["radioOtdel"]);
    $dr = abs((int)$_POST["dr"]);
    $phone = abs((int)$_POST["phone"]);
    
    if(!$sotrudnik->add($f, $i, $o, $dolzn, $otdel, $dr, $phone)){
        $errMsg = "Ошибка при добавлении сотрудника! Проверьте правильность заполнения полей!";        
?>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4><?php echo $errMsg; ?></h4>
</div>
</div>
<?php
        // echo "Ошибка: " . $errMsg;
    }else{
        header("Location: /index.php?id=sotrudniki");
        // exit; 
    }    
}

