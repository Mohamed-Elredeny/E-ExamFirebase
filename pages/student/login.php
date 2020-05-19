<?php
require ('../../php/student/login.php');

if(isset($_POST['login'])){
  login('email','password','login');

}

?>

<!-- Login form creation starts-->
<section class="container-fluid" style="margin-top: 8%;text-align: right;direction: rtl">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="login.php" method="post">
                <div class="form-group">
                    <h4 class="text-center font-weight-bold"> تسجيل دخول </h4>
                    <label for="InputEmail1"> البريد الإلكتروني </label>
                    <input type="email" class="form-control" id="InputEmail1" aria-describeby="emailHelp" placeholder="قم بإدخال البريد الإلكتروني" name="email" required >
                </div>
                <div class="form-group">
                    <label for="InputPassword1">كلمة المرور</label>
                    <input type="password" class="form-control" id="InputPassword1" placeholder="قم بإدخال كلمة المرور" name="password"required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="login">تسجيل دخول</button>
                <div class="form-footer">
                    <p> نسيت كلمة المرور؟ <a href="register.php">تسجيل</a></p>

                </div>
            </form>
        </section>
    </section>
</section>
<!-- Login form creation ends -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
