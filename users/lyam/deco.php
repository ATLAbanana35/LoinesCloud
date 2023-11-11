<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnections</title>
    <style>
    body {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
    }

    .panel {
        width: 100%;
        height: 100%;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .message {
        font-size: 2em;
        font-weight: 700;
        color: #000;
    }

    button {
        margin-top: 1em;
        background-color: #000;
        color: #fff;
        font-size: 1em;
        font-weight: 700;
        padding: 1em;
        border: none;
        cursor: pointer;
    }
    </style>
    </style>
</head>

<body>
    <div class="panel">

        <?php
    $USER_PSEUDO = $_COOKIE["USERSP"];
    $USER_PASSWORD = $_COOKIE["USERSM"];
setcookie("USERSP", "", time()-1);
setcookie("USERSM", "", time()-1);

?>
        <button><a style="color: white;text-decoration: none;"
                href="./reconnect?p=<?php echo $USER_PSEUDO; ?>&m=<?php echo $USER_PASSWORD; ?>">C'était une
                erreur?</a></button>
        <div class="message">Vous êtes bien déconnecté.</div>
    </div>

</body>

</html>