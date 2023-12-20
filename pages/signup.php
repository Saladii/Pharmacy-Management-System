<?php
require('connect.php');

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Check if username already exists
        $check_query = "SELECT id FROM fields WHERE Username = '$username'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            $message = "Username already exists. Please choose a different one.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database with the hashed password
            $insert_query = "INSERT INTO fields (Username, Password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($insert_query) === TRUE) {
                // Registration successful
                $message = "Registration successful!";
                echo '<script>
                        alert("' . $message . '");
                        window.location.href = "index.php";
                      </script>';
                exit();
            } else {
                $message = "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Sign Up</h2>
            <?php if (!empty($message)) { ?>
                <p class="message"><?php echo $message; ?></p>
            <?php } ?>
            <link rel="stylesheet" href="../css/specific/signup.css">
            <link rel="stylesheet" href="/css/common/common.css">
            <link rel="stylesheet" href="/css/enhanced.css">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>
</body>
</html>

