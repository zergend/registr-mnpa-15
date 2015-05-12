<?php
// Проекты МНПА
require_once("ANewDB.class.php");
class Projects extends ANewDB{
    public $id, $name;
    
    private function db2Arr($data){
        $arr = [];
        while($row = $data->fetchArray(SQLITE3_ASSOC))
            $arr[] = $row;
        return $arr;
    }
    
    function add($f, $i, $o, $dolzn, $otdel, $dr, $phone){
        $sql = "INSERT INTO sotrudniki (f, i, o, dolzhnost, otdely_id, dr, phone)
                VALUES ('$f', '$i', '$o', '$dolzn', $otdel, $dr, $phone)";
        return $this->db->exec($sql);
    }
    
    function getProjects(){
        $sql = "SELECT * FROM proekt_mnpa";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }
    
    function getSotrudnikiOtdel($otdel){
        $sql = "SELECT * FROM sotrudniki
                WHERE otdely_id='$otdel'";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }    

    function getForEdit($id){
        $sql = "SELECT * 
                FROM sotrudniki
                WHERE id='$id'";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }
    
    function edit($id, $f, $i, $o){
        $sql = "UPDATE proekt_mnpa set f='$name'
                WHERE id='$id'";
        return $this->db->exec($sql);
    }
    
    function remove($id){
        $sql = "DELETE FROM proekt_mnpa WHERE id='$id'";
        return $this->db->exec($sql);
    }    
}