<?php
include_once "common.php";
include_once $APP_PATH."Contact/Contact.php";
include_once $APP_PATH."Tenant/Tenant.php";
include_once $APP_PATH."Article/Article.php";

$contact = new Contact($req);
$tenant = new Tenant($req);
$article = new Article($req);
$view = new BasicView();

$tenant->open();
//sub menu define
$dining = $tenant->getCategory(1);
$hangout = $tenant->getCategory(2);
$entertainment = $tenant->getCategory(4);
$lifestyle = $tenant->getCategory(3); //lifestyle sub menu
$explore = $tenant->getCategory(5); //explore sub menu
$view->assign("dining", $dining);
$view->assign("hangout", $hangout);
$view->assign("entertainment", $entertainment);
$view->assign("lifestyle", $lifestyle);
$view->assign("explore", $explore);
//end sub menu define


//dropdowm list menu whats up and its sub menu
$subMenuWhatsUp = $article->getChild(0);
for($i=0;$i<sizeof($subMenuWhatsUp);$i++){
	$subMenuWhatsUp[$i]['child'] = $article->getChild($subMenuWhatsUp[$i]['id']);
}
//print_r($subMenuWhatsUp);
$view->assign("menu", $subMenuWhatsUp);
//end

$tenant->close();
$contact->open();
$view->assign("mainContent", $contact->landingPage());
$contact->close();
print $view->toString($MAIN_TEMPLATE);

?>
