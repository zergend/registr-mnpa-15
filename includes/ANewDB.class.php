<?php
abstract class ANewDB{
    const DB_NAME = "registr.db";
	private $_db = null;
	
	function __get($name){
		if($name == "db")
			return $this->_db;
		throw new Exception("Unknown property!");
	}
    
	function __construct(){
		$this->_db = new SQLite3(self::DB_NAME);
		if(filesize(self::DB_NAME) == 0){
			/* $sql = "CREATE TABLE 			
			";*/
            echo "Нет базы данных " . self::DB_NAME;
		}
	}
    
	function __destruct(){
		unset($this->_db);
	}
    
    // очищаем входные данные
    function clearStr($data){
        $data = strip_tags($data);
        return $this->_db->escapeString($data);
    }
    function clearInt($data){
        return abs((int)$data);
    }
}