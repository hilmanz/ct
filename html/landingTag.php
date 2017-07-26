<?php
include_once "common.php";
include_once $APP_PATH."Article/Article.php";
include_once $APP_PATH."Tenant/Tenant.php";

$view = new BasicView();
$article = new Article($req);
$tenant = new Tenant($req);

$article->open();



$categoryID = $req->getParam("pid");
$p = array('dining'=>'1', 'hangouts'=>'2', 'lifestyle'=>'3',
            'entertainment'=>'4', 'explore'=>'5');
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


$detailID = $req->getParam("content");
$pid = $req->getParam("pid");
if($detailID){
    $getPage = $tenant->tenantDetail($detailID, $pid);
    
    $metaTitle = $article->getMetaTitleDetail($detailID);
    //print_r($metaTitle);
    $view->assign("META_TITLE", $metaTitle);
    //print $detailID;

}else{

    if($pid!=NULL){
        $getPage = $article->articleLanding($pid);
        
    }else{
        $getPage = $article->landing();//landing whats up
    }
    
}


$listID = $req->getParam("content");
if($listID){
    $cid = $req->getParam("cid");
    $getPage = $article->articleList($listID, $cid);
    

}

$detailID = $req->getParam("contentDetail");
if($detailID){
    $rid = $req->getParam("rid");
    $cid = $req->getParam("cid");
    $getPage = $article->articleDetail($detailID, $rid, $cid);

    $metaTitle = $article->getMetaTitleDetail($detailID);
    //print_r($metaTitle);
    $view->assign("META_TITLE", $metaTitle);
    //print $detailID;
}


//dropdowm list menu whats up and its sub menu
$subMenuWhatsUp = $article->getChild(0);
for($i=0;$i<sizeof($subMenuWhatsUp);$i++){
	$subMenuWhatsUp[$i]['child'] = $article->getChild($subMenuWhatsUp[$i]['id']);
}
//print_r($subMenuWhatsUp);
$view->assign("menu", $subMenuWhatsUp);
//end   



$events = $req->getParam("events");
if($events){
    $getPage = $article->taggingList($events);
}else{
    $getPage = $article->landingTaggingList($pid);
}


$view->assign("mainContent", $getPage);

$article->close();
//$view->attach($article->addon());

$view->assign("TAG_ID",$req->getParam("tag"));
print $view->toString($MAIN_TEMPLATE);
?>