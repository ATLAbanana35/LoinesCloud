<?php
include_once "pin.php";
if (!empty($_POST)) {
    if (password_verify($_POST["password"], $code) && json_decode(file_get_contents("user_infos.json"))->name === $_POST["user"]) {
echo "password_ok";
session_start();
setcookie("USERSP", $_POST["user"], time()+999999);
$_SESSION["pin"] = $_POST["password"];
header("Location: panel.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <!--do the code for login validation
 login/submit button-->
    <section>

        <div class="box">

            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="square" style="--i:5;"></div>

            <div class="container">
                <div class="form">
                    <h2>LOGIN</h2>
                    <h6>Code By : https://codepen.io/DivineBlow/pen/bGwYYPQ</h6>
                    <form action="login.php" method="post">
                        <div class="inputBx">
                            <input name="user" type="text" required="required">
                            <span>Login</span>
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="inputBx password">
                            <input name="password" id="password-input" type="password" name="password"
                                required="required">
                            <i class="fa-solid fa-eye" id="togglePassword"
                                style="position:absolute;left:85%;top:31%;color:black;font-size:17px;cursor:pointer"></i>
                            <span>Password</span>

                            <i class="fas fa-key"></i>


                        </div>

                        <div class="inputBx">
                            <input type="submit" value="Log in" style="font-weight:600">
                        </div>
                    </form>
                    <p>Connect with Loines Account <a href="./LC.php">Click Here</a></p>
                    <p>Don't have an account <a href="https://sing.loines.ch">Sign up</a></p>
                </div>
            </div>

        </div>
    </section>
    <script src="./lib/com.micku7zu.vanilla-tilt/index.js"></script>
    <script src="https://kit.fontawesome.com/46f4246223.js" crossorigin="anonymous"></script>
    <script src="./assets/js/login.js"></script>
</body>

</html>