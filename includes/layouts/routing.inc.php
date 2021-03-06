<?php
switch($_SESSION["role"]){
    case 'Администратор': include 'includes/layouts/sidebar_admin.php'; break;
    case 'Координатор': include 'includes/layouts/sidebar_koordinator.php'; break;
    case 'Исполнитель': include 'includes/layouts/sidebar_autor.php'; break;
    case 'Эксперт': include 'includes/layouts/sidebar_expert.php'; break;
    default: include 'includes/layouts/sidebar_guest.php'; break;
}

$id = strtolower(strip_tags(trim($_GET['id'])));
switch($id){
	case 'otdels': include 'includes/layouts/otdels.inc.php'; break;
	case 'sotrudniki': include 'includes/layouts/sotrudniki.inc.php'; break;
	case 'edit_sotrudnik': include 'includes/layouts/edit_sotrudnik.inc.php'; break;
    case 'new_sotrudnik': include 'includes/layouts/new_sotrudnik.inc.php'; break;
    case 'del_sotrudnik': include 'includes/layouts/del_sotrudnik.inc.php'; break;
    case 'edit_otdel': include 'includes/layouts/edit_otdel.inc.php'; break;
    case 'del_otdel': include 'includes/layouts/del_otdel.inc.php'; break;
    case 'users': include 'includes/layouts/users.inc.php'; break;
    case 'del_user': include 'includes/layouts/del_user.inc.php'; break;
    case 'edit_user': include 'includes/layouts/edit_user.inc.php'; break;
    case 'projects': include 'includes/layouts/projects.inc.php'; break;    
    case 'new_project': include 'includes/layouts/new_project.inc.php'; break;        
    case 'edit_project': include 'includes/layouts/edit_project.inc.php'; break;
    case 'o-podgotovke': include 'includes/layouts/rep_hod_pmnpa.inc.php'; break;    
	default: include 'includes/layouts/mainpage.inc.php';
}