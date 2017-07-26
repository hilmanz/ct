<?php
function clean($str){
	return mysql_escape_string($str);
}
function sendRedirect($url){
	print' <meta http-equiv="refresh" content="1;URL='.$url.'" />';

}
function isImage($filename){
	if(eregi("\.jpeg|\.gif|\.jpg|\.png",$filename)){
		return true;
	}	
}
function LoadModule($moduleName,$req){
	global $APP_PATH,$ENGINE_PATH;
	$moduleName = mysql_escape_string($moduleName);
	if(file_exists($APP_PATH.$moduleName."/".$moduleName.".php")){
		include_once $APP_PATH.$moduleName."/".$moduleName.".php";	
		$obj = new $moduleName(&$req);	
		return $obj;
	}else{
		print "OBJECT NOT FOUND !";
		die();	
	}
}
function isLocal($filename){
	if(is_file($filename)){
		return true;
	}
}
?>