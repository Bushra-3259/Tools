<?php

error_reporting(0);
session_start();

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "student_info_sys"; // Intentionally incorrect database name for testing

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    // Show a warning message if the connection fails
    die("connection error");
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql="select * from user where email ='".$email."' AND password = '".$password."' "

    $result= mysqli_query($data, $sql);

    $row= mysqli_fetch_array($result);

    if($row["usertype"]=="student")
    {
        $_SESSION['email']=$email;
        header("location:student_home.php");
    }
    
    elseif($row["usertype"]=="admin")
    {
        $_SESSION['email']=$email;
        header("location:admin_home.php");
    }
    else //if email & pw none matches
    {
        $message= "email or pw do not match";

        $_SESSION['sign_in_message']=$message;

        header("location: sign_in.php");
    }
?>
