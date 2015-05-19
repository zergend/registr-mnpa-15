<?php
$listUsers = $users->getUsersRS();
?>

<h2>Список пользователей</h2>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th width="25%">Логин</th>
      <th width="30%">Фамилия</th>
      <th width="25%">Роль</th>
      <th width="10%">Изменение</th> 
      <th width="10%">Удаление</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($listUsers as $row){
    echo "<tr>";
    
    foreach ($row as $i=>$value) {        
        if($i == 'id'){
            $id = $value;
            // echo $id;
        }else{
            echo "<td>";
            echo $value;
            echo "</td>";
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

<?php echo '<a class="btn btn-primary" href='. $_SERVER[REQUEST_URI] . '&new=1>Добавить пользователя</a>'; ?>