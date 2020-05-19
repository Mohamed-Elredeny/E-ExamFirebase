<?php
require('php/header.php');
?>
<link rel="stylesheet" href="assets/css/index.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <center>
                <br><br>
                <img src="assets/imgs/images.jpg" alt="" style="height: 100px;width: 150px;">
                <br><br>
                <br><br>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <center>
                <a href="pages/student/login.php">
                    <img src="assets/imgs/students.png" alt="" style="height: 300px;width: 450px;border-radius: 50%;">
                    <h1>Student</h1>
                </a>

            </center>
        </div>
        <div class="col-md-6 col-xs-12">
            <center>
                <a href="pages/doctor/login.php">
                <img src="assets/imgs/doctors.png" alt="" style="height: 300px;width: 450px;border-radius: 50%">
                <h1>Professor</h1>
                </a>
            </center>
        </div>
    </div>

</div>
<?php
require('php/footer.php');
?>