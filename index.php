<?php
    session_start();

    // If the user is logged in then redirect them to the logged in home page
    if (isset($_SESSION['userID'])) {
        header("Location: home.php");
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
                        <li><a href="loginPage.php">Login</a></li>
                        <li><a href="signUpPage.php">Sign up</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="mainCont">
                <h1 style="font-size:2.5em;">Welcome to Gamblytics</h1>
                <p>Our carefully developed performance analytics are available to support our users
                    as they reduce their gambling losses. We provide in-depth statistical analysis,
                    looking at performance on a game-by-game basis, as well as compiling data to
                    show each user overall trends in their gambling history.</p>
                <p></p>
                <h1>The cost:</h1>
                <p>That's the best part. Gamblytics is completely free. We're also ad free. Amazing.</p>
                <p></p>
                <h1>What we track:</h1>
                <p>We offer the ablity to track any casino game or any type of gambling. Any game not listed below
                    will still recieve our standard analytics when classed as misc.
                </p>
                <ul>
                    <li>Poker</li>
                    <li>Blackjack</li>
                    <li>Roulette</li>
                    <li>Baccarat</li>
                    <li>Slots</li>
                    <li>Misc</li>
                </ul>
                <h1>Our goal:</h1>
                <p>Gambling is well integrated into UK culture, is widely available, and can often be regarded
                    as simply a bit of fun.
                    While it is possible to gamble responsibly, many people are struggling to recover from
                    compulsive gambling.
                    Once a habit has been established it is hard to break, and compulsive gamblers can struggle
                    with debt and depression.
                    Gamblytics aims to provide an early intervention to prevent our users from becoming addicted
                    and engage with gambling in a way that is more sustainable, or disengage from it entirely.
                </p>
            </div>
        </main>
        <footer>
            <p></p>
        </footer>
    </body>

</html>
