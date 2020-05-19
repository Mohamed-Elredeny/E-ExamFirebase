<?php
require ('../../php/doctor/addToExam.php');

?>

<div class="container">
    <form action="addToExam.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject']?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <table class="table" style="width: 400px">

                        <tbody>
                        <tr>
                            <th scope="row">Question Type</th>
                            <td colspan="3">
                                <select class="btn btn-primary" style="width: 200px" name="type">
                                    <option value=""> Question Type</option>
                                    <option value="mcq">MCQ</option>
                                    <option value="trueFalse">True and False</option>

                                </select>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">Question Difficulty</th>
                            <td colspan="3">
                                <select name="diff"  class="btn btn-primary" style="width: 200px">
                                    <option value=""> Question Difficulty</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>

                                </select>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4">
                                <center>
                                    <input type="submit" class="btn btn-dark" value="Select"  name="select">

                                </center>
                            </td>

                        </tr>
                        </tbody>
                    </table>

                </center>
            </div>
        </div>

        <div class="row">
            <?php
            if(isset($_POST['select'])){
            if(@count(@$getQuestion) > 0){
$counter=0;
                foreach (@$getQuestion as $amcq){
                    if(@$amcq['exam'] == 0){
                    $counter++;

                if( $amcq['type'] == 'mcq'){
                    ?>
                        <div class="col-md-12" style="text-align: right">
                            <a href="examQuestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                                <input type="button" class="btn btn-danger" value="Add To Exam" >
                            </a>
                        </div>
                        <div class="col-md-12 h4">

                            <h5 style="display: inline-block;padding-right: 20px">
                                <?php echo $counter?>
                            </h5>
                            <?php echo $amcq['questionContent'] ?>
                        </div>
                        <br>
                        <div class="col-md-12 h6" style="background: green">
                            <h5 style="display: inline-block;padding-right: 20px;">[ A ]</h5>
                            <?php  echo $amcq['validAnswer']?>
                        </div>
                        <div class="col-md-12 h6">
                            <h5 style="display: inline-block;padding-right: 20px">[ B ]</h5>
                            <?php  echo $amcq['wrongAnswer1']?>
                        </div>
                        <div class="col-md-12 h6">
                            <h5 style="display: inline-block;padding-right: 20px">[ C ]</h5>
                            <?php  echo $amcq['wrongAnswer2']?>
                        </div>
                        <div class="col-md-12 h6">
                            <h5 style="display: inline-block;padding-right: 20px">[ D ]</h5>
                            <?php  echo $amcq['wrongAnswer3']?>
                        </div>

                        <hr>
                    <?php
                }elseif ($amcq['type'] == 'trueFalse'){ ?>

                    <!--True and false -->

                    <!--One Question -->
                            <div class="col-md-12" style="text-align: right">
                                <a href="examQuestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                                    <input type="button" class="btn btn-danger" value="Add To Exam" >
                                </a>
                            </div>

                        <div class="col-md-12 h4">
                            <h5 style="display: inline-block;padding-right: 20px">
                                <?php echo $counter ?>
                            </h5>
                            <?php echo $amcq['questionContent']?>

                        </div>
                        <br>
                        <?php if($amcq['validAnswer'] == 't'){ ?>
                            <div class="col-md-12 h6" style="background: green">
                                <h5 style="display: inline-block;padding-right: 20px;">[ A ]</h5>
                                <?php  echo "True"?>
                            </div>
                            <div class="col-md-12 h6">
                                <h5 style="display: inline-block;padding-right: 20px">[ B ]</h5>
                                <?php  echo "False"?>
                            </div>
                        <?php }else{ ?>
                            <div class="col-md-12 h6" >
                                <h5 style="display: inline-block;padding-right: 20px;">[ A ]</h5>
                                <?php  echo "True"?>
                            </div>
                            <div class="col-md-12 h6" style="background: green">
                                <h5 style="display: inline-block;padding-right: 20px">[ B ]</h5>
                                <?php  echo "False"?>
                            </div>
                        <?php } ?>


                        <hr>
                        <?php
                
                }  ?>


                <!-- End of one question -->

            <?php
                    }
                }
            }else{
                echo "
                <h2><center>There is no questions yet !</center> </h2>";
            }
            }?>
        </div>

    </form>
</div>

