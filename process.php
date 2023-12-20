<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Display the submitted data
    echo "<h2>Submitted Information:</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
} else {
    // Redirect to the form if accessed directly
    header("Location: index.php");
    exit();
}
?>

