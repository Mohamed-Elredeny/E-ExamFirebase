<?php
    if($_POST['Question'] == 'mcq'){
        echo "
                    <div class='form-group'>
                        <label for='exampleFormControlTextarea1'> Question Content </label>
                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' placeholder='Add Your Question Content' name='description' required></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>    Correct Answer </label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Correct Answer'  name='correctAnswer' required>
                    </div>
                     <div class='form-group'>
                        <label for='exampleInputEmail1'>    First Wrong Answer </label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your First Wrong Answer'  name='wrong1' required>
                    </div>
                     <div class='form-group'>
                        <label for='exampleInputEmail1'>    Second Wrong Answer </label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Second Wrong Answer'  name='wrong2' required>
                    </div>
                     <div class='form-group'>
                        <label for='exampleInputEmail1'>    Third Wrong Answer </label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Third Wrong Answer'  name='wrong3' required>
                    </div>
                    
        ";
    }else{

        echo "
                    <div class='form-group'>
                        <label for='exampleFormControlTextarea1'> Question Content </label>
                        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' placeholder='Add Your Question Content' name='description' required></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>    Correct Answer </label>
                        <input type='text' class='form-control' id='exampleInputPassword1' placeholder='Add Your Correct Answer'  name='correctAnswer' required>
                    </div>
                    
                    
        ";

    }

?>