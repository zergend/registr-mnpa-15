<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	<div class="list-group">
        <div class="dropdown">
		<a aria-expanded="false" class="list-group-item list-group-item-info dropdown-toggle" data-toggle="dropdown" href="#">
		  Настройка
		</a>
		<ul class="dropdown-menu">
		  <li><a href="../../index.php?id=users">Пользователи</a>
		  <li class="divider"></li>
		  <li><a href="../../index.php?id=status-project">Статусы проектов</a>
		  <li><a href="../../index.php?id=type-mnpa">Типы МНПА</a>
		</ul>
        </div>       
        <div class="dropdown">
		<a aria-expanded="false" class="list-group-item list-group-item-info dropdown-toggle" data-toggle="dropdown" href="#">
		  Справочники
		</a>
		<ul class="dropdown-menu">
		  <li><a href="../../index.php?id=otdels">Отделы</a>
		  <li><a href="../../index.php?id=sotrudniki">Сотрудники</a>
		  <li><a href="../../index.php?id=users">Пользователи</a>
		  <li class="divider"></li>
		  <li><a href="../../index.php?id=status-project">Статусы проектов</a>
		  <li><a href="../../index.php?id=type-mnpa">Типы МНПА</a>
		</ul>
        </div>
        <div class="dropdown">
		<a aria-expanded="false" class="list-group-item list-group-item-info dropdown-toggle" data-toggle="dropdown" href="#">
		  Операции
		</a>
		<ul class="dropdown-menu">
		  <li><a href="../../index.php?id=projects">Проекты МНПА</a>
		  <li><a href="../../index.php?id=mnpa">МНПА</a>
		  <li><a href="../../index.php?id=v-registr">Передача МНПА</a>
		</ul>
        </div>
        <div class="dropdown">
		<a aria-expanded="false" class="list-group-item list-group-item-info dropdown-toggle" data-toggle="dropdown" href="#">
		  Отчеты
		</a>
		<ul class="dropdown-menu">
		  <li><a href="../../index.php?id=o-podgotovke">О подготовке проектов</a>
		  <li><a href="../../index.php?id=o-sotrudnikah-v-proekte">О сотрудниках, участвующих в проектах</a>
		  <li><a href="../../index.php?id=o-srokah">О превышении сроков проектов</a>
		</ul>
        </div>        

	
    <div class="panel panel-info">
    <!-- Ссылка на модальное окно (прописано в footer.php)-->
    <?php 
    if($_SESSION["user"] != ""){
        echo "Пользователь: <br />" . $_SESSION["user"];
        echo "Роль: <br />" . $_SESSION["role"];
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