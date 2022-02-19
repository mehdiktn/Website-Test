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
            <h1>Create your account</h1>
            <div class="formCont">
                <form action="scripts/sign-up.php" method="post">
                    <input type="hidden" name="referer" value="../signUpPage.php" />
                    <label for="email">Email:</label>
                    <br>
                    <input type="email" id="email" name="email" required>
                    <br>
                    <label for="password">Password:</label>
                    <br>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <label for="cpinput">Confirm Password:</label>
                    <br>
                    <input type="password" id="cpinput" name="cpinput" required>
                    <br>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </main>
        <footer>
            <p></p>
        </footer>
    </body>

</html>
