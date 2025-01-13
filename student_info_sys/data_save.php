<?php
//die("Dta");
include 'db_connection.php';

//echo '<pre>';
//print_r($connection);
//print_r($_POST);
$studentID = $_POST['s_id']; // Student ID input
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];

mysqli_query($connection,"INSERT INTO user (S_ID,Email,Password,Confirm_Password) values('$studentID','$email','$password', '$confirmPassword')");
echo "Data has been saved successfully";
//header("location:index_submit.php"); //Redirect to index.php



?>