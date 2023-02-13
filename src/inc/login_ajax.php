<?php
session_start();

include_once("config.php");

if(isset($_POST['email']) && isset($_POST['password']))
{
    $con = connect();
    if($con)
    {
        $em = $_POST['email'];
        $pass = $_POST['password'];
        $result = mysqli_query($con, "SELECT fname, email, password FROM users WHERE email='$em' AND password='$pass'");

        //check if result of query is correct
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['username'] = $row['email'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                echo "<h2 style='color: red;'>" . $row['fname'] . " عزیز وارد شدید" . "</h2>";
            }
            else{
                echo "<h2 style='color: red;'>ایمیل یا رمز عبور اشتباه است</h2>";
            }
        }

        mysqli_free_result($result);
        mysqli_close($con);
    }
    else{
        echo "<h2 style='color: red;'>ارتباط برقرار نشد</h2>";
    }
}

//echo "test";

?>