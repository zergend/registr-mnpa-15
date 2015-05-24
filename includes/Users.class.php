<?php
// Пользователи
require_once("ANewDB.class.php");
class Users extends ANewDB{
    
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

    // проверка корректности ввода логина и пароля
    function logIn($login, $pwd){
        $sql = "SELECT username, password
                FROM users
                WHERE username='$login'";
        $result = $this->db->query($sql);
        if(!$result) {
            // echo "нет результата";
            return false;
        }
        $user = $this->db2Arr($result);
        foreach($user as $row){
            foreach ($row as $i=>$value) {
                echo $value;
                if($i == 'password'){
                    if (password_verify($pwd, $value)) {
                        // echo 'Пароль верный!';
                        return true;
                    }else{
                        // echo 'Неверный пароль.';
                        return false;                        
                    }
                }        
            }
        }
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

    // получаем роль пользователя
    function getRole($user){             
        $sql = "SELECT users.username, users.role_id, role.id, role.name as role_name
                FROM users                
                INNER JOIN role
                ON users.role_id = role.id
                WHERE users.username='$user'";
        $result = $this->db->query($sql);
        if(!$result) return false;
        $roleArr = $this->db2Arr($result);
        foreach($roleArr as $row){
            foreach ($row as $i=>$value) {  
                if($i == 'role_name') return $value;
            }
        }        
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