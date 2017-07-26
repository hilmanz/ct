<?php
include_once "common.php";
include_once $APP_PATH."StaticPage/StaticPage.php";
include_once $APP_PATH."Article/Article.php";
$view = new BasicView();
$app = new StaticPage($req);
$article = new Article($req);

$app->open();
//MENU SERVICES
$menu =$app->getChildrens(4);
for($i=0;$i<sizeof($menu);$i++){
	$menu[$i]['child'] = $app->getChildrens($menu[$i]['id']);
}
$view->assign("menu",$menu);
$view->assign("url","page.php?id=");
$view->assign("MENU_SERVICE",$view->toString("_FRONTEND_EN/menu.html"));

//MENU ABOUT
$menu =$app->getChildrens(1);
for($i=0;$i<sizeof($menu);$i++){
	$menu[$i]['child'] = $app->getChildrens($menu[$i]['id']);
}
$view->assign("menu",$menu);
$view->assign("url","page.php?id=");
$view->assign("MENU_ABOUT",$view->toString("_FRONTEND_EN/menu.html"));

$view->assign("HEADER_IMG","banner-news.jpg");

//dynamic meta tag
$metaTags = $app->getTags();
$view->assign("tags", $metaTags);
//end dynamic meta tag

$app->close();
$article->open();
$view->assign("ID_URL", $ID_URL);

$view->assign("isArticle","true");
$view->assign("mainContent",$article->showManagePage());



$article->close();

print $view->toString($MAIN_TEMPLATE);
?>