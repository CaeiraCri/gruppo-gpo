<?php
    include_once("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>
    <main>
        <h2>Login</h2>
        <form action="./inc/login-inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>

        <?php

            switch($_GET['error']) {
                case 'wrongPassword':
                    echo "Password errata!";
                    break;
                case 'wrongInputs':
                    echo "Informazioni sbagliate";
                    break;
                default:
                break;

            }
        ?>

    </main>
</body>
</html>