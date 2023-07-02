<?php 
session_start();

session_unset();
session_destroy();

header("Location: /compiled_MODULE-1/login.php");