<?php
require ('../../php/header.php');
require ('../../realtime.php');

if(isset($_GET['level']) and isset($_GET['subject'])){
$exam =GetRealExam($_GET['level'],$_GET['subject']);
if(@count(@$exam) > 0){
    $totalTime=0;
    $TotalScore=0;
        foreach ($exam as $e){
            $totalTime+= GetQuestionTime('QuestionTypes',$e['difficulty'],$e['type']);
            $TotalScore+= GetQuestionScore('QuestionTypes',$e['difficulty'],$e['type']);
        }
    }
}
if(isset($_POST['finish'])){
    $totalTime=0;
    $TotalScore=0;
    $myScore=0;
    $correctQuestion=0;
    $wrongQuestion =0;
    $missedPoints=0;
    if(@count(@$exam) > 0) {
    $QuestionsNumber = @count(@$exam);

        foreach ($exam as $e) {
            if (!empty(@$_POST[@$e['questionId']])) {
                if ($_POST[$e['questionId']] == $e['validAnswer']) {
                    $myScore += GetQuestionScore('QuestionTypes', $e['difficulty'], $e['type']);
                    $correctQuestion++;
                }else{
                    $wrongQuestion++;
                }
            }else{
                $wrongQuestion++;
            }

            $totalTime += GetQuestionTime('QuestionTypes', $e['difficulty'], $e['type']);
            $TotalScore += GetQuestionScore('QuestionTypes', $e['difficulty'], $e['type']);

        }
        $missedPoints = $TotalScore - $myScore;
    }

}

