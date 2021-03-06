<?php
$project = new Projects();
// $otdel = new Otdels();
$sotrudniki = new Sotrudniki();
$idRazr = array();
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
    <input type="text" class="form-control" name="datastart" />
    <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
    <div class="col-xs-1 hidden">
      <input type="text" class="form-control" id="id-razr" name="id-razr" hidden>
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
    <table class="table table-striped table-hover" id="sotrudnikiTable">
        <thead>
            <tr>
                <th width="10%">#</th>
                <th width="80%">Фамилия</th>
                <th width="10%">Удаление</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>

<div class="form-group">

<div class="col-xs-offset-3 col-xs-8">  
<a class="btn btn-primary btn-sm" href="#sotrudnikiModal" role="button" data-toggle="modal" data-target="#sotrudnikiModal">Добавить разработчика</a>
</div>
</div>

<hr />    
<div class="form-group">

<div class="col-xs-offset-3 col-xs-8">  
<button type="submit" class="btn btn-primary btn-sm">Сохранить</button>  
<a class="btn btn-primary btn-sm" href="/index.php?id=projects" role="button">Отмена</a>
</div>
</div>
</form>
</div>
    
<!-- Modal  Sotrudniki-->
<div class="modal fade" id="sotrudnikiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Выбрать сотрудника</h4>
        </div> 
        <div class="modal-body">
        <table class="table table-striped table-hover ">
          <thead>
            <tr>
                <th width="10%"></th>
                <th width="80%"></th>
                <th width="10%"></th>
            </tr>
          </thead>
          <tbody>
                <?php
                $listSotrudniki = $sotrudniki->getSotrudniki();                
                foreach($listSotrudniki as $row){
                    echo "<tr>";                    
                    foreach ($row as $i=>$value) {        
                        if($i == 'id'){
                            echo "<td>";
                            $id = $value;
                            echo $id;
                            echo "</td>";
                        }else{
                            if($i == 'f'){
                                echo "<td>";
                                $name = $value;
                                echo $value;
                                echo "</td>";
                            }
                        }        
                    }
                    echo "<td>";
                     echo '<a href="#" onclick="addRow('. $id . ', \''. $name . '\');return false;">Добавить</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
          </tbody> 
        </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
        </div> 
    </div>
  </div>
</div>    
    
<script type="text/javascript">
    var i="";
    function addRow(id, f){
        i = document.getElementById("id-razr").value;
        var tbody = document.getElementById("sotrudnikiTable").getElementsByTagName("TBODY")[0];
        var row = document.createElement("TR");
        var td1 = document.createElement("TD");
        td1.appendChild(document.createTextNode(id));
        if(i != ""){
            i = i + "," + id; 
        } else {
            i += id; 
        }
        document.getElementById("id-razr").value = i;
        var td2 = document.createElement("TD");
        td2.appendChild (document.createTextNode(f));
        var td3 = document.createElement("TD");        
        var newlink = document.createElement('a');
        newlink.setAttribute('href', 'del_isp.php');
        newlink.appendChild(document.createTextNode("Удалить"));
        td3.appendChild (newlink);
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        tbody.appendChild(row);        
    }    
</script>
    
<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $idRazr = explode(",", trim($_POST["id-razr"]));
    $name = trim($project->clearStr($_POST["name"]));
    $desc = trim($project->clearStr($_POST["description"]));
    $dStart = strtotime($_POST["datastart"]);
    
    if(!$project->add($name, $desc, $dStart, $idRazr)){
        $errMsg = "Ошибка при добавлении проекта МНПА! Проверьте правильность заполнения данных!";        
        
?>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4><?php echo $errMsg; ?></h4>
</div>
</div>
<?php
    }
}
?>