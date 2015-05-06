<?php
function __autoload($class){
    require 'classes/'.$class.'.class.php';
}
$user1 = new User("Петя", "petr", "12345");
$user2 = new User("Ваня", "vano", "789");
$user3 = new User("Свирид", "svift","qwerty");
$superuser1 = new SuperUser("Вася Пупкин", "vpupkin", "0000", "admin");
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
$superuser1->getInfo();
$superuser1->showInfo();
echo "<hr>Всего обычных пользователей:<br>" . User::$userCount . "<br>";
echo "Всего Супер-пользователей:<br>" . SuperUser::$superUserCount . "<hr>";
