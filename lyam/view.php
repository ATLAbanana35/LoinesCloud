<?php
include_once "./lib/ch.loines.phpCloud/phpCloud.php";
if (DirSize("CLOUD") > 24000000) {
    echo "Votre Cloud Dépasse la taille limite <a href='./delete.php'>SUPPRIMER TOUT</a> ou <a href='mailto: contact@loines.ch'>M'envoyer un mail</a>";
    exit;
}
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
if (!empty($_FILES)) {
    $target_dir = "CLOUD/";

    if (!empty($_GET["folder"])) {
        $target_dir = $_GET["folder"]."/";
    }
    
    $target_file = $target_dir . basename($_FILES["fileup"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $maxFileSize = 24000000; // 24 Mo en octets
    
    // List of potentially dangerous file extensions
    $dangerousFileTypes = array(
        "php","php1","php2","php3","php4","php5","php6", "cgi", "pl", "exe", "sh", "bash",
        "htaccess", "ini", "conf", "env",
        "bak", "backup", "tmp", "temp", "~",
        "log", "access", "error",
        "db", "sql", "mdb", "sqlite",
        "js", "py",
        "phar", "phtml",
        "jar", "war",
        "hiddenfile", "config"
    );
    
    if (in_array($fileType, $dangerousFileTypes)) {
        echo "Sorry, uploading files of this type is not allowed.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["fileup"]["size"] > $maxFileSize) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileup"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileup"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
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
        <div class="search">
            <input type="text" placeholder="search" />
            <div class="symbol">
                <svg class="cloud">
                    <use xlink:href="#cloud" />
                </svg>
                <svg class="lens">
                    <use xlink:href="#lens" />
                </svg>
            </div>
        </div>

        <!-- SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="cloud">
                <path d="M31.714,25.543c3.335-2.17,4.27-6.612,2.084-9.922c-1.247-1.884-3.31-3.077-5.575-3.223h-0.021
              C27.148,6.68,21.624,2.89,15.862,3.931c-3.308,0.597-6.134,2.715-7.618,5.708c-4.763,0.2-8.46,4.194-8.257,8.919
              c0.202,4.726,4.227,8.392,8.991,8.192h4.873h13.934C27.784,26.751,30.252,26.54,31.714,25.543z" />
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="lens">
                <path d="M15.656,13.692l-3.257-3.229c2.087-3.079,1.261-7.252-1.845-9.321c-3.106-2.068-7.315-1.25-9.402,1.83
              s-1.261,7.252,1.845,9.32c1.123,0.748,2.446,1.146,3.799,1.142c1.273-0.016,2.515-0.39,3.583-1.076l3.257,3.229
              c0.531,0.541,1.404,0.553,1.95,0.025c0.009-0.008,0.018-0.017,0.026-0.025C16.112,15.059,16.131,14.242,15.656,13.692z M2.845,6.631
              c0.023-2.188,1.832-3.942,4.039-3.918c2.206,0.024,3.976,1.816,3.951,4.004c-0.023,2.171-1.805,3.918-3.995,3.918
              C4.622,10.623,2.833,8.831,2.845,6.631L2.845,6.631z" />
            </symbol>
        </svg>

        <!--- ## DRIBBBLE + TWITTER ############# -->
        <!-- CREATOR OF THE SEARCH MENU : https://dribbble.com/shots/10879114-Search-animation-Only-CSS -->
        <ul>
            <li> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder"
                    viewBox="0 0 16 16">
                    <path
                        d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                </svg><a href="./cloud.php" style="color: black; text-decoration: none;"> Dossiers</a></li>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-filetype-html" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-9.736 7.35v3.999h-.791v-1.714H1.79v1.714H1V11.85h.791v1.626h1.682V11.85h.79Zm2.251.662v3.337h-.794v-3.337H4.588v-.662h3.064v.662H6.515Zm2.176 3.337v-2.66h.038l.952 2.159h.516l.946-2.16h.038v2.661h.715V11.85h-.8l-1.14 2.596H9.93L8.79 11.85h-.805v3.999h.706Zm4.71-.674h1.696v.674H12.61V11.85h.79v3.325Z" />
                </svg><a href="./website.php" style="color: black; text-decoration: none;">Site Web</a></li>
            <li><span class="current"></span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="#106EBE" class="bi bi-eye" viewBox="0 0 16 16">
                    <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg><strong>Apercu</strong></li>
        </ul>
        <div class="menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path
                    d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
            </svg>
            <div class="content" style="display: none;">
                <ul>
                    <li>
                        <label class="affichiercacher" style="cursor: pointer;" for="affichiercacher">Afficher les
                            dossier cachés (⚠️ VOUS
                            POUVEZ CORROMPRE VOS
                            APPS)</label>
                        <input style="display: none;" type="checkbox" id="affichiercacher">
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="centered">
            <div class="plus" id="plus">
                <div class="plus__line plus__line--v">
                    <a href="#" class="plus__link ion-images"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                            <path
                                d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z" />
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg></a>
                    <a href="#" class="plus__link ion-music-note"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                            <path
                                d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
                            <path
                                d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
                        </svg></a>
                    <a href="#" class="plus__link ion-location"><svg xmlns="http://www.w3.org/2000/svg" width="32"
                            height="32" fill="currentColor" class="bi bi-filetype-html" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-9.736 7.35v3.999h-.791v-1.714H1.79v1.714H1V11.85h.791v1.626h1.682V11.85h.79Zm2.251.662v3.337h-.794v-3.337H4.588v-.662h3.064v.662H6.515Zm2.176 3.337v-2.66h.038l.952 2.159h.516l.946-2.16h.038v2.661h.715V11.85h-.8l-1.14 2.596H9.93L8.79 11.85h-.805v3.999h.706Zm4.71-.674h1.696v.674H12.61V11.85h.79v3.325Z" />
                        </svg></a>
                </div>
                <div class="plus__line plus__line--h"></div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
                integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
                integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
            document.querySelector(".ion-images").addEventListener("click", () => {
                swal("Entrez le fichier : ");
                document.querySelector(".swal-text").innerHTML += `
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

<div class="container center">
	<div class="row">
		<div class="col-md-12">
        <button type="button" id="btnup" class="btn btn-primary btn-lg">Browse for your file!</button>
        		</div>
	</div>
	
	<form name="upload" method="post" action="#" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center">
				<div class="btn-container">
					<!--the three icons: default, ok file (all), error file (certain files are not allowed!)-->
					<h1 class="imgupload"><i class="fa fa-file-image-o"></i></h1>
					<h1 class="imgupload ok"><i class="fa fa-check"></i></h1>
					<h1 class="imgupload stop"><i class="fa fa-times"></i></h1>
					<!--this field changes dinamically displaying the filename we are trying to upload-->
					<p id="namefile">error file (certain files are not allowed!)</p>
					<!--our custom btn which which stays under the actual one-->
					<!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
					<input type="file" value="" name="fileup" id="fileup">
				</div>
			</div>
		</div>
			<!--additional fields-->
		<div class="row">			
			<div class="col-md-12">
				<!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
				<input type="submit" value="Submit!" class="btn btn-primary" id="submitbtn">
				<button type="button" class="btn btn-default" disabled="disabled" id="fakebtn">Submit! <i class="fa fa-minus-circle"></i></button>
			</div>
		</div>
	</form>
</div>
<style>/*just bg and body style*/
.container{
background-color:#1E2832;
padding-bottom:20px;
margin-top:10px;
border-radius:5px;
}
.center{
text-align:center;  
}
#top{
margin-top:20px;  
}
.btn-container{
background:#fff;
border-radius:5px;
padding-bottom:20px;
margin-bottom:20px;
}
.white{
color:white;
}
.imgupload{
color:#1E2832;
padding-top:40px;
font-size:7em;
}
#namefile{
color:black;
}
h4>strong{
color:#ff3f3f
}
.btn-primary{
border-color: #ff3f3f !important;
color: #ffffff;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
background-color: #ff3f3f !important;
border-color: #ff3f3f !important;
}

/*these two are set to not display at start*/
.imgupload.ok{
display:none;
color:green;
}
.imgupload.stop{
display:none;
color:red;
}


/*this sets the actual file input to overlay our button*/
#fileup{
opacity: 0;
-moz-opacity: 0;
filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
width:100%;
top: 0;
cursor: pointer;
position:absolute;
left: 50%;

transform: translateX(-50%);
bottom: 40px;
height: 50%;
}

/*switch between input and not active input*/
#submitbtn{
  padding:5px 50px;
  display:none;
}
#fakebtn{
  padding:5px 40px;
}


/*www.emilianocostanzo.com*/
#sign{
	color:#1E2832;
	position:fixed;
	right:10px;
	bottom:10px;
	text-shadow:0px 0px 0px #1E2832;
	transition:all.3s;
}
#sign:hover{
	color:#1E2832;
	text-shadow:0px 0px 5px #1E2832;
}</style>

            <a href="http://www.emilianocostanzo.com" target="_blank" id="sign">EMI</a>
            `;
                $('#fileup').change(function() {
                    //here we take the file extension and set an array of valid extensions
                    var res = $('#fileup').val();
                    var arr = res.split("\\");
                    var filename = arr.slice(-1)[0];
                    filextension = filename.split(".");
                    filext = filextension.slice(-1)[0];
                    invalid = ["php", "php1", "php2", "php3", "php4", "php5", "php6", "cgi", "pl",
                        "exe", "sh", "bash",
                        "htaccess", "ini", "conf", "env",
                        "bak", "backup", "tmp", "temp", "~",
                        "log", "access", "error",
                        "db", "sql", "mdb", "sqlite",
                        "js", "py",
                        "phar", "phtml",
                        "jar", "war",
                        "hiddenfile", "config"
                    ];
                    console.log(filext);
                    //if file is not valid we show the error icon, the red alert, and hide the submit button
                    if (invalid.indexOf(filext.toLowerCase()) != -1) {
                        $(".imgupload").hide("slow");
                        $(".imgupload.ok").hide("slow");
                        $(".imgupload.stop").show("slow");

                        $('#namefile').css({
                            "color": "red",
                            "font-weight": 700
                        });
                        $('#namefile').html("File " + filename +
                            " is not allowed (system/server file)!");

                        $("#submitbtn").hide();
                        $("#fakebtn").show();
                    } else {
                        //if file is valid we show the green alert and show the valid submit
                        $(".imgupload").hide("slow");
                        $(".imgupload.stop").hide("slow");
                        $(".imgupload.ok").show("slow");

                        $('#namefile').css({
                            "color": "green",
                            "font-weight": 700
                        });
                        $('#namefile').html(filename);

                        $("#submitbtn").show();
                        $("#fakebtn").hide();
                    }
                });
            });
            var plus = document.getElementById('plus');

            function plusToggle() {
                plus.classList.toggle('plus--active');
            }

            plus.addEventListener('click', plusToggle);
            </script>
            <style>
            .plus {
                width: 100px;
                cursor: pointer;
                transition: all 0.3s ease 0s;
                height: 100px;
                background: #ffe581;
                border-radius: 50%;
                display: flex;
                position: relative;
            }

            .plus__line {
                width: 6px;
                height: 50px;
                background: #000;
                border-radius: 10px;
                position: absolute;
                left: calc(50% - 3px);
                top: calc(50% - 25px);
            }

            .plus__line--h {
                transform: rotate(90deg);
            }

            .plus__line--v {
                display: flex;
                align-items: center;
                justify-content: space-around;
                overflow: hidden;
                transition: all 0.4s ease 0s;
            }

            .plus__link {
                color: #fff;
                font-size: 30px;
                opacity: 0;
                visibility: hidden;
                transition: 0.3s ease 0s;
                transform: scale(0.5);
            }

            .plus--active {
                height: 32px;
                border-radius: 30px;
            }

            .plus--active .plus__line--v {
                height: 68px;
                top: calc(-100% - 60px);
                padding: 0 5px;
                box-sizing: border-box;
                width: 220px;
                border-radius: 60px;
                left: calc(50% - 110px);
            }

            .plus--active .plus__link {
                opacity: 1;
                visibility: visible;
                transform: scale(1);
                transition-delay: 0.05s;
            }

            .centered {
                display: flex;
                width: 100%;
                height: 100%;
                align-items: center;
                justify-content: center;
            }
            </style>
        </div>

        <folders>
            <h1>Liste des fichiers lisibles : </h1>
            <?php
function read_dir($Rep)
{
    echo "<script>const InnerFolder = '$Rep'</script>";

    $Racine=opendir($Rep);
    $RepExplodeR = $Rep;
    str_replace("./", "", $Rep);
    $RepExplode = explode("/", $RepExplodeR);
    $valueTOT = "";
    foreach ($RepExplode as $value) {
        if ($value === "CLOUD") {
            echo "<a style='color: black; text-decoration: none;border: 1px solid black;' href='./cloud.php'>$value/</a>";
            $valueTOT .= $value."/";
        } else {
            $valueTOT .= $value."/";
        echo "<a style='color: black; text-decoration: none; border: 1px solid black;' href='./cloud.php?folder=$valueTOT'>$value/</a>";
        }
    }
    while($Dossier = readdir($Racine))
    {
      if ( $Dossier != '..' And $Dossier !='.' )
      {
        
        //Ajoute la taille du sous dossier
        if(is_dir($Rep.'/'.$Dossier)) {
            $resvar = "";
            $resvar2 = "";
            $resvar3 = "";
            if ($Dossier=="apps") {$resvar = "class='hidden'";$resvar2 = "display: none;";$resvar3 = "style='filter: grayscale(70%);'";}
echo '            <folder '.$resvar.'style="display: flex; align-items: center;justify-content: space-around;'.$resvar2.'">
<a style=" cursor: pointer;" href="./view.php?folder='.str_replace("//", "/",$Rep."/".$Dossier).'">
    <img '.$resvar3.' src="./assets/img/folder.png" alt="Folder Image" width="100">
</a>
<h3>'.$Dossier.'</h3>
<div class="menu">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
        <path
            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
    </svg>
    <div class="content" style="display: none;">
        <ul>
            <li class="FILE_ACTION_RENAME" data-from="'.$Rep."/".$Dossier.'">Renommer</li>
            <li class="FILE_ACTION_DELETE" data-from="'.$Rep."/".$Dossier.'">Supprimer</li>
            <li>Détails</li>
        </ul>
    </div>
</div>
</folder>';
        }
        else {
            $extensionsAutorisees = [
                "html", "htm", "css", "js", "json", "xml", "txt", "md",
                "png", "jpg", "jpeg", "gif", "webp", "svg",
                "pdf", "webp", "mp3", "mp4", "webm", "csv",
                "xls", "xlsx", "doc", "docx"
            ];
            $extensionsAutoriseesJSVIEWER = [
                "odt", "ods", "odp", "odg", "odf", "pdf"
            ];
            
            // Chemin du fichier à vérifier
            $cheminDuFichier = $Dossier;
            
            // Obtenir l'extension du fichier
            $extension = pathinfo($cheminDuFichier, PATHINFO_EXTENSION);
            
            // Vérifier si l'extension est autorisée
            
            if (in_array(strtolower($extension), $extensionsAutorisees)) {
            echo '            <file style="display: flex; align-items: center;justify-content: space-around;" data-ext="'.pathinfo($Dossier, PATHINFO_EXTENSION).'">
            <div class="file-icon"></div>
            <h3><a style="color: black; text-decoration: none;" href="'.$Rep."/".$Dossier.'">'.$Dossier.'</a></h3>
            <div class="menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                </svg>
                <div class="content" style="display: none;">
                    <ul>
                        <li class="FILE_ACTION_RENAME" data-from="'.$Rep."/".$Dossier.'">Renommer</li>
                        <li><a style="color: black; text-decoration: none;" download href="'.$Rep."/".$Dossier.'">Télécharger</a></li>
                        <li class="FILE_ACTION_DELETE" data-from="'.$Rep."/".$Dossier.'">Supprimer</li>
                        <li><a style="color: black; text-decoration: none;" href="'.$Rep."/".$Dossier.'">Afficher (Navigateur)</a></li>
                        <li><a style="color: black; text-decoration: none;" href="viewer/#../'.$Rep."/".$Dossier.'">Afficher (ViewerJS)</a></li>
                        <li>Détails</li>
                    </ul>
                </div>
            </div>
        </file>';
            } elseif (in_array(strtolower($extension), $extensionsAutoriseesJSVIEWER)) {
                echo '            <file style="display: flex; align-items: center;justify-content: space-around;" data-ext="'.pathinfo($Dossier, PATHINFO_EXTENSION).'">
                <div class="file-icon"></div>
                <h3><a style="color: black; text-decoration: none;" href="viewer/#../'.$Rep."/".$Dossier.'">'.$Dossier.'</a></h3>
                <div class="menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                    <div class="content" style="display: none;">
                        <ul>
                            <li class="FILE_ACTION_RENAME" data-from="'.$Rep."/".$Dossier.'">Renommer</li>
                            <li><a style="color: black; text-decoration: none;" download href="'.$Rep."/".$Dossier.'">Télécharger</a></li>
                            <li class="FILE_ACTION_DELETE" data-from="'.$Rep."/".$Dossier.'">Supprimer</li>
                            <li><a style="color: black; text-decoration: none;" href="'.$Rep."/".$Dossier.'">Afficher (Navigateur)</a></li>
                            <li><a style="color: black; text-decoration: none;" href="viewer/#../'.$Rep."/".$Dossier.'">Afficher (ViewerJS)</a></li>
                            <li>Détails</li>
                        </ul>
                    </div>
                </div>
            </file>';
    
            }
        }

      }
    }
    closedir($Racine);
}
if (!empty($_GET["folder"]) && strpos(realpath($_GET["folder"]), "CLOUD")) {
    read_dir(str_replace("//", "/",$_GET["folder"]));
} else {
read_dir("./CLOUD/_");
}        ?>
            <!-- <folder style="display: flex; align-items: center;justify-content: space-around;">
                <a style=" cursor: pointer;" href="./cloud.php?folder=$FolderName">
                    <img src="./assets/img/folder.png" alt="Folder Image" width="100">
                </a>
                <h3>$FolderName</h3>
                <div class="menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                    <div class="content" style="display: none;">
                        <ul>
                            <li>Renommer</li>
                            <li>Supprimer</li>
                            <li>Détails</li>
                        </ul>
                    </div>
                </div>
            </folder>
            <file style="display: flex; align-items: center;justify-content: space-around;" data-ext="png">
                <div class="file-icon"></div>
                <h3>$FileName</h3>
                <div class="menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                    </svg>
                    <div class="content" style="display: none;">
                        <ul>
                            <li>Renommer</li>
                            <li>Supprimer</li>
                            <li>Afficher (Navigateur)</li>
                            <li>Afficher (LoinesCLoudView)</li>
                            <li>Détails</li>
                        </ul>
                    </div>
                </div>
            </file> -->
        </folders>
        <script>
        $(".ion-music-note").click(function() {
            const folder_name = prompt(
                "Nom du dossier (Pour mettre dans un sous-dossier : sous-dossier/dossier)", InnerFolder
                .replace("./CLOUD/_/", ""));
            const XML = new XMLHttpRequest();
            XML.open("GET", "./CLOUD/fileAction.php?action=addFolder&val_1=" + folder_name)
            XML.responseType = "text";
            XML.onload = function() {
                swal("L'opération est un succès!", {
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            }
            XML.send();
        });
        $(".ion-location").click(function() {
            const folder_name = prompt(
                "Nom du fichier (pour la page d’accueil du site/dossier mettez index)", InnerFolder.replace(
                    "./CLOUD/_/", "") +
                "index");
            const XML = new XMLHttpRequest();
            XML.open("GET", "./CLOUD/fileAction.php?action=addHTMLFile&val_1=" + folder_name)
            XML.responseType = "text";
            XML.onload = function() {
                swal("L'opération est un succès!", {
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            }
            XML.send();
        });
        document.querySelector(".search input").addEventListener("input", (e) => {
            let input = e.target.value;
            document.querySelectorAll("file,folder").forEach((element) => {
                if (element.querySelector("h3").textContent.indexOf(input) == -1) {
                    element.style.display = "none";
                } else {
                    if (!element.classList.contains("hidden")) {
                        element.style.display = "flex";
                    }
                }
            })
        });
        document.querySelector("#affichiercacher").addEventListener("click", () => {
            document.querySelector(".affichiercacher").style.color = "blue"
            document.querySelectorAll(".hidden").forEach(element => {
                element.style.display = "flex";
            });
            document.querySelector("#affichiercacher").addEventListener("click", () => {
                document.querySelector(".affichiercacher").style.color = "black";
                document.querySelectorAll(".hidden").forEach(element => {
                    element.style.display = "none";
                });
            });
        });
        document.querySelectorAll(".bi-three-dots-vertical").forEach(element => {
            element.addEventListener('click', () => {
                element.parentNode.querySelector(".content").style.display = "block";
                element.addEventListener('click', () => {
                    element.parentNode.querySelector(".content").style.display = "none";
                });
            });
        });
        document.querySelectorAll(".FILE_ACTION_RENAME").forEach(element => {
            element.addEventListener("click", () => {
                const XML = new XMLHttpRequest();
                XML.open("GET", "./CLOUD/fileAction.php?action=rename&val_1=" + element.dataset.from
                    .replace("./CLOUD/_/", "") +
                    "&val_2=" + prompt("Nouvelle Value", element.dataset.from.split(".")[0]
                        .replace("./CLOUD/_/", "")))
                XML.responseType = "text";
                XML.onload = function() {
                    location.reload();
                }
                XML.send();
            });
        });
        document.querySelectorAll(".FILE_ACTION_DELETE").forEach(element => {
            element.addEventListener("click", () => {
                const XML = new XMLHttpRequest();
                XML.open("GET", "./CLOUD/fileAction.php?action=delete&val_1=" + element.dataset.from
                    .replace("./CLOUD/_/", ""))
                XML.responseType = "text";
                XML.onload = function() {
                    location.reload();

                }
                if (confirm("Êtes-vous sûr de vouloir supprimer ce fichier/dossier?")) {
                    XML.send();
                }
            });
        });
        document.querySelectorAll("file").forEach(element => {
            const XML = new XMLHttpRequest();
            XML.open("GET", "./assets/img/files/" + element.dataset.ext + ".svg")
            XML.responseType = "text";
            XML.onload = function() {
                if (XML.status == 200) {
                    element.querySelector(".file-icon").innerHTML = `
                        <img width="100" src = "./assets/img/files/${element.dataset.ext}.svg" alt="Icon for file extension : ${element.dataset.ext}"/>
                        `
                } else {
                    element.querySelector(".file-icon").innerHTML = `
                        <img width="100" src = "./assets/img/files/file.svg"/>
                        `
                }
            }
            XML.send();
        });
        </script>
        <style>
        main ul li {
            padding: 10px;
            font-size: 130%;
            cursor: pointer;
        }

        main ul li:hover {
            background-color: white;
        }

        .current {
            width: 15px;
            position: absolute;
            transform: rotate(90deg) translateX(50%) translateY(15px);
            height: 3px;
            background-color: #106EBE;
        }

        .search {
            --background: #fff;
            --text-color: #414856;
            --primary-color: #4f29f0;
            --border-radius: 10px;
            --width: 190px;
            --height: 55px;
            background: var(--background);
            width: auto;
            height: var(--height);
            position: relative;
            overflow: hidden;
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(65, 72, 86, .05);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search input[type="text"] {
            position: relative;
            width: var(--height);
            height: var(--height);
            font: 400 16px 'Varela Round', sans-serif;
            color: var(--text-color);
            border: 0;
            box-sizing: border-box;
            outline: none;
            padding: 0 0 0 40px;
            transition: width 0.6s ease;
            z-index: 10;
            opacity: 0;
            cursor: pointer;
        }

        .search input[type="text"]:focus {
            z-index: 0;
            opacity: 1;
            width: var(--width);
        }

        .search input[type="text"]:focus~.symbol::before {
            width: 0%;
        }

        .search input[type="text"]:focus~.symbol:after {
            clip-path: inset(0% 0% 0% 100%);
            transition: clip-path 0.04s linear 0.105s;
        }

        .search input[type="text"]:focus~.symbol .cloud {
            top: -30px;
            left: -30px;
            transform: translate(0, 0);
            transition: all 0.6s ease;
        }

        .search input[type="text"]:focus~.symbol .lens {
            top: 20px;
            left: 15px;
            transform: translate(0, 0);
            fill: var(--primary-color);
            transition: top 0.5s ease 0.1s, left 0.5s ease 0.1s, fill 0.3s ease;
        }

        .search .symbol {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search .symbol:before {
            content: "";
            position: absolute;
            right: 0;
            width: 100%;
            height: 100%;
            background: var(--primary-color);
            z-index: -1;
            transition: width 0.6s ease;
        }

        .search .symbol:after {
            content: "";
            position: absolute;
            top: 21px;
            left: 21px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary-color);
            z-index: 1;
            clip-path: inset(0% 0% 0% 0%);
            transition: clip-path 0.04s linear 0.225s;
        }

        .search .symbol .cloud,
        .search .symbol .lens {
            position: absolute;
            fill: #fff;
            stroke: none;
            top: 50%;
            left: 50%;
        }

        .search .symbol .cloud {
            width: 35px;
            height: 32px;
            transform: translate(-50%, -60%);
            transition: all 0.6s ease;
        }

        .search .symbol .lens {
            fill: #fff;
            width: 16px;
            height: 16px;
            z-index: 2;
            top: 24px;
            left: 24px;
            transition: top 0.3s ease, left 0.3s ease, fill 0.2s ease 0.2s;
        }

        body {
            background: #e8ebf3;
            height: 100vh;
            font: 400 16px 'Varela Round', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        body .socials {
            position: fixed;
            display: block;
            left: 20px;
            bottom: 20px;
        }

        body .socials>a {
            display: block;
            width: 30px;
            opacity: var(--opacity, 0.2);
            transform: scale(var(--scale, 0.8));
            transition: transform 0.3s cubic-bezier(0.38, -0.12, 0.24, 1.91);
        }

        body .socials>a:hover {
            --scale: 1;
        }
        </style>
    </main>
    <script src="assets/js/panel.js"></script>
    <script src="assets/js/clientGet.js"></script>
</body>

</html>