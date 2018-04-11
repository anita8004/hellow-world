<?php
session_start();

//session_destroy();

unset($_SESSION['login']);

header('Location: a20180411_03_session_login.php');