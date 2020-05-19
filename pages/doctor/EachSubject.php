<?php
if(isset($_GET['level']) and isset($_GET['subject'])){
    require ('../../php/doctor/EachSubject.php'); 
?>
<link rel="stylesheet" href="../../assets/css/docmain.css">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <br><br>
                <center> <h5>Welcome Dr <?php echo GetUserNameWithId('Users','doctor',$_SESSION['userId'] )?></h5></center>
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
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="addToExam.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "Add To Exam"?>">
                    </a>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="exam.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "Exam"?>">
                    </a>
                </center>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="addQuestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">
                        <input type="button" class="btn btn-primary mybtns" value="<?php echo "Add Question"?>">
                    </a>
                </center>
            </div>
        </div>

</div>




<?php
}else{
    header('location:doctorSubjects.php');
}
?>