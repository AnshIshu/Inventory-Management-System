<?php
session_start();
session_unset();
session_destroy();

header('Location: loginform.php');

//header("Location : loginform.php");
?>