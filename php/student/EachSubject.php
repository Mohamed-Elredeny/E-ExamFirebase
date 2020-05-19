<?php
require ('../../php/header.php');
require ('../../realtime.php');
if(isset($_GET['level'] )and isset($_GET['subject'])) {
    @$A = GetDifficlty($_GET['level'], $_GET['subject'], 'A');
    @$B = GetDifficlty($_GET['level'], $_GET['subject'], 'B');
    @$C = GetDifficlty($_GET['level'], $_GET['subject'], 'C');

    @$Amcq = GetQuestions($_GET['level'], $_GET['subject'], 'A', 'mcq');
    @$Bmcq = GetQuestions($_GET['level'], $_GET['subject'], 'B', 'mcq');
    @$Cmcq = GetQuestions($_GET['level'], $_GET['subject'], 'C', 'mcq');

    @$Atf = GetQuestions($_GET['level'], $_GET['subject'], 'A', 'trueFalse');
    @$Btf = GetQuestions($_GET['level'], $_GET['subject'], 'B', 'trueFalse');
    @$Ctf = GetQuestions($_GET['level'], $_GET['subject'], 'C', 'trueFalse');

    @$EnterExam = GetStudentExams('StudentsExams',$_SESSION['userId'],$_GET['level'],$_GET['subject']);
}
if(@count(@$Amcq) > 0) {
    foreach ($Amcq as $acmq) {

        if (isset($_POST['edit' . $acmq['questionId']])) {
            echo $_POST['id'];
        }
    }
}

@$examed = GetRegisteredSubjects('StudentsExams',$_SESSION['userId'],$_GET['level']);

?>