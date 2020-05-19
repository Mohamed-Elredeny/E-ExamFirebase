<?php
require ('../../php/header.php');
require ('../../realtime.php');
if(isset($_GET['level']) and isset($_GET['subject'])) {
    if (isset($_POST['select'])) {
        $getQuestion = GetQuestionForExam($_GET['level'], $_GET['subject'], $_POST['diff'], $_POST['type']);

    }
}
