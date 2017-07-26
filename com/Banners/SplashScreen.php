<?php

class SplashScreen extends SQLData{
	var $strHTML;
	var $View;
	function SplashScreen($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		
	}
	
	/****** End-User FUNCTIONS ********************************************/
	function getPage($id){
		
	}
	function getLandingPage(){
		//do nothing
	}
	function getObjects(){
		return $this->fetch("SELECT * FROM gm_splash ORDER BY id ASC",1);
	}
	function getXML(){
		$list = $this->getObjects();
		$this->View->assign("list",$list);
		return $this->View->toString("BSI/xml/screen.xml");
	}
	/****** ADMIN FUNCTIONS ********************************************/
	function admin(){
		if($this->Request->getPost("r")=="upload"){
			return $this->performUploadObject();
		}else if($this->Request->getParam("r")=="delete"){
			return $this->performDeleteObject();
		}else{
			return $this->showManagePage();
		}
	}
	function performDeleteObject(){
		$id = $this->Request->getParam("id");

        $q = $this->fetch("SELECT file FROM gm_splash WHERE id='".$id."' LIMIT 1");
        $oldFile = $q['file'];
        //print $oldFile;
        
        $path = "../contents/splash/";
		if($this->query("DELETE FROM gm_splash WHERE id='".$id."'")){
			@unlink($path.$oldFile);
            $msg = "The object has been deleted successfully !";
		}else{
			$msg = "Cannot delete the object, please try again !";
		}
		return $this->View->showMessage($msg,"?s=splash");
         
	}
	function performUploadObject(){
		if($_FILES['file']['tmp_name']!=NULL){
			$file = date("Ymdhis_").$_FILES['file']['name'];
			if(eregi(".swf",$file)){
				$type = "swf";
			}else{
				$type = "img";
			}
			$path = $this->Request->getPost("path");
			if(!is_dir("../contents/splash")){mkdir("../contents/splash");}
			if(move_uploaded_file($_FILES['file']['tmp_name'],"../contents/splash/".$file)){
				if($this->query("INSERT INTO gm_splash(file, upload_date, type, path) VALUES('".$file."',NOW(),'".$type."','".$path."')")){
					$msg = "New Object has been uploaded successfully !";
				}else{
					$msg = "Cannot upload the object, please try again !";
				}
			}else{
				$msg = "Upload failed, please try again later !";
			}
		}else{
			$msg = "You must specified a file to upload !";
		}
		return $this->View->showMessage($msg,"?s=splash");
	}
	function showManagePage(){
		$list = $this->getObjects();
		$this->View->assign("list",$list);
		return $this->View->toString("Banners/admin/splash_manage.html");
	}
}
?>