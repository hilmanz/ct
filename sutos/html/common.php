<?php
session_start();
include_once "../config/config.inc.php";
//die("yey");
//include_once "../config/tokens.php";
include_once "../engines/Gummy.php";
include_once "../engines/functions.php";
$MAIN_TEMPLATE = "FRONTEND/home.html";
$MAIN_TEMPLATE_CONTENT = "FRONTEND/content.html";


$PRINT_PAGE = "FRONTEND/printPage.html";
$req = new RequestManager();
?>