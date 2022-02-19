<?php
    session_start();

    if (!isset($_GET['id'])) {
        // No Session ID specified
        header("Location: home.php");
        exit;
    } else {
        $id = $_GET['id'];
    }

    // If the user is not logged in then redirect them back to the welcome page
    if (!isset($_SESSION['userID'])) {
        header("Location: index.php");
        exit;
    }
?>

<?php
    require_once('scripts/retrieve-session.php');
    $result = GetSessions($id);

    if ($result == "404") {
        // header('HTTP/1.0 404 Not Found');
        http_response_code(404);
        exit;
    } elseif ($result == "403") {
        // header('HTTP/1.0 403 Forbidden');
        http_response_code(403);
        exit;
    } else {
        $sessions = json_decode($result, true);
        $session = $sessions[0];
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
        <link rel="icon" href="favicon.ico">
        <meta charset="utf-8" />
        <title>Gamblytics</title>
    </head>

    <body>
        <header>
            <div class="headerCont">
                <div class="headerBrand">
                    Gamblytics
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="uploadSessionPage.php">Upload Session</a></li>
                        <li><a href="scripts/log-out.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <h1>Type: <?php echo $session['game_type'] ?></h1>
            <h2>Buy In: <?php echo $session['buy_in'] ?></h2>
            <h2>Cash Out: <?php echo $session['cash_out'] ?></h2>
            <h3>Start Time: <?php echo $session['start_time'] ?></h3>
            <h3>End Time: <?php echo $session['end_time'] ?></h3>
        </main>
        <footer>
            <p></p>
        </footer>
    </body>

</html>
