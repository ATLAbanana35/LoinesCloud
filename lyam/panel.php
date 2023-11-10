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
        <a href="./cloud.php">
            <svg style="cursor: pointer; color: black;" xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z" />
                <path
                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
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
        <section class="YourDay">
            <h1>Votre Actu <span class="close">⬆️</span></h1>
            <article>
                <div class="calendar">
                    <h4>Calendrier</h4>

                    <div class="day">Pas de calendrier ajoutez-en un ICI : <button
                            onclick="window.location = 'add.php'">Ajouter une application</button></div>
                    <div class="sandBox"></div>
                    <div class="iframe"></div>
                </div>
                <div class="todo">
                    <h4>ToDoList</h4>
                    <ul class="todoList">

                        Pas de ToDo List ajoutez-en un ICI : <button onclick="window.location = 'add.php'">Ajouter une
                            application</button>
                    </ul>
                    <div class="iframe"></div>
                    <div class="sandBox"></div>
                </div>
            </article>
        </section>
        <section class="Apps">
            <h1>Vos Applications et Services <span class="close">⬆️</span></h1>
            <article>
                <article>
                    <div class="utils">
                        Utilitaires :
                        <br>
                        <app>
                            <button onclick="window.location = 'add.php'" class="TODO gray">ToDo List</button>
                            <br>
                            <button onclick="window.location = 'add.php'" class="CALENDAR gray">Calendrier</button>
                        </app>
                    </div>
                    <div class="amusement">
                        Amusement :
                        <br>
                        <app>
                            <button onclick="window.location = 'add.php'" class="small-font LWPS gray">LWPS
                                (LoinesWebPress Social)</button>
                            <br>
                            <button onclick="window.location = 'add.php'" class="LQUIZ gray">LQuiz</button>
                        </app>
                    </div>
                </article>
                <article>
                    <div class="navigation" style="display: none;">
                        <h1>Navigation rapide : </h1>
                        <ul>
                            <li>LWPS :
                                <ul>
                                    <li><button onclick="window.location = './CLOUD/apps/lwps/home';">Home
                                            (Invité)</button></li>
                                    <li><button onclick="window.location = './CLOUD/apps/lwps/lwp-admin';">Panel
                                            d'administration</button></li>
                                    <li><button
                                            onclick="window.location = './CLOUD/apps/lwps/lwp-admin/plugin.php';">Panel
                                            d'ajout de plug-ins</button></li>
                                    <li><button
                                            onclick="window.location = './CLOUD/apps/lwps/lwp-admin/modifyPage.php';">Panel
                                            de
                                            modification de page</button></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </article>
            </article>
        </section>
    </main>
    <script src="assets/js/panel.js"></script>
    <script src="assets/js/clientGet.js"></script>
</body>

</html>