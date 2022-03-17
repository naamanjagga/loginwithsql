<?php
$host = "mysql-server";
$username = "root";
$pass = "secret";
$database = "mydatabase";

$conn = mysqli_connect($host, $username, $pass, $database);

if (isset($_POST['btn1'])) {
    $sign_name = $_POST['name'];
    $sign_username = $_POST['username'];
    $sign_email = $_POST['email'];
    $sign_password = $_POST['password'];
    $sign_confirm_password = $_POST['confirm_password'];


    $query = "SELECT * FROM `signin` WHERE `email` = '$sign_email' ";
    
    $result = mysqli_query($conn, $query);
    $r = mysqli_fetch_assoc($result);
    echo $r[`email`];
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "Email Already Exist";
    } else {



        $query = "INSERT INTO `signin`(`id`, `name`, `username`, `email`, `password`, `confirm_password`) VALUES (null,'$sign_name','$sign_username','$sign_email','$sign_password','$sign_confirm_password')";
        $result = mysqli_query($conn, $query);
        echo '<h1>Hello ' . $sign_name . ' ..!</h1>';
        echo '<br>';
        echo '<h1>Thanks for being the new member<h1>';
    }
}
if (isset($_POST['btn2'])) {

    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $query = "SELECT * FROM `signin` WHERE `email` = '$login_email' AND `password` = '$login_password'";
    $result = mysqli_query($conn, $query);
    $r = mysqli_fetch_assoc($result);
    echo '<h1> Hello..! ' . $r['name'] . '<h1>';
}
