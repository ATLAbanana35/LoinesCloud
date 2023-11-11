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
    <script src="assets/js/add2.js"></script>
    <link rel="stylesheet" href="./assets/css/add.css">
</head>

<body>
    <!-- https://codepen.io/soufiane-khalfaoui-hassani/pen/LYpPWda -->
    <div class="login-box" style="display: none;">
        <h2>Loines Cloud</h2>
        <form>
            <h2>Conditions d’utilisation</h2>
            <h6 style="overflow: scroll;height: 100px;">

                Cookies et services analytics :
                Nous utilisons le service Google Analytics à des fins strictement informatives et non lucratives. Cela
                <br>
                nous permet d'obtenir des données anonymes sur l'utilisation de notre Cloud afin d'améliorer nos <br>
                services. Les cookies d'Analytics peuvent être utilisés pour collecter des informations telles que <br>
                l'heure de connexion, les pages visitées et la durée de la dernière visite. De plus, nous utilisons un
                <br>
                cookie (COOKIES_OK) pour enregistrer si vous avez accepté notre politique de cookies. <br>
                <br>
                Cookies stockés : <br>
                Lorsque vous utilisez notre Cloud, nous stockons certains cookies pour faciliter votre expérience <br>
                utilisateur. Les cookies USERSP et USERSM sont utilisés pour enregistrer votre nom d'utilisateur et <br>
                votre mot de passe (si vous êtes connecté) de manière sécurisée. Ces cookies ne sont pas partagés avec
                <br>
                des tiers et s <br>
                Acceptation des conditions : En utilisant notre Cloud, vous acceptez pleinement les présentes conditions
                <br>
                d'utilisation. Si vous n'êtes pas d'accord avec l'une des conditions énoncées ci-dessous, veuillez ne
                <br>
                pas utiliser notre service. <br>
                <br>
                Droits de propriété intellectuelle : Tout le contenu, y compris les fichiers, les documents, les images
                <br>
                et les vidéos, téléchargés ou partagés sur notre Cloud, reste la propriété de leurs propriétaires <br>
                respectifs. Vous êtes entièrement responsable du contenu que vous téléchargez et partagez sur notre <br>
                Cloud et vous devez disposer des droits nécessaires pour le faire. <br>
                <br>
                Utilisation acceptable : Vous vous engagez à n'utiliser notre Cloud que de manière légale, éthique et
                <br>
                responsable. Il est strictement interdit de télécharger, stocker ou partager du contenu illégal, <br>
                nuisible, diffamatoire, obscène, offensant ou autrement répréhensible. <br>
                <br>
                Confidentialité et sécurité : Nous prenons la sécurité et la confidentialité de vos données au sérieux.
                <br>
                Toutefois, nous ne pouvons garantir la sécurité absolue des informations que vous partagez sur notre
                <br>
                Cloud. Nous vous encourageons à utiliser des mots de passe forts et à protéger vos informations <br>
                personnelles. <br>
                <br>
                Responsabilité : Notre service de Cloud est fourni tel quel, sans garantie d'aucune sorte. Nous <br>
                déclinons toute responsabilité en cas de perte de données, de dommages ou de perturbations liés à <br>
                l'utilisation de notre Cloud. <br>
                <br>
                Suspension ou résiliation : Nous nous réservons le droit de suspendre ou de résilier votre accès à notre
                <br>
                Cloud à tout moment, sans préavis, si vous enfreignez l'une de ces conditions d'utilisation. <br>
                <br>
                Modifications : Nous nous réservons le droit de modifier ces conditions d'utilisation à tout moment. Les
                <br>
                modifications prendront effet dès leur publication sur notre site Web. Il est de votre responsabilité de
                <br>
                consulter régulièrement ces conditions pour rester informé des mises à jour. <br>
            </h6>
            <a href="#" class="IAgree">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                I Agree
            </a>
            <!-- https://codepen.io/webLeister/pen/XwGENz -->
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
            <div class="buttonADD" style="display: none;">

                <!-- <h1>Fizzy CSS Button</h1>
                <h2>With super fizzy particle action</h2>
                <a class="a" href="https://www.codepen.io/jcoulterdesign">
                    <i class="ion-social-codepen"></i>
                    <span>More Codepen shenanigans</span>
                </a> -->
                <input class="inputAdd" id="buttonADD" type="checkbox"></input>
                <label for="buttonADD">
                    <div class="buttonADD_inner q">
                        <i class="l ion-log-in"></i>
                        <span class="t">Créer</span>
                        <span>
                            <i class="tick ion-checkmark-round"></i>
                        </span>
                        <div class="b_l_quad">
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                            <div class="buttonADD_spots"></div>
                        </div>
                    </div>
                </label>
                <progress value="0" max="1"></progress>
                <div class="infos">Statut : </div>
            </div>

        </form>
    </div>
    <header>
        <div class="mem">
            <h4>Mémoire : </h4>
            <progress max="25000000"
                value="<?php echo DirSize("CLOUD") ?>"></progress><?php echo floor(DirSize("CLOUD")/800000) ?>/24Mo
        </div>
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
            <h1>Ajouter une app <span class="close">⬆️</span></h1>
            <article>
                <div class="calendar">
                    <h3>Loines Calendrier</h3>
                    <div class="container">
                        <!-- https://codepen.io/aaroniker/pen/MWgNKGr -->
                        <a class="button calendarBUTTON dark" onclick="add('calendar');">
                            <ul>
                                <li>Ajouter</li>
                                <li>Preparation</li>
                                <li>Ouvrir</li>
                            </ul>
                            <div>
                                <svg viewBox="0 0 24 24"></svg>
                            </div>
                        </a>

                    </div>

                    <!-- dribbble -->
                    <a class="dribbble" href="https://dribbble.com/shots/7299868-Download-Buttons" target="_blank"><img
                            src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg"
                            alt=""></a>
                </div>
                </div>
                <div class="todo">
                    <h3>Loines ToDo List</h3>
                    <!-- https://codepen.io/aaroniker/pen/MWgNKGr -->

                    <div class="container">

                        <a href="" class="button todoBUTTON dark" onclick="add('todo');">
                            <ul>
                                <li>Ajouter</li>
                                <li>Preparation</li>
                                <li>Ouvrir</li>
                            </ul>
                            <div>
                                <svg viewBox="0 0 24 24"></svg>
                            </div>
                        </a>

                    </div>

                    <!-- dribbble -->
                    <a class="dribbble" href="https://dribbble.com/shots/7299868-Download-Buttons" target="_blank"><img
                            src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg"
                            alt=""></a>
                </div>
                <div class="LWPS">
                    <h3>LoinesWebPress Social (Créez votre propre réseau social)</h3>
                    <!-- https://codepen.io/aaroniker/pen/MWgNKGr -->

                    <div class="container">

                        <a href="" class="button lwpsBUTTON dark" onclick="add('lwps');">
                            <ul>
                                <li>Ajouter</li>
                                <li>Preparation</li>
                                <li>Ouvrir</li>
                            </ul>
                            <div>
                                <svg viewBox="0 0 24 24"></svg>
                            </div>
                        </a>

                    </div>

                    <!-- dribbble -->
                    <a class="dribbble" href="https://dribbble.com/shots/7299868-Download-Buttons" target="_blank"><img
                            src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg"
                            alt=""></a>
                </div>
                <div class="quiz">
                    <h3>LoinesQuiz</h3>
                    <!-- https://codepen.io/aaroniker/pen/MWgNKGr -->

                    <div class="container">

                        <a href="" class="button quizBUTTON dark" onclick="add('lquiz');">
                            <ul>
                                <li>Ajouter</li>
                                <li>Preparation</li>
                                <li>Ouvrir</li>
                            </ul>
                            <div>
                                <svg viewBox="0 0 24 24"></svg>
                            </div>
                        </a>

                    </div>

                    <!-- dribbble -->
                    <a class="dribbble" href="https://dribbble.com/shots/7299868-Download-Buttons" target="_blank"><img
                            src="https://cdn.dribbble.com/assets/dribbble-ball-mark-2bd45f09c2fb58dbbfb44766d5d1d07c5a12972d602ef8b32204d28fa3dda554.svg"
                            alt=""></a>
                </div>
                </div>
            </article>
        </section>
    </main>

    <script src="assets/js/panel.js"></script>
    <script src="assets/js/add.js"></script>

</body>

</html>