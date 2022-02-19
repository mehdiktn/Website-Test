<?php
    session_start();

    // If the user is not logged in then redirect them back to the welcome page
    if (!isset($_SESSION['userID'])) {
        header("Location: index.php");
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
                        <li><a href="scripts/log-out.php">Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="mainCont">
                <form action="scripts/upload-session.php" method="post">
                    <input type="number" name="buyIn" placeholder="How much did you buy in for?" required>
                    <input type="number" name="cashOut" placeholder="How much did you cash out for?" required>
                    <input type="datetime-local" name="startTime" required>
                    <input type="datetime-local" name="endTime" required>
                    <select id="gameType" name="gameType">
                        <option value="poker">Poker</option>
                        <option value="blackjack">BlackJack</option>
                    </select>
                    <input type="submit">
                </form>
            </div>
        </main>
        <footer>
            <p></p>
        </footer>
    </body>

</html>
