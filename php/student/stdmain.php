<?php

require ('../../php/header.php');
require ('../../realtime.php');

if(isset($_GET['level'])) {
    $levels = SelectWithTwoNodes('LevelSubjects', $_GET['level']);
}