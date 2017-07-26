<?php
include_once "common.php";
include_once $APP_PATH."Tenant/Tenant.php";
include_once $APP_PATH."Article/Article.php";

$view = new BasicView();
$tenant = new Tenant($req);
$article = new Article($req);

$tenant->open();

$categoryID = $req->getParam("pid");

$p = array('dining'=>'1', 'hangouts'=>'2', 'lifestyle'=>'3',
            'entertainment'=>'4', 'explore'=>'5');

if($parentID!=$p){
    if($categoryID==$p['lifestyle']){
        $child = $tenant->getChild($parentID);
        $categoryID=$p['lifestyle'];

    }else if($categoryID==$p['explore']){
        $child = $tenant->getChild($parentID);
        $categoryID=$p['explore'];
    }
    
}else{
    if($categoryID==$p['dining']){
        $categoryID=$p['dining'];

    }else if($categoryID==$p['hangouts']){
        $categoryID=$p['hangouts'];

    }else if($categoryID==$p['entertainment']){
        $categoryID=$p['entertainment'];

    }else{
        $categoryID=$p['explore'];

    }
}


$detailID = $req->getParam("content");
$cid = $req->getParam("cid");
if($detailID){
    $getPage = $tenant->tenantDetail($detailID, $cid);

    $metaTitle = $tenant->getMetaTitleDetail($detailID);
    //print_r($metaTitle);
    $view->assign("META_TITLE", $metaTitle);
    
}else{
    $floorID = $req->getParam("floor");
    if($floorID){
        $categoryID = '9';
        $getPage = $tenant->getFloor($categoryID, $floorID);
        
    }else{
        $getPage = $tenant->tenantList($categoryID, $cid);
    }
}


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


$view->assign("mainContent", $getPage);
$tenant->close();
$view->assign("TAG_ID",$req->getParam("tag"));
print $view->toString($MAIN_TEMPLATE);
?>