<?php
require ('../../php/student/stdmain.php');
if(isset($_GET['level'])){
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
            <div class="col-xs-12 col-md-12">
                <h5>Your Subjects List</h5>
            </div>
        </div>
        <!-- Subjects -->
        <?php if(@count(@$levels) > 0){ ?>
            <?php foreach($levels as $lvl){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <a href="EachSubject.php?level=<?php echo $_GET['level'] ?>&subject=<?php echo $lvl['name']?>">
                                <input type="button" class="btn btn-primary mybtns" value="<?php echo $lvl['name'] ?>">
                            </a>
                        </center>
                    </div>
                </div>
            <?php } ?>
        <?php }else{
            echo "
        <h5>
            <center>You did not register any subjects here yet !</center>

        </h5>";
        } ?>
    </div>

    <?php
}else{
    header('location:login.php');
}
?>