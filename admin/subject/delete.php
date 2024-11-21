<?php 
// Include necessary utility and guard functions
include '../../functions.php'; 
dashboardguard();

// Define paths for navigation
$logoutPage = '../logout.php';

// Include shared header and sidebar components
require '../partials/header.php';
require '../partials/side-bar.php';
?>

<div class="col-md-9 col-lg-10">
    <!-- Page Title -->
    <h3 class="mb-5 mt-5 text-left">Delete Subject</h3>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="add.php">Add Subject</a></li>
            <li class="breadcrumb-item active" aria-current="page">Delete Subject</li>
        </ol>
    </nav>

    <!-- Deletion Confirmation Section -->
    <div class="border p-5">
        <p>Are you sure you want to delete the following subject record?</p>
        <ul>
            <li><strong>Subject Code:</strong> <!-- Dynamic data to be inserted here --></li>
            <li><strong>Subject Name:</strong> <!-- Dynamic data to be inserted here --></li>
        </ul>

        <!-- Confirmation Form -->
        <form method="POST">
            <a href="add.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-danger">Delete Subject Record</button>
        </form>
    </div>
</div>

<?php
// Include shared footer component
require '../partials/footer.php';
?>
