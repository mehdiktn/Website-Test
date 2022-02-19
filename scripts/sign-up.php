<?php

// Get credentials from request
$referer = $_POST['referer'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['cpinput'];

// Load the configuration file containing your database credentials
require_once('../config.inc.php');

// Connect to the group database
$conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else
if ($conn -> connect_error) {
    die('Connect Error ('.$conn -> connect_errno.') '.$conn -> connect_error);
}

// Check whether both passwords entered are identical (confirm password)
if ($password !== $confirm_password) {
    $errcode = "?error_code=003";
    header("Location: $referer$errcode");
} else {
    // Check email is new
    $stmt = $conn -> prepare("SELECT * FROM user_account WHERE email = ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt -> get_result();
    // Check for no matches
    if ($result->num_rows == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt2 = $conn -> prepare("INSERT INTO `user_account` (id, email, password) VALUES (NULL, ?, ?)");
        $stmt2 -> bind_param("ss", $email, $hash);
        $result = $stmt2 -> execute();
        if ($result) {
            header('Location: ../loginPage.php');
        } else {
            $errcode = "?error_code=001";
            header("Location: $referer$errcode");
        }
    } else {
        $errcode = "?error_code=002";
        header("Location: $referer$errcode");
    }
}

$conn -> close();
