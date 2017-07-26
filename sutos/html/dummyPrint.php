<?php
include_once "common.php";
include_once $APP_PATH."StaticPage/StaticPage.php";
include_once $APP_PATH."Article/Article.php";

$view = new BasicView();
$app = new StaticPage($req);
$article = new Article($req);

$article->open();

//dummyget
$printPage = $article->printPage();
//end

$view->assign("list", $printPage);

$article->close();
//$view->attach($article->addon());

$view->assign("TAG_ID",$req->getParam("tag"));



//attach banner

print $view->toString("../templates/FRONTEND/contents/dummyTestPrint.html");
?>