<?php
$pmnpa = new Projects();
$listPMNPA = $pmnpa->getProjects();
$errMsg = "";
?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

<h2>Отчет о ходе подготовке проектов МНПА</h2>

<table class="table table-striped table-hover table-bordered table-condensed">
  <thead>
    <tr>
        <th rowspan="2">№</th>
        <th rowspan="2">Название</th>
        <th rowspan="2">Исполнители</th>
        <th rowspan="2">Эксперты</th>
        <th colspan="4" class="text-center">Даты этапов</th>
    </tr>
    <tr>
        <th>начало</th>
        <th>согласование</th>
        <th>согласован</th>
        <th>завершён</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($listPMNPA as $row){
    echo "<tr>";
    foreach ($row as $i=>$value) {        
        if($i == 'id'){
            echo "<td>";
            $id = $value;
            echo $id;
            echo "</td>";
            $ispolnitel=$pmnpa->getIspolnitel($id);
            $is="";
            foreach($ispolnitel as $irow){
                foreach ($irow as $ii=>$ivalue) {        
                    if($ii == 'last_name') $is .= $ivalue;
                }
            }            
        }else{
            if($i == 'name'){
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "<td>";
                echo $is;
                echo "</td>";
                
            }
        } 
    }
    echo "</tr>";
}
?>
  </tbody> 
</table>

</div>