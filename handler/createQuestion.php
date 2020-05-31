<?php
include_once("../model/Question.php");
// die("fail");
if(isset($_POST['question'])){
    // 如果提交的话
    $question = new Question();
    if ($question->isConnectError) {
        die("fail");
    }
    $result = $question->create($_POST['question']);
    if(!$result){
        die("fail");
    }
    
    include_once("questionList.php");
}