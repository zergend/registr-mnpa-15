<?php
// интерфейс для ПОЛЬЗОВАТЕЛЕЙ СИСТЕМЫ
interface IUsers{
    $login;
    $password;
    $email;
    function add();
    function get();
    function remove($id);
    function edit($id);
}
?>