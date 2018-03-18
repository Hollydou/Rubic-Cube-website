<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['uname']);
header("Location: https://infs3202-w8xx0.uqcloud.net/index.php");
exit;
?>