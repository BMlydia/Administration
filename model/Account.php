<?php
include_once(__DIR__."/SqlHelper.php");
class Account extends SqlHelper{
    public function create($email,$password,$nickName){
        $password = md5($password);
        $result = $this->query('select email from `user` where email = "'.$email.'"');
        if($result->num_rows!==0){
            return 0;
        }
        $result = $this->query('insert into `user` (`email`,`password`,`name`) values ("'.$email.'","'.$password.'","'.$nickName.'")');
        if($result){
            return 1;
        }else{
            return 2;
        }
    }

    // 1.判断它账号存不存在，存在返回itrue,不存在返回false
    public function isExist($email){
        $result = $this->query('select email from `user` where email = "'.$email.'"');
        if($result->num_rows!==0){
            return true;
        }else{
            return false;
        }
    }

    // 2.判断密码正不正确
    public function auth($email,$password){
        $password = md5($password);
        $result = $this->query('select * from `user` where email = "'.$email.'" and password="'.$password.'"');
        if($result->num_rows!==0){
            $row = $result->fetch_assoc();
            return $row;
        }else{
            return false;
        }
    }


}