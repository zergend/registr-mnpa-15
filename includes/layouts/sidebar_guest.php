<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	<div class="list-group">
        <a class="list-group-item list-group-item-info" href="../../index.php?id=projects">Проекты МНПА</a>
		<a class="list-group-item list-group-item-info" href="../../index.php?id=mnpa">МНПА</a>			
    <div class="panel panel-info">
    <!-- Ссылка на модальное окно (прописано в footer.php)-->
    <?php 
    if($_SESSION["user"] != ""){
        echo "Пользователь: " . $_SESSION["user"];
        echo "<br />Роль: " . $_SESSION["role"];
    ?>
    <a class="list-group-item list-group-item-info"  data-toggle="modal" data-target="#logoutModal" href="#logoutModal">Выход</a>
    <?php
    }else{
        echo "Гость";
    ?>
    <a class="list-group-item list-group-item-info"  data-toggle="modal" data-target="#loginModal" href="#loginModal">Вход</a>
    <?php        
    }        
    ?>
         
	</div>        
    </div>
</div>