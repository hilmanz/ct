<?php

/**
 * Description of Banners
 *
 * @author linkx
 */
include_once $ENGINE_PATH."Utility/Paginate.php";
include_once $ENGINE_PATH. "Utility/Thumbnail.php";

class Printing extends SQLData{
    var $strHTML;
	var $View;
	var $logger;
    var $thumb;

    function Printing($req){
        parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		$this->Paging = new Paginate();
    }

    function admin($logger){
        $this->logger = $logger;
        if($this->Request->getParam("r")=='manageClub'){
            $categoryID = '4';
            $list = $this->getClub($categoryID);
            $this->View->assign("list", $list);
            return $this->View->toString("../templates/Article/admin/managePrint.html");

        }else if($this->Request->getParam("r")=='manageOffers'){
            $categoryID = '5';
            $list = $this->getClub($categoryID);
            $this->View->assign("list", $list);
            return $this->View->toString("../templates/Article/admin/managePrint.html");

        }else if($this->Request->getParam("r")=='new'){
            //$category = $this->getCategory();
            //$this->View->assign("category", $category);
            return $this->View->toString("../templates/Article/admin/newPrint.html");

        }else if($this->Request->getParam("r")=='add'){
            return $this->save();

        }else if($this->Request->getParam("r")=='delete'){
            $id = $this->Request->getParam("id");
            $selectCategory = $this->fetch("SELECT categoryID FROM ms_print WHERE id='".$id."' LIMIT 1");
            $categoryID = $selectCategory['categoryID'];
            
            if($categoryID=='4'){
                $urlBack = "?s=print&r=manageClub";
                
            }else{
                $urlBack = "?s=print&r=manageOffers";
                
            }
            
            $delete = $this->delete($id);
            if($delete){
                $msg = "Successfully deleted.";
            }else{
                $msg = "Delete failed.";
            }
            return $this->View->showMessage($msg, $urlBack);
             

        }else if($this->Request->getParam("r")=='edit'){
            $id = $this->Request->getParam("id");
            $categoryID = $this->Request->getParam("categoryID");
            if($categoryID=='4'){
                $url = "manageClub";
            }else{
                $url = "manageOffers";
            }
            $list = $this->getImageById($id);
            $this->View->assign("list", $list);
            $this->View->assign("categoryID", $categoryID);
            $this->View->assign("url", $url);
            return $this->View->toString("../templates/Article/admin/editPrint.html");

        }else if($this->Request->getParam("r")=='saveEdit'){
            $id = $this->Request->getPost("id");
            $categoryID = $this->Request->getPost("categoryID");
            $description = $this->Request->getPost("description");

            
            if($categoryID=='4'){
                $urlBack = "?s=print&r=manageClub";

            }else{
                $urlBack = "?s=print&r=manageOffers";

            }

            $selectImg = $this->fetch("SELECT image FROM ms_print WHERE id='".$id."' LIMIT 1");
            $imgOld = $selectImg['image'];
            if($_FILES['file']['tmp_name']!=NULL){
                $path = "../contents/print/";
                if(!is_dir($path)){@mkdir($path);}
                $filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
                if($filename){
                    @unlink($path.$imgOld);
                    move_uploaded_file($_FILES['file']['tmp_name'], $path.$filename);
                    $edit = $this->saveEdit($id, $categoryID, $description, $filename);
                    if($edit){
                        $msg = "Successfully updated.";
                    }else{
                        $msg = "Failed update.";
                    }
                }else{
                    $filename=$imgOld;
                    
                }
            }else{
                $filename=$imgOld;
                
                $edit = $this->saveEdit($id, $categoryID, $description, $filename);
                if($edit){
                    $msg = "Successfully updated.";
                }else{
                    $msg = "Failed update.";
                }
            }
            
            
            return $this->View->showMessage($msg, $urlBack); 
            

        }else{
            return $this->showManagePage();
        }
    }

    function saveEdit($id, $categoryID, $description, $filename){
        return $this->query("UPDATE ms_print SET description='".$description."',
                             image='".$filename."' WHERE id='".$id."' AND categoryID='".$categoryID."'");
    }

    function delete($id){
        $selectImg = $this->fetch("SELECT image FROM ms_print WHERE id='".$id."' LIMIT 1");
        $path = "contents/print/";
        $image = $selectImg['image'];
        
        if($image && $path){
            @unlink($path.$image);
            return $this->query("DELETE FROM ms_print WHERE id='".$id."'");
            
        }else{
            print "Delete image error. Image not found";
        }

    }

    function getImageById($id){
        return $this->fetch("SELECT * FROM ms_print WHERE id='".$id."' LIMIT 1");
    }
    
    function getCategoryByCatID($categoryID){
        return $this->fetch("SELECT * FROM ms_print WHERE categoryID='".$categoryID."'", 1);
    }

    function getCategory(){
        return $this->fetch("SELECT mp.*, gc.categoryName FROM ms_print mp, gm_article_category gc
                                WHERE mp.categoryID=gc.id", 1);
    }

    function getImageToPrint($name, $categoryID){
        return $this->fetch("SELECT * FROM ms_print WHERE description='".$name."'
                                AND categoryID='".$categoryID."' LIMIT 1");
    }

    function save(){
        $categoryID = $this->Request->getPost("category");
        $description = $this->Request->getPost("description");
        if($categoryID=='4'){
            $urlDefine = "index.php?s=print&r=manageClub";

        }else{
            $urlDefine = "index.php?s=print&r=manageOffers";
        }

        if($_FILES['file']['tmp_name']!=NULL){
			if(!is_dir("../contents/print")){@mkdir("../contents/print");}
			$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
			if($filename){
				move_uploaded_file($_FILES['file']['tmp_name'],"../contents/print/".$filename);
			}else{
                $filename=NULL;
            }
        }

        $q = $this->query("INSERT INTO ms_print(categoryID, description, image)
                            VALUES('".$categoryID."', '".$description."','".$filename."')");
        if($q){
            $msg = "Image has been successfully saved.";
        }else{
            $msg = "Failed upload image.";
        }
        $this->logger->log("New image has been upload to print --->".$_FILES['file']['name'], $urlDefine);
        return $this->View->showMessage($msg, $urlDefine);
    }

    function getClub($categoryID){
        return $this->fetch("SELECT mp.*, ac.categoryName FROM ms_print mp, gm_article_category ac
                            WHERE mp.categoryID = ac.id AND categoryID='".$categoryID."'", 1);
    }

    function showManagePage(){
        
    }

    
}
?>
