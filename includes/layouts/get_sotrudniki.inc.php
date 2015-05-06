<?php
$listSotrudniki = $sotrudniki->getSotrudniki();
?>

<h2>Список сотрудников</h2>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th width="80%">Сотрудник</th>
      <th width="10%">Изменение</th> 
      <th width="10%">Удаление</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($listSotrudniki as $row){
    echo "<tr>";
    echo "<td>";
    foreach ($row as $i=>$value) {        
        if($i == 'id'){
            $id = $value;
            echo $id;
        }else{
            echo " | " . $value;
            // echo $id; 
        }        
    }
    echo "</td>";
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

<?php echo '<a class="btn btn-primary" href='. $_SERVER[REQUEST_URI] . '&new=1>Добавить сотрудника</a>'; ?>