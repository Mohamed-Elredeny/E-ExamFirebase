<?php
if(isset($_GET['level']) and isset($_GET['subject'])){
    require ('../../php/doctor/EachSubject.php');
    $counter=0;
?>
    <link rel="stylesheet" href="../../assets/css/questionStyle.css">
<div class="conatiner">
    <div class="row">
        <div class="col-md-12">
            <center>
                <br>
                <h2>Questions Bank</h2>
            </center>
        </div>
    </div>
    <hr>
    <form action="questionsBank.php?level=<?php  echo $_GET['level'] ?>&subject=<?php echo $_GET['subject'] ?>" method="POST">
<!-- A -->
<?php if(@count(@$A) > 0){ ?>
<!-- A Difficlty Questions -->
    <h3>A  Level Questions </h3>
    <hr>

    <?php
        if( @count(@$Amcq) > 0){
            ?>
              <!-- mcq -->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h4>Mcq Questions </h4>

                </center>
                <hr>
            </div>
        </div>
        <!--One Question -->
        <?php

    foreach (@$Amcq as $amcq){ ?>

        <div class="col-md-12" style="text-align: right">
            <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                 <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
            </a>
            <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
            </a>
        </div>
        <div class="col-md-12 h4">

<?php $counter++ ?>
            <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
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
    <?php }
            $counter=0;
        } ?>

    <?php
    if( @count(@$Atf) > 0){ ?>
        <!--True and false -->
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h4>True And False Questions </h4>

                </center>
                <hr>
            </div>
        </div>
        <!--One Question -->
    <?php
        foreach ($Atf as $atf){

            $counter++;
            ?>

            <div class="col-md-12" style="text-align: right">
                <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                    <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
                </a>
                <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                    <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
                </a>
            </div>


        <div class="col-md-12 h4">
            <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
          <?php echo $atf['questionContent']?>

        </div>
        <br>
         <?php if($atf['validAnswer'] == 't'){ ?>
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
        }
        $counter=0;
    } ?>


<!-- End of one question -->
<?php } ?>


<!-- B -->
<?php if(@count(@$B) > 0){ ?>
            <!-- B Difficlty Questions -->
            <h3>B  Level Questions </h3>
            <hr>

            <?php
            if( @count(@$Bmcq) > 0){
                ?>
                <!-- mcq -->
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Mcq Questions </h4>

                        </center>
                        <hr>
                    </div>
                </div>
                <!--One Question -->
                <?php

                foreach (@$Bmcq as $amcq){ ?>

                    <div class="col-md-12" style="text-align: right">
                        <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                            <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
                        </a>
                        <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                            <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
                        </a>
                    </div>
                    <div class="col-md-12 h4">

                        <?php $counter++ ?>
                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
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
                <?php }
                $counter=0;
            } ?>

            <?php
            if( @count(@$Btf) > 0){ ?>
                <!--True and false -->
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>True And False Questions </h4>

                        </center>
                        <hr>
                    </div>
                </div>
                <!--One Question -->
                <?php
                foreach ($Btf as $atf){

                    $counter++;
                    ?>

                    <div class="col-md-12" style="text-align: right">
                        <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                            <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
                        </a>
                        <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                            <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
                        </a>
                    </div>


                    <div class="col-md-12 h4">
                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
                        <?php echo $atf['questionContent']?>

                    </div>
                    <br>
                    <?php if($atf['validAnswer'] == 't'){ ?>
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
                }
                $counter=0;
            } ?>


            <!-- End of one question -->
        <?php } ?>

<!-- C -->
<?php if(@count(@$C) > 0){ ?>
            <!-- C Difficlty Questions -->
            <h3>C  Level Questions </h3>
            <hr>

            <?php
            if( @count(@$Cmcq) > 0){
                ?>
                <!-- mcq -->
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Mcq Questions </h4>

                        </center>
                        <hr>
                    </div>
                </div>
                <!--One Question -->
                <?php

                foreach (@$Cmcq as $amcq){ ?>

                    <div class="col-md-12" style="text-align: right">
                        <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                            <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
                        </a>
                        <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $amcq['type']?>&id=<?php echo $amcq['questionId']?>">
                            <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
                        </a>
                    </div>
                    <div class="col-md-12 h4">

                        <?php $counter++ ?>
                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
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
                <?php }
                $counter=0;
            } ?>

            <?php
            if( @count(@$Ctf) > 0){ ?>
                <!--True and false -->
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>True And False Questions </h4>

                        </center>
                        <hr>
                    </div>
                </div>
                <!--One Question -->
                <?php
                foreach ($Ctf as $atf){

                    $counter++;
                    ?>

                    <div class="col-md-12" style="text-align: right">
                        <a href="editquestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                            <input type="button" value="edit" style="width: 80px" class="btn btn-dark"name="edit">
                        </a>
                        <a href="deletequestion.php?level=<?php echo $_GET['level']?>&subject=<?php echo $_GET['subject'];?>&diff=<?php echo $amcq['difficulty']?>&type=<?php echo $atf['type']?>&id=<?php echo $atf['questionId']?>">
                            <input type="button" value="delete" style="width: 80px" class="btn btn-danger" name="delete" >
                        </a>
                    </div>


                    <div class="col-md-12 h4">
                        <h5 style="display: inline-block;padding-right: 20px"><?php echo $counter?></h5>
                        <?php echo $atf['questionContent']?>

                    </div>
                    <br>
                    <?php if($atf['validAnswer'] == 't'){ ?>
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
                }
                $counter=0;
            } ?>


            <!-- End of one question -->
        <?php } ?>
    <!-- End of one question -->


    </form>
</div>




<?php
}else{
    header('location:doctorSubjects.php');
}
?>
