<?php
include_once("../model/Account.php");
$email = $_POST['email'];
$password = $_POST['password'];
$nickName = $_POST['nickName'];
$account = new Account();
$result = $account->create($email,$password,$nickName);
switch($result){
    case 0:
        die('账号已存在');
        break;
    case 1:
        die('success');
        break;
    case 2:
        die('创建账号的时候发生了未知的错误，请联系管理员');
        break;
}
