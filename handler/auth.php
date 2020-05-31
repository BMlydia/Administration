<?php
if(!isset($_POST['email']) && !isset($_POST['password'])){
    die('fail');
}                     

//dirname(__DIR__)：直接获得所在目录的绝对路径
include_once(dirname(__DIR__)."/model/Account.php");


$email = $_POST['email'];
$password = $_POST['password'];

$account = new Account();

// 1.判断它账号存不存在
$result = $account->isExist($email);
if(!$result){
    // 账号不存在
    die('账号或密码有误');
}
// 2.判断密码正不正确
$result = $account->auth($email,$password);
if(!$result){
    // 密码错误
    die('账号或密码有误');
}
// 3.登录
session_start();    //使用session_start()函数，PHP从session仓库中加载已经存储的session变量
$_SESSION['name'] = $result['name'];
//setcookie(名称,值,有限期,服务器路径);
setcookie('test',$result['name'],time()+7*24*60*60,'/');    //登陆保留天数
die("success");
