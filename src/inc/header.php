<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: ../../index.php");
}
// include external libs
include_once("jdf.php");

// include my own stuff i program
include_once("globals.php");
include_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>

    <!-- start container div -->
    <div class="container">

        <div class="header">
            <nav>
                <section class="user">
                    <h3>
                        <?php
                        echo $_SESSION['fname'] . " " . $_SESSION['lname'];
                        ?>
                        عزیز خوش آمدید
                    </h3>
                </section>
                <section class="menu">
                    <ul>
                        <li>پروفایل</li>
                        <li>پیام ها</li>
                        <li>جستجو</li>
                    </ul>
                </section>
            </nav>
        </div>