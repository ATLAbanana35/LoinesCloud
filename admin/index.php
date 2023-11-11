<?php
if (!empty($_COOKIE["USERSP"])) {
    header("Location: users/" . $_COOKIE["USERSP"]);
} else {
    header("Location: admin");
}
?>