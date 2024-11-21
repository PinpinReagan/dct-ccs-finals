<?php

// Database Configuration
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "dct-ccs-finals");

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to open a database connection
function openCon() {
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$con) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    return $con;
}

// Function to close a database connection
function closeCon($con) {
    mysqli_close($con);
}

// Function to retrieve records from the database
function getRec($con, $strSql) {
    $arrRec = [];
    if ($rs = mysqli_query($con, $strSql)) {
        if (mysqli_num_rows($rs) === 1) {
            $arrRec = mysqli_fetch_assoc($rs);
        } elseif (mysqli_num_rows($rs) > 1) {
            while ($rec = mysqli_fetch_assoc($rs)) {
                $arrRec[] = $rec;
            }
        }
        mysqli_free_result($rs);
    } else {
        die("ERROR: Query failed.");
    }
    return $arrRec;
}

// Function to execute an insert query and return the last inserted ID
function executeInsertLastQuery($con, $strSql) {
    if (mysqli_query($con, $strSql)) {
        return mysqli_insert_id($con);
    }
    return 0;
}

// Function to sanitize input
function sanitize($con, $input) {
    return mysqli_real_escape_string($con, stripcslashes(htmlspecialchars($input)));
}

// Function to validate email input
function validateEmail($email) {
    if (empty($email)) {
        return "Email is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email.";
    }
    return '';
}

// Function to validate password input
function validatePassword($password) {
    if (empty($password)) {
        return "Password is required.";
    }
    return '';
}

// Function to authenticate a user by email and password
function authenticateUser($email, $password, $con) {
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, md5($password));

    $strSql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    if ($result = mysqli_query($con, $strSql)) {
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['email'] = $email; // Set session variable
            header('Location: admin/Dashboard.php');
            mysqli_free_result($result);
            exit;
        } else {
            return "Invalid email or password.";
        }
    }
    return "ERROR: Could not execute your request.";
}

// Function to guard dashboard access
function dashboardGuard() {
    $loginPage = '../index.php';
    if (!isset($_SESSION['email'])) {
        header("Location: $loginPage");
        exit;
    }
}

// Function to guard pages for non-logged-in users
function guard() {
    $dashboard = 'admin/dashboard.php';
    if (isset($_SESSION['email'])) {
        header("Location: $dashboard");
        exit;
    }
}

// Function to log out the user
function logout($indexPage) {
    unset($_SESSION['email']); // Unset session variable
    session_destroy();         // Destroy session
    header("Location: $indexPage");
    exit;
}
?>
