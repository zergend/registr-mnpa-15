<?php
$listProjects = $projects->getProjects();
?>
<h1>Список проектов МНПА</h1>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th width="65%">Наименование</th>
      <th width="15%">Дата начала</th>
      <th width="10%">Изменение</th> 
      <th width="10%">Удаление</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($listProjects as $row){
    echo "<tr>";
    foreach ($row as $i=>$value) {        
        if($i == 'name'){
            echo "<td>";
            $name = $value;
            echo $name;
            echo "</td>";
        }else{            
            if($i == 'data_nachala') {
                echo "<td>";
                echo $value;  
                echo "</td>";
            }             
        }        
    } 
    echo "<td>";
    echo '<a href='. $_SERVER[REQUEST_URI] . '&edit=' . $id . '>Изменить</a>';
    echo "</td>";    
    echo "<td>";
    echo '<a href='. $_SERVER[REQUEST_URI] . '&del=' . $id . '>Удалить</a>';
    echo "</td>";
    echo "</tr>";
}
?>
  </tbody> 
</table>

<?php echo '<a class="btn btn-primary" href='. $_SERVER[REQUEST_URI] . '&new=1>Добавить проект МНПА</a>'; ?>