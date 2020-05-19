<?php

require('../../php/doctor/addQuestion.php');
@$studentDet = GetSpecificQuestion($_GET['level'],$_GET['subject'],$_GET['diff'],$_GET['type'],$_GET['id']);
if(isset($_GET['level']) and isset($_GET['subject']) and isset($_GET['diff']) and isset($_GET['type']) and isset($_GET['id'])){

    if($_GET['type'] == 'mcq'){
?>

    <div class="addproduct">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-7" >
                <center>
                    <h2>Edit  Question</h2>
                </center>
                <form method="post" action="editquestion.php?level=<?php echo $_GET['level'] ?>&subject=<?php echo $_GET['subject'] ?>&diff=<?php echo $_GET['diff'] ?>&type=<?php echo $_GET['type'] ?>&id=<?php echo $_GET['id'] ?>">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Difficulty Level </label>
                        <div class="form-group">
                            <select class="custom-select" name="questionDifficulty" required>
                                <option value="<?php echo $studentDet['difficulty'] ?>" selected><?php echo $studentDet['difficulty'] ?></option>
                                    <?php if($studentDet['difficulty'] != 'A'){ ?>
                                    <option value="A"> A </option>
                                    <?php } ?>
                                <?php if($studentDet['difficulty'] != 'B'){ ?>
                                    <option value="B"> B </option>
                                <?php } ?>
                                <?php if($studentDet['difficulty'] != 'C'){ ?>
                                    <option value="C"> C </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div id="qspace">

                        <div class='form-group'>
                            <label for='exampleFormControlTextarea1'> Question Content </label>
                            <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' placeholder='Add Your Question Content' name='description' required ><?php echo $studentDet['questionContent']?></textarea>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>    Correct Answer </label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Correct Answer'  name='correctAnswer' required value="<?php echo $studentDet['validAnswer']?>">
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>    First Wrong Answer </label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your First Wrong Answer'  name='wrong1' required value="<?php echo $studentDet['wrongAnswer1']?>">
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>    Second Wrong Answer </label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Second Wrong Answer'  name='wrong2' required value="<?php echo $studentDet['wrongAnswer2']?>">
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputEmail1'>    Third Wrong Answer </label>
                            <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Third Wrong Answer'  name='wrong3' required value="<?php echo $studentDet['wrongAnswer3']?>">
                        </div>
                    </div>



                    <div class="form-group">
                        <br>
                        <center>
                            <button type="submit" class="btn btn-danger" name="editQuestion" style="width: 150px">Edit</button>
                        </center>
                    </div>
                </form>

            </div>

        </div>
    </div>
<?php
    }elseif($_GET['type'] == 'trueFalse') {
        ?>
        <div class="addproduct">
            <div class="row justify-content-md-center">
                <div class="col-sm-12 col-md-7" >
                    <center>
                        <h2>Edit  Question</h2>
                    </center>
                    <form method="post" action="editquestion.php?level=<?php echo $_GET['level'] ?>&subject=<?php echo $_GET['subject'] ?>&diff=<?php echo $_GET['diff'] ?>&type=<?php echo $_GET['type'] ?>&id=<?php echo $_GET['id'] ?>">


                        <div class="form-group">
                            <label for="exampleInputEmail1"> Difficulty Level </label>
                            <div class="form-group">
                                <select class="custom-select" name="questionDifficulty" required>
                                    <option value="<?php echo $studentDet['difficulty'] ?>" selected><?php echo $studentDet['difficulty'] ?></option>
                                    <?php if($studentDet['difficulty'] != 'A'){ ?>
                                        <option value="A"> A </option>
                                    <?php } ?>
                                    <?php if($studentDet['difficulty'] != 'B'){ ?>
                                        <option value="B"> B </option>
                                    <?php } ?>
                                    <?php if($studentDet['difficulty'] != 'C'){ ?>
                                        <option value="C"> C </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div id="qspace">

                            <div class='form-group'>
                                <label for='exampleFormControlTextarea1'> Question Content </label>
                                <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' placeholder='Add Your Question Content' name='description' required><?php echo $studentDet['questionContent']?></textarea>
                            </div>
                            <div class='form-group'>
                                <label for='exampleInputEmail1'>    Correct Answer </label>
                                <select name="correctAnswer"  class='form-control' id="">
                                    <?php if($studentDet['validAnswer'] == 't'){ ?>
                                    <option value="t" selected>True</option>
                                        <option value="f">False</option>

                                    <?php }else{?>
                                    <option value="t" selected>False</option>
                                        <option value="f">True</option>

                                    <?php } ?>
                                </select>
                            </div>
                           
                        </div>



                        <div class="form-group">
                            <br>
                            <center>
                                <button type="submit" class="btn btn-danger" name="editQuestion" style="width: 150px">Edit</button>
                            </center>
                        </div>
                    </form>

                </div>

            </div>
        </div>




        <?php
    }
}
?>