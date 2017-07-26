<?php
include_once $ENGINE_PATH."Security/Authentication.php";
include_once $ENGINE_PATH."Security/Permission.php";
include_once $ENGINE_PATH."Admin/UserManager.php";
include_once $ENGINE_PATH."Admin/ActivityLogger.php";


class Admin extends SQLData{
	var $auth ;
	var $perm;
	var $user;
	var $strHTML;
	var $View;
	var $DEBUG=false;
	function Admin(){
		parent::SQLData();
		$this->auth = new Authentication();
		$this->perm = new Permission();
		$this->user = new UserManager();
		$this->View = new BasicView();
        
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
		//Activity Logger
        $logger = new ActivityLogger();
		$this->View->assign("logs",$logger->getRecentLogs(30));
		//-->

        //link 18-03-2010, pisahin navigasi menu ke beda template
        $NAVIGASI_MENU = $this->View->toString("common/admin/menu.html");
        $this->View->assign("NAVIGASI_MENU", $NAVIGASI_MENU);

		$this->View->assign("content",$this->View->toString("common/admin/dashboard.html"));
	}
	function showAdminPage(){

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
	/**
	* duf - 2010/01/04 - declare activity Logger.
	*/
	function execute($obj,$reqID){
		if($this->perm->isAllowed($reqID)){
			$obj->open();
			$logger = new ActivityLogger();
			$this->View->assign("content",$obj->admin(&$logger));
			//yg lama
			//$this->View->assign("content",$obj->admin());
			//-->
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