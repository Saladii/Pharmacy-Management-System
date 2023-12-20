<?php
require('./connect.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists
    $user_query = "SELECT id, password FROM fields WHERE Username = ?";
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $stored_hash);

    if ($stmt->fetch() && password_verify($password, $stored_hash)) {
        // Login successful, redirect to dashboard or another page
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/common/common.css"> <!-- Add common styles -->
    <link rel="stylesheet" href="../css/specific/login.css"> <!-- Add login-specific styles -->
    <link rel="stylesheet" href="../css/enhanced.css"> <!-- Add enhanced styles -->
    <style>
        body {
            background-image: url('../image/image.jpg'); /* Add the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Ensure full coverage of the viewport */
            margin: 0; /* Remove default margin */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background for better readability */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Login</h2>
            <?php if (isset($login_error)) { ?>
                <p class="error"><?php echo $login_error; ?></p>
            <?php } ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
</body>
</html>

