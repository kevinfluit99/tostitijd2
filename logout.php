<?php
require_once("include/include.php");
session_start();
unset($_SESSION["email"]);
session_destroy();
header("Location: index.php");
