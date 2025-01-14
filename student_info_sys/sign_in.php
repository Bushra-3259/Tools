<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('home_img.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .logo-container {
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70px;
            width: 100%;
            background-color: rgba(240, 240, 240, 0.9);
            z-index: 1000;
        }

        .logo-img {
            height: 70px;
            width: auto;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container a {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        <img src="iiuc_logo.jpg" alt="IIUC Logo" class="logo-img">
    </div>

    <div class="form-container">
        <h2>Sign In</h2>
        <?php
        session_start();
        if (isset($_SESSION['sign_in_message'])) {
            echo "<p style='color: red;'>{$_SESSION['sign_in_message']}</p>";
            unset($_SESSION['sign_in_message']);
        }
        ?>
        <form action="sign_in_check2.php" method="POST">
            <input type="text" name="username" placeholder="Enter your Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Sign In</button>
        </form>
        <a href="sign_up.php">Not a member yet? Sign Up</a>
    </div>
</body>
</html>
