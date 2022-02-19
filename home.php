<?php
    session_start();

    // If the user is not logged in then redirect them back to the welcome page
    if (!isset($_SESSION['userID'])) {
        header("Location: index.php");
    }
?>
<?php
    require_once('scripts/retrieve-session.php');
    $result = GetSessions();

    if ($result == "404") {
        $sessions = [];
    } elseif ($result == "403") {
        $sessions = [];
    } else {
        $sessions = json_decode($result, true);
    }

    function html_table($data = array())
    {
        $rows = array();
        foreach ($data as $row) {
            $cells = array();
            $cells[] = "<td>{$row['game_type']}</td>";
            $cells[] = "<td>{$row['buy_in']}</td>";
            $cells[] = "<td>{$row['cash_out']}</td>";
            $cells[] = "<td>{$row['start_time']}</td>";
            $cells[] = "<td>{$row['end_time']}</td>";
            $rows[] = "<tr onclick=\"window.location='session.php?id={$row['session_id']}';\">" . implode('', $cells) . "</tr>";
        }
        return implode('', $rows);
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
            <div class="mainCont">
                <h1 style="font-size:2.5em;">Overview</h1>
                <p>Welcome back.</p>
                <table style="color:white">
                    <tr>
                        <th>Session Type</th>
                        <th>Buy In Amount</th>
                        <th>Cash Out Amount</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    <?php echo html_table($sessions) ?>
                </table>
            </div>
        </main>
        <footer>
            <p></p>
        </footer>
    </body>

</html>
