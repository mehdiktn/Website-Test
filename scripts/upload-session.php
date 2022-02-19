<?php

session_start();

$buyIn = $_POST['buyIn'];
$cashOut = $_POST['cashOut'];
$startTime = date('Y-m-d H:i:s', strtotime($_POST['startTime']));
$endTime = date('Y-m-d H:i:s', strtotime($_POST['endTime']));
$gameType = $_POST['gameType'];

// Load the configuration file containing your database credentials
require_once('../config.inc.php');

// Connect to the group database
$conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else
if ($conn -> connect_error) {
    die('Connect Error ('.$conn -> connect_errno.') '.$conn -> connect_error);
}

if (isset($_SESSION['userID'])) {
    // Run Request
    $stmt = $conn -> prepare("INSERT INTO session_information (session_id, user_id, buy_in, cash_out, start_time, end_time, game_type) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param("iiisss", $_SESSION['userID'], $buyIn, $cashOut, $startTime, $endTime, $gameType);
    $result = $stmt -> execute();

    var_dump($result);
    var_dump($stmt -> error);

    if ($result) {
        header('Location: ../home.php');
    } else {
        // Something went wrong
        header('HTTP/1.0 500 Internal Server Error');
    }
} else {
    // Not logged in
    header('HTTP/1.0 403 Forbidden');
}

$conn -> close();
