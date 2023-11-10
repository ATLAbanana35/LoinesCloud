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
setcookie("USERSP", $_GET["p"], time()+10000, "/");
setcookie("USERSM", $_GET["m"], time()+10000, "/");
?>
        <div class="message">Vous êtes bien connecté.</div>
        <button>
            <a style="color: white;text-decoration: none;" href="./panel">Panel</a>
        </button>
    </div>
</body>

</html>