<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("location:sign_in.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Home</h1>
    <a href="sign_out.php">Sign Out</a>
</body>
</html>