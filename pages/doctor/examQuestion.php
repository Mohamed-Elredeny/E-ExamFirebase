<?php
require ('../../realtime.php');
if(isset($_GET['level']) and isset($_GET['subject']) and isset($_GET['diff']) and isset($_GET['type']) and isset($_GET['id'])){
    $question =GetSpecificQuestion($_GET['level'],$_GET['subject'],$_GET['diff'],$_GET['type'],$_GET['id']);
 if($_GET['type'] == 'mcq'){
    AddMcqQuestionToExam($_GET['level'],$_GET['subject'],$_GET['diff'],$_GET['type'],$question['questionContent'],$question['validAnswer'],$question['wrongAnswer1'],$question['wrongAnswer2'],$question['wrongAnswer3'],$_GET['id']);
}elseif ($_GET['type']== 'trueFalse'){
     AddTfQuestionToExam($_GET['level'],$_GET['subject'],$_GET['diff'],$_GET['type'],$question['questionContent'],$question['validAnswer'],$_GET['id']);
}
    header('location:addToExam.php?level='.$_GET['level'].'&subject='.$_GET['subject'].' ');

}