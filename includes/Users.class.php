<?php
// Пользователи
require_once("ANewDB.class.php");
class Users extends ANewDB{
    
    private function db2Arr($data){
        $arr = [];
        while($row = $data->fetchArray(SQLITE3_ASSOC))
            $arr[] = $row;
        return $arr;
    }
    
    function add($sid, $uname, $pwd, $rid){
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (sotrudniki_id, username, password, role_id)
                VALUES ('$sid', '$uname', '$pwd', '$rid')";
        return $this->db->exec($sql);
    }
    
    function getUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }

    function getUsersRS(){
        $sql = "SELECT users.id, users.username, sotrudniki.f, role.name 
                FROM users, sotrudniki, role
                WHERE users.sotrudniki_id=sotrudniki.id
                AND users.role_id=role.id";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }

    // выбираем все роли пользователей
    function getRole(){             
        $sql = "SELECT * FROM role";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }
    
    function getById($id){
        $sql = "SELECT * FROM users 
                WHERE id IN ($id)";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }     

    function getForEdit($id){
        $sql = "SELECT * 
                FROM users
                WHERE id='$id'";
        $result = $this->db->query($sql);
        if(!$result) return false;
        return $this->db2Arr($result);
    }
    
    function edit($id, $sid, $uname, $pwd, $rid){
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET 
                sotrudniki_id='$sid', 
                username='$uname', 
                password='$pwd', 
                role_id='$rid'
                WHERE id='$id'";
        return $this->db->exec($sql);
    }
    
    function remove($id){
        $sql = "DELETE FROM users WHERE id='$id'";
        return $this->db->exec($sql);
    }    
}