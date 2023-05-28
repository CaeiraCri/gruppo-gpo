<?php

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'db-inc.php';
    require_once 'functions-inc.php';

    if (checkEmptyInputSignup($name, $email, $password) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }

    if (checkUsername($name) !== false) {
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }

    if (checkEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (checkUsernameTaken($conn, $name) !== false) {
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $name, $email, $password);

} else {
    header("location: ../signup.php?error=prova");
    exit();
}