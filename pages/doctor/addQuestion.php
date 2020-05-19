<?php
 require ('../../php/doctor/addQuestion.php');
?>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<div class="addproduct">
    <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-7" >
            <center>
                <h2>Add New Question</h2>
            </center>
            <form method="post" action="addQuestion.php?level=<?php echo $_GET['level'] ?>&subject=<?php echo $_GET['subject'] ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1">Question Type</label>
                    <div class="form-group">
                        <select class="custom-select" name="questionType" required id="qtype">
                            <option selected>Select Question Type</option>
                            <option value="mcq"> mcq </option>
                            <option value="trueFalse"> trueFalse </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"> Difficulty Level </label>
                    <div class="form-group">
                        <select class="custom-select" name="questionDifficulty" required>
                            <option selected>Select  Difficulty Level   </option>
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                        </select>
                    </div>
                </div>

                <div id="qspace">

                </div>



                <div class="form-group">
                    <br>
                    <center>
                        <button type="submit" class="btn btn-danger" name="addQuestion" style="width: 150px">اضافة</button>
                    </center>
                </div>
            </form>

        </div>

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#qtype').change(function(){
            var question = $(this).val();
            $.ajax({
                url:"fetch/addquestion.php",
                method:"POST",
                data:{Question:question},
                dataType:"text",
                success:function(data){
                    $('#qspace').html(data);
                }
            });
        });
    });

</script>

