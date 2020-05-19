<?php
require ('../../php/student/register.php');
?>

<!-- Login form creation starts-->
<section class="container-fluid" style="margin-top: 2%;text-align: right;direction: rtl">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="login.php" method="post">
                <div class="form-group">
                    <div class="form-group">
                        <h4 class="text-center font-weight-bold"> تسجيل  </h4>

                        <label for="InputPassword1"> اسم المستخدم</label>
                        <input type="text" class="form-control" id="InputPassword1" placeholder="قم بإدخال اسم  المستخدم" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="InputEmail1"> البريد الإلكتروني </label>
                    <input type="email" class="form-control" id="InputEmail1" aria-describeby="emailHelp" placeholder="قم بإدخال البريد الإلكتروني" name="email" required>
                </div>

                <div class="form-group">
                    <label for="InputPassword1">كلمة المرور</label>
                    <input type="password" class="form-control" id="InputPassword1" placeholder="قم بإدخال كلمة المرور" name="password" required>
                </div>

                <div class="form-group">
                    <label for="InputPassword1"> رقم الجوال</label>
                    <input type="number" class="form-control"  placeholder="قم بإدخال رقم االجوال " name="phone" required>
                </div>

                <div class="form-group">
                    <select name="level">
                        <?php if(@count(@$levels) > 0 ){ ?>
                            <?php foreach ($levels as $l ) { ?>
                            <option value="<?php echo $l['name'] ?>">
                                <?php echo $l['name'] ?>
                            </option>

                        <?php }
                        } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="register">تسجيل </button>
                <div class="form-footer">
                    <p> تمتلك حساب بالفعل؟ <a href="login.php">تسجيل دخول</a></p>

                </div>
            </form>
        </section>
    </section>
</section>
<!-- Login form creation ends -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
