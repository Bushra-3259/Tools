<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "student_info_sys";

$connection = mysqli_connect($host, $user, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    echo "Connection successful!";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['s_id']; // Student ID input
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.location.href='signup.php';</script>";
        exit();
    }

    // Hash the password for secure storage
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email or Student ID already exists in the database
    $checkUserQuery = "SELECT * FROM user WHERE Email = ? OR S_ID = ?";
    $stmt = $data->prepare($checkUserQuery);
    $stmt->bind_param("ss", $email, $studentID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email or Student ID already exists. Please try another.'); window.location.href='signup.php';</script>";
        exit();
    }

    // Insert user details into the database (including Student ID)
    $insertQuery = "INSERT INTO user (S_ID, Email, Password, `Confirm Password`) VALUES (?, ?, ?, ?)";
    $stmt = $data->prepare($insertQuery);
    $stmt->bind_param("ssss", $studentID, $email, $hashedPassword, $confirmPassword);

    if ($stmt->execute()) {
        echo "<script>alert('Sign up successful! You can now log in.'); window.location.href='sign_in.html';</script>";
    } else {
        echo "<script>alert('Error: Could not sign up. Please try again later.'); window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $data->close();
}
?>
