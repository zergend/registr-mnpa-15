<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th width="85%"></th>
      <th width="15%"></th>
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
            if($i == 'f'){
                echo " | " . $value;
            }
        }        
    }
    echo "</td>";  
    echo "<td>";
    echo '<a href='. $_SERVER[REQUEST_URI] . '&del=' . $id . '>Удалить</a>';
    echo "</td>";
    echo "</tr>";
}
?>
  </tbody> 
</table>