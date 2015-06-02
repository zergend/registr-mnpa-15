<?php
    $n = trim($otdel->clearStr($_POST["nameOtdel"]));
    if(empty($n)){
        $errMsg = "Заполните название отдела!";
?>
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Ошибка!</strong> Заполните название отдела!
        </div>
<?php
    }else{
        if(!$otdel->add($n)){
            $errMsg = "Ошибка при добавлении отдела!";
            echo "Ошибка: " . $errMsg;
        }
    }