<?php
ob_start();
session_start();
// автозагрузка классов
function __autoload($class){
    require '/includes/'.$class.'.class.php';
}

//    require_once("/includes/functions.php");
    include("/includes/layouts/header.php"); 
?>

<div class="container">
  <div class="row"> 
	<?php include("/includes/layouts/sidebar_main.php"); ?>		
	<?php include '/includes/layouts/routing.inc.php'; ?>	
  </div>
</div>
		
<?php include("/includes/layouts/footer.php"); ?>