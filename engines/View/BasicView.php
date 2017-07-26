<?php
include_once $GLOBAL_PATH."engines/Smarty/Smarty.class.php";
class BasicView extends Smarty{
	var $templates = array();
	function BasicView(){
		global $GLOBAL_PATH;
		$this->template_dir = $GLOBAL_PATH."templates/"; 
       	//$this->compile_dir  = $GLOBAL_PATH.'tmp/'; 
		$this->compile_dir = $GLOBAL_PATH.'tmp/';
      //	print $this->compile_dir;
        $this->config_dir   = $GLOBAL_PATH.'config/'; 
       // $this->cache_dir    = $GLOBAL_PATH.'cache/'; 
        $this->caching = false; 
		
	}
	 function toString($str){
		//return parent::fetch($this->template_dir.$str);
		return parent::fetch($str);
	 }
	 function attach($arr){
	 	foreach($arr as $name=>$value){
			$this->assign($name,$value);
		}
	 }
	 function showMessage($msg,$urlBackTo,$path_to_template="common"){
	 	$this->assign("msg",$msg);
		$this->assign("url",$urlBackTo);
	 	return $this->toString($path_to_template."/message.html");
	 }
}
?>