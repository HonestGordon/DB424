<?php
session_start();
unset($_SESSION['user']);
header('location:/lab7/signin.html');
exit();
?>