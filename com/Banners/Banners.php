<?php

/**
 * Description of Banners
 *
 * @author linkx
 */
include_once $ENGINE_PATH."Utility/Paginate.php";
define(UPDATE_BANNER_PAGE, "Banners/admin/update.html");

class Banners extends SQLData{
    var $strHTML;
	var $View;
	var $categoryID;
	var $logger;
    var $Homepagesetting;
    var $thumb;
    
    function Banners($req){
        parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		$this->Paging = new Paginate();
    }

    function admin(){
        if($this->Request->getPost("r")=='saveBanner'){
            return $this->performUploadObject();

        }else if($this->Request->getParam("r")=='updatePage'){
            $id = $this->Request->getParam("id");
            $rs = $this->getBannersById($id);
            $this->View->assign("rs", $rs);
            return $this->View->toString(UPDATE_BANNER_PAGE);
            
        }else if($this->Request->getParam("r")=='update'){
            $id = $this->Request->getPost("id");
            return $this->performUpdateObject($id);
            
        }else if($this->Request->getParam("r")=='setStatus'){
            $id = $this->Request->getParam("id");
            $status = $this->Request->getParam("status");
            /*print $id."<br>";
            print $status;*/
            return $this->updateStatus($id, $status);

        }else{
            return $this->showManagePage();
        }
    }
    //banner processing
    function getObjects(){
		return $this->fetch("SELECT * FROM gm_banners ORDER BY id ASC",1);
	}

    function getBannersById($id){
        return $this->fetch("SELECT * FROM gm_banners WHERE id='".$id."' LIMIT 1");
    }

    function updateStatus($id, $status){
        $update = $this->query("UPDATE gm_banners SET published = '".$status."' WHERE id='".$id."'");

        if($status=='1'){
            $setStatus = "Published";
        }
        if($status=='0'){
            $setStatus = "Unpublished";
        }

        if($update){
            $msg = "Banner has $setStatus";
            
        }else{
            $msg = "Banner cannot set to publish or unpublish. Please contact your administrator system.";
        }
        return $this->View->showMessage($msg,"?s=bannerSet");
    }

    function performUpdateObject($id){
        $q = $this->fetch("SELECT file FROM gm_banners WHERE id='".$id."' LIMIT 1");
        $oldFile = $q['file'];
        $filename = date("Ymdhis_").$_FILES['file']['name'];
        $description = $this->Request->getPost("description");
        //print $oldFile;

        $path = "../contents/banners/";

        if(move_uploaded_file($_FILES['file']['tmp_name'], $path.$filename)){
            @unlink($path.$oldFile);
            $update = $this->query("UPDATE gm_banners SET file='".$filename."', upload_date=NOW() WHERE id='".$id."'");
            
            if($update){
                $msg = "New Object has been uploaded successfully.";
            }else{
                $msg = "Cannot update the object, please try again !";
            }
        }else{
            $msg = "Update failed, please try again later !";
        }

        if($this->query("UPDATE gm_banners SET description='".$description."' WHERE id='".$id."'")){
            $msg = "Banner has been update successfully.";
        }else{
            $msg = "Cannor update banner. Please try again later.";
        }
		return $this->View->showMessage($msg,"?s=bannerSet");

	}

    /* not currently in use
	function performUploadObject(){
		if($_FILES['file']['tmp_name']!=NULL){
			$file = date("Ymdhis_").$_FILES['file']['name'];
			if(eregi(".swf",$file)){
				$type = "swf";
			}else{
				$type = "img";
			}
			$path = $this->Request->getPost("path");
			if(!is_dir("../contents/banners")){mkdir("../contents/banners");}
			if(move_uploaded_file($_FILES['file']['tmp_name'],"../contents/banners/".$file)){
				if($this->query("INSERT INTO gm_banners(file, upload_date, type, path) VALUES('".$file."',NOW(),'".$type."','".$path."')")){
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
		return $this->View->showMessage($msg,"?s=bannerSet");
	}
     * 
     */
    //end banner processing

    function showManagePage(){
        $list = $this->getObjects();
        $this->View->assign("list",$list);
        return $this->View->toString("../templates/Banners/admin/bannerSet.html");
    }
}
?>
