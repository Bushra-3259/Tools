<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "C223272_SIS";

$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details from the database
    $sql = " SELECT * FROM user WHERE email='$email' AND password='$pass' " ;
    $result = mysqli_query($data, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            echo "Welcome, user with ID: " . $row['id'];
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with this email.";
    }

    mysqli_close($data);
}
?>
