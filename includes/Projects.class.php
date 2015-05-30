<?php
// Проекты МНПА
require_once("ANewDB.class.php");
class Projects extends ANewDB{
    public $id, $name;
    
    function add($name, $desc, $d_start, $sotr_id){
        $status=1;
        $newID = $this->newID("proekt_mnpa");
        $sql = "INSERT INTO proekt_mnpa 
                    (id, name, description, data_nachala, status_proekta_id)
                VALUES ($newID, $name, $desc, $d_start, $status);";
        foreach ($sotr_id as $i=>$value){
            $sql = $sql . 
                " INSERT INTO podgotovka_proekta(proekt_mnpa_id, sotrudniki_id)                   
                VALUES ($newID, $value);";
        }
        return $this->db->exec($sql);
    }
    
    function getProjects(){
        $sql = "SELECT * FROM proekt_mnpa";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }

    function getIspolnitel($id){
        $sql = "SELECT  proekt_mnpa.id,
                        podgotovka_proekta.proekt_mnpa_id,
                        podgotovka_proekta.sotrudniki_id,
                        sotrudniki.f as last_name,
                        sotrudniki.id
                FROM
                        podgotovka_proekta
                INNER JOIN proekt_mnpa ON (podgotovka_proekta.proekt_mnpa_id = proekt_mnpa.id)
                INNER JOIN sotrudniki ON (podgotovka_proekta.sotrudniki_id = sotrudniki.id)
                WHERE
                        proekt_mnpa.id = $id";
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