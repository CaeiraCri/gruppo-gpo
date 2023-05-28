<?php
    include_once("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">    


</head>
<body>
    <main>
        <?php
            if (isset($_SESSION['userId'])) {
                echo "<h1>Qui Mappa</h1>";
            } else {
                echo "<h1>ACCEDI</h1>";
            }
        ?>
    </main>
</body>
</html>