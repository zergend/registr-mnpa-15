<?php
$id = strtolower(strip_tags(trim($_GET['id'])));
switch($id){
	case 'otdels': include 'includes/layouts/otdels.inc.php'; break;
	case 'sotrudniki': include 'includes/layouts/sotrudniki.inc.php'; break;
	case 'edit_sotrudnik': include 'includes/layouts/edit_sotrudnik.inc.php'; break;
    case 'new_sotrudnik': include 'includes/layouts/new_sotrudnik.inc.php'; break;
    case 'del_sotrudnik': include 'includes/layouts/del_sotrudnik.inc.php'; break;
    case 'edit_otdel': include 'includes/layouts/edit_otdel.inc.php'; break;
    case 'del_otdel': include 'includes/layouts/del_otdel.inc.php'; break;
	default: include 'includes/layouts/mainpage.inc.php';
}	