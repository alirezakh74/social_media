<?php
session_start();
if(isset($_SESSION['username']))
{
    header("Location: index2.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود/ثبت نام</title>
    <link rel="stylesheet" href="src/css/style_form.css">
</head>

<body>
    <div class="container">
        <div class="login_form">
            <h2>وارد شوید</h2>
            <form class="login" enctype="application/x-www-form-urlencoded">
                <br>
                <label for="login_email">ایمیل</label>
                <br>
                <input type="email" name="login_email" id="login_email" class="ltr" required>
                <br>
                <label for="login_password">پسورد</label>
                <br>
                <input type="password" name="login_password" id="login_password" class="ltr" required>
                <br>
                <button id="login_btn" onclick="login()">ورود</button>
                <br>
                <div class="login_msg" id="login_msg"></div>
                <br>
            </form>
        </div>
        <div class="register_form">
            <h2>ثبت نام کنید</h2>
            <form class="register" enctype="multipart/form-data">
                <br>
                <label for="fname">نام</label>
                <br>
                <input type="text" name="fname" id="fname" required>
                <br>
                <label for="lname">نام خانوادگی</label>
                <input type="text" name="lname" id="lname" required>
                <br>
                <label for="register_email">ایمیل</label>
                <br>
                <input type="email" name="register_email" id="register_email" class="ltr" required>
                <br>
                <label for="register_password">رمز</label>
                <br>
                <input type="password" name="register_password" id="register_password" class="ltr" required>
                <br>
                <label for="register_password2">تکرار رمز</label>
                <br>
                <input type="password" name="register_password2" id="register_password2" class="ltr" required>
                <br>
                <button id="register_btn" onclick="register()">ثبت نام</button>
                <br>
                <div class="register_msg" id="register_msg"></div>
                <br>
                <br>
            </form>
        </div>
    </div>

    <br>
    <br>
    <?php include_once('src/inc/jdf.php'); ?>
    <div class="footer">تمام حقوق محفوظ است &copy;<?php echo jdate('Y') ?></div>
    

    <script src="src/js/jquery-3.6.1.min.js"></script>
    <script>

        document.getElementById("login_btn").addEventListener("click", function(event){
            event.preventDefault();
        });
        document.getElementById("register_btn").addEventListener("click", function(event){
            event.preventDefault();
        });

        function login()
        {

            var em = document.getElementById("login_email").value;
            var pass = document.getElementById("login_password").value;

            //step1
            var xhttp = new XMLHttpRequest();
            //step2
            xhttp.open("POST", "http://localhost:80/php/relyab/src/inc/login_ajax.php");
            //step3
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("login_msg").innerHTML = this.responseText;
                    var txt = this.responseText;
                    let s = txt.includes("عزیز وارد شدید");
                    if(s)
                    {
                        setTimeout(() => {
                            window.location.href = "index2.php";
                        }, 1500);
                    }
                }
            };

            //step4
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            //step5
            var data = "email=" + em + "&password=" + pass;
            xhttp.send(data);
        }

        function register()
        {
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var em = document.getElementById("register_email").value;
            var password = document.getElementById("register_password").value;
            var password2 = document.getElementById("register_password2").value;

            if(password != password2)
            {
                document.getElementById("register_msg").innerHTML = "<h3 style='color: red;'>تکرار رمز مطابقت ندارد</h3>";
                return;
            }
            else
            {
                var msg = document.getElementById("register_msg").value;
                if(msg == "<h3 style='color: red;'>تکرار رمز مطابقت ندارد</h3>")
                {
                    document.getElementById("register_msg").innerHTML = "";
                }
            }

            //step1
            var xhttp = new XMLHttpRequest();
            //step2
            xhttp.open("POST", "http://localhost:80/php/relyab/src/inc/register_ajax.php");
            //step3
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("register_msg").innerHTML = this.responseText;
                }
            };

            //step4
            //xhttp.setRequestHeader("Content-type", "multipart/form-data; charset=utf-8;");
            //xhttp.setRequestHeader("Content-type","multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2));
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            //step5
            var data = "username=" + "" + "&fname=" + fname + "&lname=" + lname + "&email=" + em + "&password=" + password + "&password2=" + password2;
            xhttp.send(data);
        }
    </script>
</body>

</html>