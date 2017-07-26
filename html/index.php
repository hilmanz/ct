<?php
include_once "detectmobilebrowser.php";
include_once "common.php";

$view = new BasicView();

$landing = $view->toString("FRONTEND/contents/splash.html");
$view->assign("LANDING_SPLASH", $landing);
print $view->toString($MAIN_TEMPLATE2);
?>