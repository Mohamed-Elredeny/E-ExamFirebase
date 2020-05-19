<?php
require ('../../realtime.php');
if(isset($_GET['level']) and isset($_GET['subject']) and isset($_GET['diff']) and isset($_GET['type']) and isset($_GET['id'])){
    $delete = deleteQuestion('Questions',$_GET['level'],$_GET['subject'],$_GET['diff'],$_GET['type'],$_GET['id']);

        header('location:questionsBank.php?level='.$_GET['level'].'&subject='.$_GET['subject'].' ');

}