<?php
include_once "./lib/ch.loines.phpCloud/phpCloud.php";
session_start();
include_once "pin.php";
if (!empty($_SESSION["pin"])) {
    if (password_verify($_SESSION["pin"], $code)) {
    } else {
        echo "VOUS N'ÊTES PAS AUTORISÉ À ACCEDER À CETTE PAGE <script>setTimeout(() => {window.location = './login.php';}, 4000)</script>";
        exit;
        }
} else {
    echo "VOUS N'ÊTES PAS AUTORISÉ À ACCEDER À CETTE PAGE <script>setTimeout(() => {window.location = './login.php';}, 4000)</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - LoinesCloud</title>
    <link rel="stylesheet" href="./assets/css/panel.css">
</head>

<body>
    <header>
        <div class="mem">
            <h4>Mémoire : </h4>
            <progress max="25000000"
                value="<?php echo DirSize("CLOUD") ?>"></progress><?php echo floor(DirSize("CLOUD")/800000) ?>/24Mo
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="black" class="bi bi-chevron-compact-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M9.224 1.553a.5.5 0 0 1 .223.67L6.56 8l2.888 5.776a.5.5 0 1 1-.894.448l-3-6a.5.5 0 0 1 0-.448l3-6a.5.5 0 0 1 .67-.223z" />
        </svg>
        <a href="./panel.php">
            <svg style="cursor: pointer; color: black;" xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
                <path
                    d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            </svg>
        </a>
        <div class="user_infos">
            <div class="app">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor"
                    class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                    <path
                        d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z" />
                </svg>
            </div>
            <h1>
                <span class="userLogo"><?php
                echo substr($_COOKIE["USERSP"],0,1);
                ?></span>
            </h1>
        </div>
        <h3>Powered by <a style="color: black;" href="https://github.com/xdan/jodit">Jodit <img
                    src="https://raw.githubusercontent.com/xdan/jodit/main/examples/assets/logo.png"
                    alt="JODIT LOGO IMAGE" width="50"></a></h3>
    </header>
    <div class="UserInfosMenu">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
            class="bi bi-chat-square-fill UserLogoChatLogo" viewBox="0 0 16 16">
            <path
                d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
        </svg>
        <button class="small-font manageAccount">Gérer le compte ( <?php echo $_COOKIE["USERSP"] ?> )</button>
        <button class="deco">Déconnexion</button>
    </div>
    <main>
        <?php
if (!empty($_GET["file"])) {
    
}
?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
            integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <textarea id="editor" name="editor"></textarea>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.9/jodit.es2018.en.min.css"
            integrity="sha512-+LpgB/uFVQcOMxLotyK9/l67AqyqBJMnz0rLDcSDtCZ/5h0vdGrbrWt1MnNhe6qWOJ06Qs8+qkfniww4WzoCEQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.24.9/jodit.min.js"
            integrity="sha512-6aIYUpIVYMx6EdN2TBchmmoIn+I45MJrYbbr66XZTnr0WnleWlhMbj2jVW8jlZ0fFxWSJmSKIO3muUyPJfRA4Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
        let XML = new XMLHttpRequest();
        XML.open("GET", "<?php echo $_GET["file"] ?>");
        XML.responseType = "text";
        XML.onload = function() {
            const editor = Jodit.make("#editor", {
                extraButtons: [{
                    name: 'SAVE',
                    iconURL: './assets/img/save.svg',
                    exec: function(editor) {
                        try {
                            const XML = new XMLHttpRequest();
                            XML.open("GET",
                                "./CLOUD/fileAction.php?action=updateHTML&val_1=" +
                                "<?php echo $_GET["file"]; ?>".replace("./CLOUD/_", "") +
                                "&val_2=" +
                                encodeURI(document.querySelector(".jodit-wysiwyg")
                                    .innerHTML)
                            )
                            XML.responseType = "text";
                            XML.onload = function() {
                                if (XML.status === 200) {
                                    swal("Sauvegardé", {
                                        icon: "success"
                                    });
                                } else {
                                    swal("Une erreur est survenue lors de l'accès à ./CLOUD/fileAction.php (ERREUR coté serveur), ERROR_" +
                                        XML.statut + "_YOUR_CLOUD_IS_CORROMPT", {
                                            icon: "error"
                                        });
                                }
                            }

                            XML.send();

                        } catch (error) {
                            swal("Une erreur est survenue lors de la requête (erreur coté client) DÉTAILS : " +
                                error, {
                                    icon: "error"
                                });
                        }
                    }
                }]

            });
            editor.value = XML.responseText;
            document.querySelectorAll(".jodit-icon").forEach((element) => {
                if (element.style.backgroundImage == 'url("./assets/img/save.svg")') {
                    element.style.width = "28px";
                    element.style.height = "28px";
                    element.classList.add("SAVE_BUTTON");
                }
            });
            if (localStorage.getItem("FIRST") !== "false") {
                swal(
                        "Pour sauvegarder, cliquez sur le nuage en rouge (cliquez sur OK pour le tutoriel) :", {
                            icon: "info"
                        })
                    .then((
                        value) => {
                        localStorage.setItem("FIRST", "false")
                        setTimeout(() => {
                            if (localStorage.getItem("L_1st") != "true") {
                                document.querySelector(".SAVE_BUTTON").style.transition = "1s";
                                document.querySelector(".SAVE_BUTTON").style.width = "100px";
                                document.querySelector(".SAVE_BUTTON").style.height = "100px";
                                document.querySelector(".SAVE_BUTTON").style.zIndex = "1000";
                                document.querySelector(".SAVE_BUTTON").style.position = "relative";
                                setTimeout(() => {
                                    document.querySelector(".SAVE_BUTTON").style.width = "28px";
                                    document.querySelector(".SAVE_BUTTON").style.height =
                                        "28px";
                                }, 1000);
                            }
                        }, 1000);
                    })
            }

        }
        XML.send();
        </script>
    </main>
    <script src="assets/js/panel.js"></script>
    <script src="assets/js/clientGet.js"></script>
    <div class="style">
        <style>
        .swal-text {
            font-family: Arial;
        }
        </style>
    </div>
</body>

</html>