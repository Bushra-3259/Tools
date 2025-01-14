<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] !== "student") {
    header("location:sign_in.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome to Student Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="sign_out.php">Sign Out</a>
</body>
</html>
