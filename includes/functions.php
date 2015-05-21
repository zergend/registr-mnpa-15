<?php
// определим константы
// пользователь не залогинен (гость) 
define("GUEST", "guest");

// автозагрузка классов
function __autoload($class){
    require '/includes/'.$class.'.class.php';
}

?>