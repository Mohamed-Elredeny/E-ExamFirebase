<?php
require ('../../php/student/exam.php');
?>
<link rel="stylesheet" href="../../assets/css/examResult.css">
<style>
    body{
        overflow-x: hidden;
    }
</style>

<div class="container">
    <br>   <br>
           <center>
               <a  class="btn btn-primary"  href="EachSubject.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>">

                   Back Home


               </a>

           </center>

    </div>
    <center>
        <br><br>
        <h1>Results Page</h1>
        <br><br>
    </center>

    <div class="row">
        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    Questions Number
                    <br><br>

                    <?php echo @$QuestionsNumber ?>
                </center>
            </div>


        </div>

        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    Correct Answers
                    <br><br>

                    <?php echo @$correctQuestion ?>
                </center>
            </div>


        </div>

        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    Wrong  Answers
                    <br><br>

                    <?php echo  @$wrongQuestion ?>
                </center>
            </div>

        </div>


        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    missed points
                    <br><br>

                    <?php echo @$missedPoints ?>
                </center>
            </div>


        </div>

        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    Your Score
                    <br><br>

                    <?php echo @$myScore?>
                </center>
            </div>

        </div>



        <div class="col-sm-12 col-md-4 h4 " >
            <div class="thatDiv">
                <center>
                    Total Score
                    <br><br>

                    <?php echo @$TotalScore ?>
                </center>
            </div>


        </div>


        <br><br><br><br>



    </div>
</div>

