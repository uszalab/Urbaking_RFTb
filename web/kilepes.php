<?php
session_start();
// Nullázzuk, töröljük a sessiont
session_unset();
session_destroy();
// Irány a fõoldal
header("Location: index.php");
?>