<?php
// Include required functions and ensure access to the dashboard
require '../functions.php';
verifyDashboardAccess();

$logoutPage = 'logout.php';
$subjectAddPage = './subject/add.php';
$studentRegistrationPage = './student/register.php';

require './partials/header.php';
require './partials/sidebar.php';

// Fetch necessary statistics
$subjectCount = getSubjectCount();
$studentCount = getStudentCount();
$passFailStatistics = getPassFailStatistics();

?>

<!-- Main Dashboard Content -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5">    
    <h1 class="h2">Admin Dashboard</h1>        
    
    <div class="row mt-5">
        <div class="col-12 col-xl-3">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Total Subjects:</div>
                <div class="card-body text-primary">
                    <h5 class="card-title"><?=$subjectCount?></h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Total Students:</div>
                <div class="card-body text-success">
                    <h5 class="card-title"><?=$studentCount?></h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card border-danger mb-3">
                <div class="card-header bg-danger text-white">Failed Students:</div>
                <div class="card-body text-danger">
                    <h5 class="card-title"><?=$passFailStatistics['failed']?></h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-white">Passed Students:</div>
                <div class="card-body text-success">
                    <h5 class="card-title"><?=$passFailStatistics['passed']?></h5>
                </div>
            </div>
        </div>
    </div>    
</main>

<!-- Include Footer -->
<?php
    require './partials/footer.php';
?>
