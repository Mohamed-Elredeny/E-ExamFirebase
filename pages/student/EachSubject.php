<?php
if(isset($_GET['level']) and isset($_GET['subject'])){
    require ('../../php/student/EachSubject.php');
    ?>
    <link rel="stylesheet" href="../../assets/css/docmain.css">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <br><br>
                <center> <h5>Welcome  <?php echo GetUserNameWithId('Users','student',$_SESSION['userId'] )?></h5></center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="questionsBank.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "Questions Bank"?>">

                    </a>
                </center>
            </div>
        </div>
    <?php

    if( @$EnterExam != $_GET['subject'] ) { ?>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="exam.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "Exam"?>">
                    </a>
                </center>
            </div>
        </div>



<?php }else{ ?>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="examResult.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "View Exam Result"?>">
                    </a>
                </center>
            </div>
        </div>

    <?php  } ?>
    </div>

    <?php
}else{
    header('location:stdmain.php');
}
?>