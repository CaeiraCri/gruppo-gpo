<?php
function createUser($conn, $name, $email, $password)
{
    $sql = "INSERT INTO db_users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?)";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

function checkEmptyInputSignup($name, $email, $password)
{
    $result = false;

    if (empty($name) || empty($email) || empty($password)) {
        $result = true;
    }

    return $result;
}

function checkUsername($name)
{
    $result = false;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    }

    return $result;
}

function checkEmail($email)
{
    $result = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }

    return $result;
}

function checkUsernameTaken($conn, $username)
{
    $sql = "SELECT * FROM db_users WHERE usersName = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

//LOGIN FUNCS

function checkEmptyInputLogin($name, $password)
{
    $result = false;

    if (empty($name) || empty($password)) {
        $result = true;
    }

    return $result;
}

function loginUser($username, $password)
{
    $servername = "localhost";
    $dbname = "my_cristiancaeira";
    $dbuser = "cristiancaeira";
    $dbpassword = "";

    $conn = mysqli_connect($servername, $dbuser, $dbpassword, $dbname);

    $usernameExists = checkUsernameTaken($conn, $username);

    if ($usernameExists == false) {
        header("location: ../login.php?error=wrongInputs");
        exit();    

    }
    $passwordHashed = $usernameExists['usersPwd'];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword == false) {
        header("location: ../login.php?error=wrongPassword");
        exit();
    } else if ($checkPassword == true) {
        session_start();
        $_SESSION['userId'] = $usernameExists['usersId'];
        $_SESSION['usersName'] = $usernameExists['usersName'];
        header("location: ../index.php");
        exit();
    }
}
