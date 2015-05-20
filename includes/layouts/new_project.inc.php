<?php
$project = new Projects();
$otdel = new Otdels();
$sotrudniki = new Sotrudniki();
?>
<script type="text/javascript">
    function setOtdel(i, n){
        document.getElementById('ddOtdel').value = n
        document.getElementById('hiddenIdOtdel').value = i
    }
</script>
<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
<div class="center-block">
<h2>Новый проект муниципального нормативного правового акта</h2>
</div>
<form class="form-horizontal" method="post">
  <div class="form-group">
    <label class="control-label col-xs-3" for="lastName">Название:</label>
    <div class="col-xs-9">
      <input type="text" class="form-control" id="name" placeholder="Введите название" name="name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">Описание:</label>
    <div class="col-xs-9">
        <textarea row="3" class="form-control" id="description" placeholder="Введите описание для проекта" name="description"></textarea>
    </div>
  </div>
  
<div class="form-group">
 <label class="control-label col-xs-3">Дата начала:</label>
  <div class="col-xs-3 input-group date" id="datetimepicker5">
    <input type="text" class="form-control" />
    <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
       
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker5').datetimepicker(
          {pickTime: false, language: 'ru'}
        );
      });
    </script>
</div> 
  
<div class="form-group">
<label class="control-label col-xs-3">Разработчики:</label>
<div class="col-xs-9">
    <?php 
    $listSotrudniki = $sotrudniki->getById("6, 10");
    require "get_sotrudniki_sl.inc.php";     
    ?>
</div>
</div>

<div class="form-group">

<div class="col-xs-offset-3 col-xs-8">  
<a class="btn btn-primary btn-sm" href="#" role="button">Добавить разработчика</a>
</div>
</div>
<!--

<div class="form-group">
<label class="control-label col-xs-3">Эксперты:</label>
<div class="col-xs-9">   
    <?php 
    $listSotrudniki = $sotrudniki->getById("1, 3");
    require "get_sotrudniki_sl.inc.php";     
    ?>
</div>
</div>

<div class="form-group">
<div class="col-xs-offset-3 col-xs-8">  
<a class="btn btn-primary btn-sm" href="#" role="button">Добавить эксперта</a>
</div>
</div>

<div class="form-group">
<label class="control-label col-xs-3">Файлы:</label>
<div class="col-xs-9">   
    <?php 
    $listSotrudniki = $sotrudniki->getById("0");
    require "get_sotrudniki_sl.inc.php";     
    ?>
</div>
</div>

<div class="form-group">
<div class="col-xs-offset-3 col-xs-8">  
<input type="file" id="exampleInputFile">
<a class="btn btn-primary btn-sm" href="#" role="button">Добавить файл</a>
</div>
</div>
-->


<hr />    
<div class="form-group">

<div class="col-xs-offset-3 col-xs-8">  
<button type="submit" class="btn btn-primary btn-sm">Сохранить</button>  
<a class="btn btn-primary btn-sm" href="/index.php?id=pro_site&id_pro=" role="button">Проект на сайт</a>
<a class="btn btn-primary btn-sm" href="/index.php?id=pro_end&id_pro=" role="button">Завершить проект</a>
<a class="btn btn-primary btn-sm" href="/index.php?id=projects" role="button">Отмена</a>
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
