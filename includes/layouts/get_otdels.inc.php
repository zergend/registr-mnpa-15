<?php
$listOtdels = $otdel->getOtdels();
?>
<h1>Список отделов</h1>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th width="5%">#</th>
      <th>Наименование</th>
      <th width="10%">Изменение</th> 
      <th width="10%">Удаление</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($listOtdels as $row){
    echo "<tr>";
    foreach ($row as $i=>$value) {
        echo "<td>";
        if($i == 'name'){
            $name = $value;
            echo $name;
        }else{
            $id = $value;
            echo $id; 
        }
        echo "</td>";
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