<?php
$sotrudnik = new Sotrudniki();
$otdel = new Otdels();
?>
<script type="text/javascript">
    function setOtdel(i, n){
        document.getElementById('ddOtdel').value = n
        document.getElementById('hiddenIdOtdel').value = i
    }
</script>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<div class="center-block">
<h2>Новый сотрудник</h2>
</div>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label class="control-label col-xs-3" for="lastName">Ф.И.О.:</label>
    <div class="col-xs-3">
      <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию" name="f">
    </div>
    <div class="col-xs-3">
      <input type="text" class="form-control" id="firstName" placeholder="Введите имя" name="i">
    </div>
    <div class="col-xs-3">
      <input type="text" class="form-control" id="firstName" placeholder="Введите отчество" name="o">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">Дата рождения:</label>
    <div class="col-xs-3">
        <input type="text" class="form-control" id="denR" placeholder="Введите дату рождения" name="dr">
    </div>
    <label class="control-label col-xs-3">Телефон:</label>
    <div class="col-xs-3">
        <input type="text" class="form-control" id="phone" placeholder="Введите телефон" name="phone">
    </div>
<!--    <div class="col-xs-3">
      <select class="form-control">
        <option>Год</option>
      </select>
    </div>-->
  </div>
<div class="form-group">

<label class="control-label col-xs-3">Отдел / должность:</label>
<!--<select multiple name="selectOtdel[]">-->
<div class=" col-xs-4">
    <div class="input-group">
      <input type="text" id="ddOtdel" name="dropdownOtdel" class="form-control" aria-label="..." readonly>
      <div class="input-group-btn">
        <button type="button" id="btnOtdel" name="selectOtdel" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Отдел <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
<?php
// echo "Выберите отдел: ";
$listO = $otdel->getOtdels();
foreach($listO as $row){
    foreach($row as $i=>$value){
        if($i == 'name'){
            $newName = $value;
        }else{
            $newID = $value;
        }
    }
    echo '<li><a onclick="setOtdel(\'' . $newID . '\', \''. $newName . '\')" href="#">' . $newName . '</a></li>';
    
}
?>
        </ul>     
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
<!-- </select> -->

<div class="col-xs-5">
    <input type="text" class="form-control" id="dolzhnost" placeholder="Должность" name="dolzhnost">
</div>

</div>

<br />    
<div class="form-group">

<div class="col-xs-offset-3 col-xs-8">  
<button type="submit" class="btn btn-primary btn-sm">Добавить сотрудника</button>  
<a class="btn btn-primary btn-sm" href="/index.php?id=sotrudniki" role="button">Отмена</a>
</div>
<div class="hidden col-xs-1">
    <input type="text" class="form-control" id="hiddenIdOtdel" name="hiddenIdOtdel">
</div>
</div>
</form>

<!--</div>-->
</div>
    
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $f = trim($sotrudnik->clearStr($_POST["f"]));
    $i = trim($sotrudnik->clearStr($_POST["i"]));
    $o = trim($sotrudnik->clearStr($_POST["o"]));
    $dolzn = trim($sotrudnik->clearStr($_POST["dolzhnost"]));
    $otdel = abs((int)$_POST["hiddenIdOtdel"]);
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
