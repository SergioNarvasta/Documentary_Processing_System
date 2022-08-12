<?php

    if (isset($_SESSION["auth"]) && $_SESSION["auth"] == "1") {
        header("location: principal.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <?php
        include("cabecera.php");
    ?>
</head>
<body>
    <div class="message-container"></div>
    <div class="container centered fullscreen">
        <?php
            require("form-register.php");
        ?>
    </div>
</body>
</html>