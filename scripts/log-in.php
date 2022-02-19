<?php

session_start();

// Get credentials from request
$referer = $_POST['referer'];
$email = $_POST['email'];
$password = $_POST['password'];

// Load the configuration file containing your database credentials
require_once('../config.inc.php');

// Connect to the group database
$conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else
if ($conn -> connect_error) {
    die('Connect Error ('.$conn -> connect_errno.') '.$conn -> connect_error);
}

// Get hashed password if email in database
$stmt = $conn -> prepare("SELECT * FROM user_account WHERE email = ?");
$stmt -> bind_param("s", $email);
$stmt -> execute();
$result = $stmt -> get_result();
// Check for no matches
if ($result->num_rows == 0) {
    // Email does not exist
    $errcode = "?error_code=001";
    header("Location: $referer$errcode");
} else {
    // Email exists
    // Now check password match
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    if (password_verify($password, $info['password'])) {
        $_SESSION['userID'] = $info['id'];
        header('Location: ../home.php');
    } else {
        $errcode = "?error_code=001";
        header("Location: $referer$errcode");
    }
}

$conn -> close();
