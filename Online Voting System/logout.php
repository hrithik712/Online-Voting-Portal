<?php
session_start();
session_destroy();
header("loaction:  LoginPage.html");
?>