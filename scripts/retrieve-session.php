<?php

// Load the configuration file containing your database credentials


function GetSessions($id=null)
{
    require_once('config.inc.php');
    // Connect to the group database
    $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

    // Check for errors before doing anything else
    if ($conn -> connect_error) {
        die('Connect Error ('.$conn -> connect_errno.') '.$conn -> connect_error);
    }

    if (isset($_SESSION['userID'])) {
        // user logged in so run request
        if (!is_null($id)) {
            $sessionID = $id;
            $stmt = $conn -> prepare("SELECT * FROM session_information WHERE user_id = ? AND session_id = ?");
            $stmt -> bind_param("ii", $_SESSION['userID'], $sessionID);
        } else {
            $stmt = $conn -> prepare("SELECT * FROM session_information WHERE user_id = ?");
            $stmt -> bind_param("i", $_SESSION['userID']);
        }
        $stmt -> execute();
        $result = $stmt -> get_result();

        // Check for no results
        if ($result->num_rows == 0) {
            // header('HTTP/1.0 404 Not Found');
            return "404";
        } else {
            $results = array();

            // Loop each row and add it to the list
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $results[] = $row;
            }

            // Output the list as a JSON
            // header('Content-Type: application/json; charset=utf-8');
            return json_encode($results);
        }
    } else {
        // Not logged in
        // header('HTTP/1.0 403 Forbidden');
        return "403";
    }
    $conn -> close();
}
