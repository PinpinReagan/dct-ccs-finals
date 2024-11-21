<?php
include '../../functions.php'; // Include necessary functions
include '../partials/header.php';

$logoutPage = '../logout.php';
$dashboardPage = '../dashboard.php';
$studentPage = '../student/register.php';
$subjectPage = './add.php';
include '../partials/side-bar.php';

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $student_data = getStudentById($student_id); // Assuming you have a function to get student data

    if (isPost()) {
        $subject_code = postData("subject_code");
        attachSubjectToStudent($student_id, $subject_code); // Assuming you have a function to attach subject
    }

    // Get all available subjects
    $subjects = fetchSubjects();
} else {
    // Handle case where student ID is missing
    echo "Invalid student ID.";
    exit();
}

?>

<div class="col-md-9 col-lg-10">
    <h3 class="text-left mb-5 mt-5">Attach Subject to Student</h3>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="add.php">Subjects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attach Subject</li>
        </ol>
    </nav>

    <!-- Student Details -->
    <div class="card p-4 mb-5">
        <h4>Student Details</h4>
        <ul>
            <li><strong>Student ID:</strong> <?= htmlspecialchars($student_data['student_id']) ?></li>
            <li><strong>First Name:</strong> <?= htmlspecialchars($student_data['first_name']) ?></li>
            <li><strong>Last Name:</strong> <?= htmlspecialchars($student_data['last_name']) ?></li>
        </ul>
    </div>

    <!-- Attach Subject Form -->
    <div class="card p-4 mb-5">
        <form method="POST">
            <div class="mb-3">
                <label for="subject_code" class="form-label">Select Subject</label>
                <select name="subject_code" id="subject_code" class="form-control" required>
                    <option value="">Select a Subject</option>
                    <?php foreach ($subjects as $subject) : ?>
                        <option value="<?= htmlspecialchars($subject['subject_code']) ?>">
                            <?= htmlspecialchars($subject['subject_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm w-100">Attach Subject</button>
        </form>
    </div>

    <!-- Current Subjects List -->
    <div class="card p-4">
        <h3 class="card-title text-center">Current Subjects for Student</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assuming you have a function to get subjects attached to a student
                $student_subjects = fetchStudentSubjects($student_id);
                if (!empty($student_subjects)) :
                    foreach ($student_subjects as $subject) :
                ?>
                        <tr>
                            <td><?= htmlspecialchars($subject['subject_code']) ?></td>
                            <td><?= htmlspecialchars($subject['subject_name']) ?></td>
                        </tr>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="2" class="text-center">No subjects attached to this student.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
