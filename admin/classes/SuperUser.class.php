<?php
class SuperUser extends User implements ISuperUser{
    public $role;
    public static $superUserCount = 0;
    
    // getInfo из интерфейса
    function getInfo(){
        echo "test interface<br>";
    }
    
    // перегрузка конструктора
    function __construct($n, $l, $p, $r){
        parent::__construct($n, $l, $p);
        $this->role = $r;
        ++self::$superUserCount;
    }
    
    // перегрузка showInfo
    function showInfo(){
        parent::showInfo();
        echo "Роль: {$this->role}<br>";
    }
}