<?php
require_once "IProjectsDB.class.php";
class ProjectsDB implements IProjectsDB{
	const DB_NAME = "../registr.db";
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
            echo "Нет базы данных!";
		}
	}
    
	function __destruct(){
		unset($this->_db);
	}

	function saveProject(){}
	function getProjects(){}
	function updateProject(){}
	function deleteProject($id){}	
}
