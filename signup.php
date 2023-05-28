<?php
include_once("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <main>
        <h2>Sign up</h2>
        <form action="./inc/signup-inc.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Sign up</button>
        </form>

        <?php

        switch ($_GET['error']) {
            case 'none':
                echo "Utente registrato!";
                break;
            case 'emptyInput':
                echo "Riempi tutti i campi!";
                break;
            case 'invalidUsername':
                echo "Username non valido!";
                break;
            case 'invalidEmail':
                echo "Email non valida!";
                break;
            case 'usernameTaken':
                echo "username gia' esistente";
                break;
            case 'stmtFailed':
                echo "stmt Failed";
                break;
            default:
                break;

        }
        ?>

    </main>
</body>



</html>