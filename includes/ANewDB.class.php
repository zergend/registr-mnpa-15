<?php
abstract class ANewDB{
    const DB_NAME = "registr.db";
	private $_db = null;    
    
	function __get($name){
		if($name == "db")
			return $this->_db;
		throw new Exception("Неизвестное свойство!");
	}
    
	function __construct(){
		$this->_db = new SQLite3(self::DB_NAME);
		if(filesize(self::DB_NAME) == 0){
            echo "Нет базы данных " . self::DB_NAME;
		}
	}
    
	function __destruct(){
		unset($this->_db);
	}

    // функция для передачи результата запроса в массив
    function db2Arr($data){
        $arr = [];
        while($row = $data->fetchArray(SQLITE3_ASSOC))
            $arr[] = $row;
        return $arr;
    }
    
    // очищаем входные данные
    function clearStr($data){
        $data = strip_tags($data);
        return $this->_db->escapeString($data);
    }
    function clearInt($data){
        return abs((int)$data);
    }
    
    // генерируем уникальный id на основе временной метки
    function newID($table){
        $sql = "SELECT MAX(id) FROM $table";
        $newID = (int)$this->_db->querySingle($sql);
        if($newID>0){
            $newID += 1;
        }else{
            $newID = 1;
        }
        return $newID;
    }
}