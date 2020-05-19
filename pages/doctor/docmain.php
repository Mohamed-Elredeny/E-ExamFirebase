<?php
require ('../../php/doctor/docmain.php');

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
        <div class="col-xs-12 col-md-12">
            <h5>Your Levels List</h5>
        </div>
    </div>
    <!-- Subjects -->
    <?php if(@count(@$levels) > 0){ ?>
        <?php foreach($levels as $lvl){ ?>
    <div class="row">
        <div class="col-md-12">
            <center>
                <a href="doctorSubjects.php?subject=<?php echo $lvl['name']?>">
                 <input type="button" class="btn btn-primary mybtns" value="<?php echo $lvl['name'] ?>">
                </a>
            </center>
        </div>
    </div>
            <?php } ?>
    <?php } ?>
</div>
