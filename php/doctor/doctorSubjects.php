<?php
require ('../../php/header.php');
require ('../../realtime.php');

if(!empty($_SESSION['userId'])){
    if(isset($_GET['subject'])){
        $levels = selectDoctorSubjects('Subjects',$_GET['subject'],$_SESSION['userId']);

    }

}
