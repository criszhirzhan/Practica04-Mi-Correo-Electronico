<?php
session_start();
session_destroy();
header("Location: ../../../public/controladores/login.php");
?>