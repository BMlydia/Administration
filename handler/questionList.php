<?php
include_once(dirname(__DIR__)."/model/Question.php");
$question = new Question();
if ($question->isConnectError) {
    die("fail");
}
$result = $question->getAll();
if(!$result){
    die("fail");
}else{
    if($result->num_rows===0){
        echo "当前没有任何问题";
    }
    while($row=$result->fetch_assoc()){
        $question = $row['content'];
        $time = $row['time'];
        $id = $row['id'];
        // echo '<div class="question-item">';
        // echo '<p class="content">'.$question.'</p>';
        // echo '<p class="time">'.$time.'</p>';
        // echo '<button class="close-btn" data-id="'.$id.'">x</button>';
        // echo '</div>';
        ?>
        <div class="question-item">
            <p class="content"><?php echo $question;?></p>
            <p class="time"><?php echo $time;?></p>
            <button type="button" class="close close-btn" aria-label="Close" data-id="<?php echo $id;?>"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php
    }
}

?>

