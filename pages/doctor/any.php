<?php
if(isset($_GET['level']) and isset($_GET['subject'])){
    header('location:addQuestion.php?level='.$_GET['level'].'&subject='.$_GET['subject'].' ');
}