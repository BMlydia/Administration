<?php
include_once(__DIR__."/SqlHelper.php");
// Model 数据模型
class Question extends SqlHelper{

    // 创建问题
    public function create($content){
        $time = date('Y-m-d H:i:s');
        $result = $this->query('insert into `questions` (content,time) values ("'.$content.'","'.$time.'")');
        if(!$result){
            return false;
        }
        return true;
    }

    // 删除问题
    public function delete($id){
        $result = $this->query('delete from `questions` where id='.$id);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    // 获取所有的问题
    public function getAll(){
        $result = $this->query('select * from `questions`');
        return $result;
    }
}