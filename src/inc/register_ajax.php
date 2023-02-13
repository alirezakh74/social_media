<?php

include_once("config.php");

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])
    && isset($_POST['password']) && isset($_POST['password2']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];

    if($pass == $pass2)
    {
        $conn = connect();

        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) 
        {
            $query = "INSERT INTO users () VALUES(NULL, '$fname', '$lname', '$email', '$pass', 'male', 'all')";
            $result = mysqli_query($conn, $query);
            if ($result) 
            {
                echo "<h3 style='color: green;'>ثبت نام انجام شد حالا میتوانید وارد شوید</h3>";
            }
            else 
            {
                echo "<h3 style='color: red;'>مشکل در ثیت نام</h3>";
            }
        }
        else
        {
            echo "<h3 style='color: red;'>شما قبلا ثبت نام کرده اید</h3>";
        }
    }
    else
    {
        echo "<h3 style='color: red;'>تکرار رمز مطابت ندارد</h3>";
    }

}

?>