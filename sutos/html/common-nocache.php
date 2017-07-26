<?php
//session_save_path("/opt/djisamsoe/tmp");
//if(ereg( "MSIE", $_SERVER['HTTP_USER_AGENT'])){
//session_cache_limiter('private');
//}
session_cache_limiter( 'nocache' );
session_start();
include_once "../engines/Gummy.php";
include_once "../engines/functions.php";
$MAIN_TEMPLATE = "X2/default.html";
//$_SESSION['testNih'] = "yey";
$req = new RequestManager();

?>