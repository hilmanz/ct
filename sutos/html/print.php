<?php
include_once "common.php";
$view = new BasicView();
include_once $APP_PATH."Tenant/Tenant.php";
include_once $APP_PATH."Article/Article.php";
include_once $APP_PATH."Printing/Printing.php";

$printing = new Printing($req);

$printing->open();
$name = $req->getParam("name");
$categoryID = $req->getParam("categoryID");
$getPage = $printing->getImageToPrint($name, $categoryID);
//print_r($getPage);
$view->assign("list", $getPage);
$printing->close();
print $view->toString($PRINT_PAGE);

?>
