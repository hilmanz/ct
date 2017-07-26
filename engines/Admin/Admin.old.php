<?php
include_once $ENGINE_PATH."Security/Authentication.php";
include_once $ENGINE_PATH."Security/Permission.php";
include_once $ENGINE_PATH."Admin/UserManager.php";

include_once $APP_PATH. "Article/Article.php";
class Admin extends SQLData{
	var $auth ;
	var $perm;
	var $user;
	var $strHTML;
	var $View;
	var $DEBUG=false;
    var $Article;
	function Admin(){
		parent::SQLData();
		$this->auth = new Authentication();
		$this->perm = new Permission();
		$this->user = new UserManager();
		$this->View = new BasicView();
        $this->Article = new Article($req);
        
	}
	function show(){
		if(!$this->auth->isLogin()){
			$this->strHTML = $this->showLoginPage();
		}else{
			$this->strHTML = $this->showAdminPage();
		}
		if($this->DEBUG){
			print $this->getMessage();
			print $this->perm->getMessage();
			print $this->user->getMessage();
		}
	}

    function showAdminLogin(){
        $showAdmin = $this->View->assign("user",array("username"=>$this->auth->Session->getVariable("username")));
        return $showAdmin;

    }

	function showDashboard(){
        $this->showAdminLogin();
        $this->open();
        

        $articleGroup = $this->Article->getGroup();
        $this->View->assign("ARTICLE_MENU", $articleGroup);
        $this->close();
        
        $NAVIGASI_MENU = $this->View->toString("common/admin/menu.html");
        $this->View->assign("NAVIGASI_MENU", $NAVIGASI_MENU);
		$this->View->assign("content",$this->View->toString("common/admin/dashboard.html"));
	}
	function showAdminPage(){
        $this->open();
        $articleGroup = $this->Article->getGroup();
        
        $this->View->assign("ARTICLE_MENU", $articleGroup);
        $this->close();
        $NAVIGASI_MENU = $this->View->toString("common/admin/menu.html");
        $this->View->assign("NAVIGASI_MENU", $NAVIGASI_MENU);
		return $this->View->toString("common/admin/admin.html");
	}
	function toString(){
		return $this->strHTML;
	}
	function showLoginPage(){
		if($_GET['f']==1){
			$this->View->assign("msg","Access Denied !");
		}
		return $this->View->toString("common/admin/login.html");
	}
	function execute($obj,$reqID){
		if($this->perm->isAllowed($reqID)){
			$obj->open();
			$this->View->assign("content",$obj->admin());
			$obj->close();
		}else{
			$this->View->assign("content","Access Denied !");
		}
		if($this->DEBUG){
			print $obj->getMessage();
		}
	}
	function attach($obj,$reqID,$arr,$adminMode=true){
		if($adminMode){
			if($this->perm->isAllowed($reqID)){
				$obj->open();
				for($i=0;$i<sizeof($arr);$i++){
					$this->View->assign("addon_".$arr[$i],$obj->addon($arr[$i]));	
				}
				$obj->close();
				
			}
		}else{
			for($i=0;$i<sizeof($arr);$i++){
				$this->View->assign("addon_".$arr[$i],$obj->addon($arr[$i]));	
			}
		}
		
		
		if($this->DEBUG){
			print $obj->getMessage();
		}
		
	
	}
}
?>