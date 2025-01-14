<?php
session_start();
error_reporting(E_ALL);

// Database connection
$host = "localhost:3306";
$user = "root";
$password = "";
$db = "student_info_sys";

$data = new mysqli($host, $user, $password, $db);

if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $data->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $name, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = $row['usertype'];

        if ($row["usertype"] == "student") {
            header("location:student_home.php");
        } elseif ($row["usertype"] == "admin") {
            header("location:admin_home.php");
        }
    } else {
        $_SESSION['sign_in_message'] = "Username or password do not match.";
        header("location:sign_in.php");
    }
}
?>
