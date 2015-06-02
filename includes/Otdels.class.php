<?php
// Отделы
require_once("ANewDB.class.php");
class Otdels extends ANewDB{
    function add($name){
        $sql = "INSERT INTO otdely (name)
                VALUES ('$name')";
        return $this->db->exec($sql);
    }
    
    function getOtdels(){
        $sql = "SELECT id, name FROM otdely";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }

    function getForEdit($id){
        $sql = "SELECT id, name 
                FROM otdely
                WHERE id='$id'";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }
    
    function edit($id, $name){
        $sql = "UPDATE otdely set name='$name'
                WHERE id='$id'";
        return $this->db->exec($sql);
    }
    
    function remove($id){
        $sql = "DELETE FROM otdely WHERE id='$id'";
        return $this->db->exec($sql);
    }    
}