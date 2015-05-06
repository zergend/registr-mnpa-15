<?php
//описание класса
class User extends UserAbstract{
    // описание свойств
    public $name;
    public $login;
    public $password;
    public static $userCount = 0;
    
    //конструктор
    function __construct($n, $l, $p){
        $this->name = $n;
        $this->login = $l;
        $this->password = $p;
        ++self::$userCount;
    }
    
    //деструктор
    function __destruct(){
        echo "<br>Пользователь {$this->login} удален";
    }
    
    
    // описание методов
    function showInfo(){
        echo "<hr>Пользователь: {$this->login}<br>";
        echo "Имя: {$this->name}<br>";
        echo "Пароль: {$this->password}<br>";
    }       
}