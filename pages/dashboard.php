<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<link rel="stylesheet" href="../css/common/commom.css">
<link rel="stylesheet" href="../css/specific/dashboard.css">
<link rel="stylesheet" href="/css/enhanced.css">

    <h1>Welcome, <?php echo $username; ?>!</h1>
        <div class="dashboard-content">
            <p>This is your personalized dashboard.</p>
            <!-- Add your additional dashboard content here -->
        </div>

        <footer>
            <p><a href="logout.php">Logout</a></p>
        </footer>
    </div>


<?php include 'includes/footer.php'; ?>

