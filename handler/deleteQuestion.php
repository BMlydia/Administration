<?php
include_once("../model/Question.php");
$question = new Question();
if ($question->isConnectError) {
    die("fail");
}
$result = $question->delete($_POST['id']);
if(!$result){
    echo "fail";
}else{
    include_once("questionList.php");
}