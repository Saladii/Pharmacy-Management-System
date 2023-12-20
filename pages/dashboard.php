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

<div class="container-fluid">
    <h1>Welcome, <?php echo $username; ?>!</h1>

    <div class="dashboard-content">
        <p>This is your personalized dashboard.</p>

        <!-- Additional sections -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Store</h5>
                        <p class="card-text">View and manage store information.</p>
                        <a href="medicine_list.php" class="btn btn-primary">Go to medicine list</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pharmacy</h5>
                        <p class="card-text">Manage pharmacy store.</p>
                        <a href="store_list.php" class="btn btn-primary">Go to store list</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Damaged Medicines</h5>
                        <p class="card-text">Handle damaged or expired medicines.</p>
                        <a href="damage_list.php" class="btn btn-primary">Go to Damaged Medicines list</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of additional sections -->

    </div>

    <footer class="mt-4">
        <p><a href="logout.php">Logout</a></p>
    </footer>
</div>

<?php include '../includes/footer.php'; ?>

