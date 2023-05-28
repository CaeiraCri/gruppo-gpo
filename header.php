<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav>

        <h1>Arpae <span>Ambiente</span> </h1>
        <ul class="list-container">

            <li class="list-item"><a href="./index.php">Home</a></li>

            <?php
            if (isset($_SESSION['userId'])) {
                //echo "<li class='list-item'><a href='./profile.php'>Profilo</a></li>";
                echo "<li class='list-item'><a href='./inc/logout-inc.php'>Log out</a></li>";
            } else {
                echo "<li class='list-item'><a href='./signup.php'>Sign up</a></li>";
                echo "<li class='list-item'><a href='./login.php'>Log in</a></li>";
            }
            ?>

        </ul>

    </nav>
</body>

</html>