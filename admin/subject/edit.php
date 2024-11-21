<?php 
// Include essential files and utilities
include '../../functions.php'; 
dashboardguard();

// Define navigation paths
$logoutPage = '../logout.php';

// Include common header and sidebar components
require '../partials/header.php';
require '../partials/side-bar.php';
?>

<div class="col-md-9 col-lg-10">
    <!-- Page Title -->
    <h3 class="mb-5 mt-5 text-left">Edit Subject</h3>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="add.php">Add Subject</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Subject</li>
        </ol>
    </nav>

    <!-- Edit Subject Form -->
    <div class="card p-4 mb-5">
        <form method="POST">
            <div class="mb-3">
                <label for="subject_code" class="form-label">Subject Code</label>
                <!-- Input field for subject code (disabled) -->
                <input type="text" class="form-control" id="subject_code" name="subject_code" value="" disabled>
            </div>
            <div class="mb-3">
                <label for="subject_name" class="form-label">Subject Name</label>
                <!-- Input field for subject name -->
                <input type="text" class="form-control" id="subject_name" name="subject_name" value="">
            </div>
            <!-- Submit button to update the subject -->
            <button type="submit" class="btn btn-primary btn-sm w-100">Update Subject</button>
        </form>
    </div>
</div>

<?php
// Include common footer component
require '../partials/footer.php';
?>
