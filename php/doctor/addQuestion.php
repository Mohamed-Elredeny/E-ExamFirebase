<?php
require ('../../php/header.php');
require ('../../realtime.php');
if(isset($_POST['addQuestion'])){
    if($_POST['questionType'] == 'mcq') {
        SubjectsQustionsMcq('Questions', $_GET['level'], $_GET['subject'], $_POST['questionDifficulty'], $_POST['questionType'], $_POST['description'], $_POST['correctAnswer'], $_POST['wrong1'], $_POST['wrong2'], $_POST['wrong3']);
        header('location:any.php?level='.$_GET['level'].'&subject='.$_GET['subject'].'');
    }elseif ($_POST['questionType'] == 'trueFalse'){
        SubjectsQustionsTf('Questions', $_GET['level'], $_GET['subject'], $_POST['questionDifficulty'], $_POST['questionType'], $_POST['description'], $_POST['correctAnswer']);
        header('location:any.php?level='.$_GET['level'].'&subject='.$_GET['subject'].'');
    }
}

if(isset($_GET['level']) and isset($_GET['subject']) and isset($_GET['diff']) and isset($_GET['type']) and isset($_GET['id'])) {

    if (isset($_POST['editQuestion'])) {
        if($_GET['type'] == 'mcq'){
            ModifyQustionsMcq('Questions',$_GET['level'],$_GET['subject'],$_POST['questionDifficulty'],$_GET['type'],$_POST['description'],$_POST['correctAnswer'],$_POST['wrong1'], $_POST['wrong2'], $_POST['wrong3'],$_GET['id']);

        }elseif ($_GET['type'] == 'trueFalse'){
            ModifyQuestionsTf('Questions',$_GET['level'],$_GET['subject'],$_POST['questionDifficulty'],$_GET['type'],$_POST['description'],$_POST['correctAnswer'],$_GET['id']);

        }
    }
}