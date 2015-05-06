<?php
// Сотрудники
require_once("ANewDB.class.php");
class Sotrudniki extends ANewDB{
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
    
    function getSotrudniki(){
        $sql = "SELECT * FROM sotrudniki";
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
        $sql = "UPDATE sotrudniki set f='$name'
                WHERE id='$id'";
        return $this->db->exec($sql);
    }
    
    function remove($id){
        $sql = "DELETE FROM sotrudniki WHERE id='$id'";
        return $this->db->exec($sql);
    }    
}