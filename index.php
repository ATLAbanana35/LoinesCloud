<?php
if (!empty($_COOKIE["USERSP"])) {
    header("Location: users/" . $_COOKIE["USERSP"]) . "/index.php";
} else {
    header("Location: admin/index.html");
}
?>
