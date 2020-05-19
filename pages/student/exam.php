<?php
require ('../../php/student/exam.php');

if(isset($_GET['level']) and isset($_GET['subject'])){
    ?>

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <div class="row h5" >
        <br>
        <hr>
        <div class="col-md-4">
            <center>
                Level :
                <?php echo $_GET['level']?>
            </center>

        </div>
        <div class="col-md-4">
            <center>
                Faculty Of Computers And Information
            </center>
        </div>
        <div class="col-md-4">
            <center>
                Duration : <?php echo @$totalTime+15 ." Minutes" ?>
            </center>
        </div>
    </div>
    <div class="row h5" >

        <div class="col-md-4">
            <center>
                Subject :
                <?php echo $_GET['subject']?>
            </center>

        </div>
        <div class="col-md-4">
            <center>
                <?php echo "Dr : ". GetUserNameWithId('Users','student',$_SESSION['userId']) ?>
            </center>

        </div>
        <div class="col-md-4">
            <center>
                Score : <?php echo @$TotalScore ." Points" ?>

            </center>
        </div>
    </div>

    </div>
    <hr>
    <form action="examResult.php?level=<?php echo $_GET['level'] ?>&subject=<?php echo $_GET['subject']?>" method="post">


        <!--Exam Questions -->
        <?php if(@count(@$exam) > 0){ ?>
            <!-- mcq -->
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h4>1. Mcq Questions </h4>

                    </center>


                    <hr>
                </div>
            </div>

            <?php
            $counter=0;
            foreach (@$exam as $amcq){

                if($amcq['type'] == 'mcq'){
                    $counter++;
                    ?>


                    <div class="col-md-12 h4">


                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter ?></h5>
                        <?php echo $amcq['questionContent'] ?>
                    </div>
                    <br>

                    <div class="col-md-12 h6" >
                        <h5 style="display: inline-block;padding-right: 20px;">
                            <input type="radio" class="btn" name="<?php echo $amcq['questionId']?>" value="<?php echo $amcq['validAnswer']?>">
                        </h5>
                        <?php  echo $amcq['validAnswer']?>
                    </div>
                    <div class="col-md-12 h6">
                        <h5 style="display: inline-block;padding-right: 20px">
                            <input type="radio" class="btn" name="<?php echo $amcq['questionId']?>" value="<?php echo $amcq['wrongAnswer1']?>">
                        </h5>
                        <?php  echo $amcq['wrongAnswer1']?>
                    </div>
                    <div class="col-md-12 h6">
                        <h5 style="display: inline-block;padding-right: 20px">
                            <input type="radio" class="btn" name="<?php echo $amcq['questionId']?>" value="<?php echo $amcq['wrongAnswer2']?>">
                        </h5>
                        <?php  echo $amcq['wrongAnswer2']?>
                    </div>
                    <div class="col-md-12 h6">
                        <h5 style="display: inline-block;padding-right: 20px">
                            <input type="radio" class="btn" name="<?php echo $amcq['questionId']?>" value="<?php echo $amcq['wrongAnswer3']?>">


                        </h5>
                        <?php  echo $amcq['wrongAnswer3']?>
                    </div>

                    <hr>
                <?php }
            }
            $counter=0;
            ?>


            <!--True and false -->
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <h4>2. True And False Questions </h4>
                    </center>


                    <hr>
                </div>
            </div>
            <!--One Question -->
            <?php
            $counterx=0;
            foreach (@$exam as $atf){

                if($atf['type'] == 'trueFalse'){
                    $counterx++;
                    ?>



                    <div class="col-md-12 h4">
                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counterx?></h5>
                        <?php echo $atf['questionContent']?>

                    </div>
                    <br>
                    <?php if($atf['validAnswer'] == 't'){ ?>
                        <div class="col-md-12 h6" >
                            <h5 style="display: inline-block;padding-right: 20px;">
                                <input type="radio" class="btn" name="<?php echo $atf['questionId']?>" value="t">
                            </h5>
                            <?php  echo "True"?>
                        </div>
                        <div class="col-md-12 h6">
                            <h5 style="display: inline-block;padding-right: 20px">
                                <input type="radio" class="btn" name="<?php echo $atf['questionId']?>"  value="f">

                            </h5>
                            <?php  echo "False"?>
                        </div>
                    <?php }else{ ?>
                        <div class="col-md-12 h6" >
                            <h5 style="display: inline-block;padding-right: 20px;">
                                <input type="radio" class="btn" name="<?php echo $atf['questionId']?>"  value="t">

                            </h5>
                            <?php  echo "True"?>
                        </div>
                        <div class="col-md-12 h6" >
                            <h5 style="display: inline-block;padding-right: 20px">
                                <input type="radio" class="btn" name="<?php echo $atf['questionId']?>"  value="f">

                            </h5>
                            <?php  echo "False"?>
                        </div>
                    <?php } ?>


                    <hr>
                    <?php
                }
                $counter=0;
            }
            $counterx=0;  ?>


            <!-- End of one question -->
        <?php } ?>

        <center>
            <input type="submit" class="btn btn-danger" value="Get My Result" name="finish" required>
            <br><br><br>
        </center>
    </form>
    <?php
}
?>
