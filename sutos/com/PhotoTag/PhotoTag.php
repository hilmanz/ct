<?php

class PhotoTag extends SQLData{
	var $strHTML;
	var $View;
	function PhotoTag($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();

	}


    /*
    function admin(){
        if($this->Request->getParam("r")=="addImageTags"){
            return $this->performAddImageTags();

        }else if($this->Request->getParam("r")=="removeTag"){

            $id = $this->Request->getParam("id");
            $qdel = $this->performDeleteImageTags($id);
            if($qdel){
                $msg = "Image tags has been deleted successfully.";
            }else{
                $msg = "Cannot delete image tags. Please try again later.";
            }

            return $this->View->showMessage($msg, "?s=tagImages");

        }else if($this->Request->getParam("r")=="updateImagePage"){
            $img = $this->getImagesTags();
            $this->View->assign("img", $img['image']);
            return $this->View->toString("../templates/Gm_photo_tags/admin/updateImage.html");

        }else if($this->Request->getParam("r")=="updateImage"){
            $path = "../contents/static/";


            if(!is_dir($path)){
                mkdir($path);
            }
            $getImageName = $_FILES['image']['name'];
            $getImageTemp = $_FILES['image']['tmp_name'];


            if($getImageName){
                $imageNew = date("YmdHis").str_replace(" ","_",$_FILES['image']['name']);
                if(move_uploaded_file($getImageTemp, $path.$imageNew)){
                    $r = $this->getImagesTags();
                    $imageOld = $r['image'];
                    $filename = $path.$imageOld;

                    if(@unlink($filename)){
                        $delImage = $this->query("DELETE FROM gm_photo WHERE id='1'");
                        if($delImage){
                            if($this->updateImage($imageNew)){
                                $msg = "Successfully updated.";
                            }else{
                                $msg = "Cannot update new image";
                            }
                        }else{
                            $msg = "Image cannot be replace successfully. Please try again later.";
                        }
                    }else{
                        $msg = "Directory image cannot be delete.";
                    }
                }else{
                    $msg = "Cannot upload new image. Please try again later";
                }
            }else{
                $msg = "Get new image failed.";
            }
            return $this->View->showMessage($msg, "?s=homeSetting");


        }else{
            return $this->showManagePage();
        }
    }
     *
     */


    //admin processing
    function performAddImageTags($id, $text){
        $categoryID = $this->Request->getPost("categoryID");
        //print $categoryID;


        if(!$this->Request->getPost("x1") || !$this->Request->getPost("y1") || !$this->Request->getPost("x2") ||
            !$this->Request->getPost("y2") || !$this->Request->getPost("w") || !$this->Request->getPost("h")){
            $msg = "Click and select image area where you want to tag..";

        }else{
            $replaceTitle = str_replace(' ', '-', $text);
            $url = $this->Request->getPost("url");
            $qi = $this->query("INSERT INTO category_photo_tags(articleID, categoryID, title, x1, y1, x2, y2, width, height, url)
                                values('".$id."', '".$categoryID."', '".$replaceTitle."', '".$this->Request->getPost("x1")."',
                                '".$this->Request->getPost("y1")."', '".$this->Request->getPost("x2")."',
                                '".$this->Request->getPost("y2")."', '".$this->Request->getPost("w")."',
                                '".$this->Request->getPost("h")."', '".$url."')");


            if($qi){
                $msg = "Successfully tags..";

            }else{
                $msg = "Sql Error. Cannot insert tags..";
                print mysql_error();
            }

        }
        return $this->View->showMessage($msg,"index.php?s=article&r=edit&id=$id&categoryID=$categoryID");

    }


    function performDeleteImageTags(){
        $id = $this->Request->getParam("id");
        $categoryID = $this->Request->getParam("cid");
        $qdel = $this->query("DELETE FROM category_photo_tags WHERE id = '".$id."'");
        if($qdel){
            $msg = "Image tags has been delete successfully.";

        }else{
            $msg = "Cannot delete image tags, please try again!";

        }
        return $this->View->showMessage($msg,"index.php?categoryID=$categoryID&button=GO&s=article");
    }
    //end admin processing


    function getAllTags(){
      return $this->fetch("SELECT a.*, b.id AS photoID, b.image FROM category_photo_tags a, photo_tag b
                            WHERE a.categoryID = b.id", 1);

    }

    function getImagesTags(){

        return $this->fetch("SELECT * FROM gm_photo WHERE id='1' LIMIT 1");
    }

    function updateImage($image){
        return $this->query("insert into gm_photo(id, image)values('1', '".$image."')");

    }

    function showManagePage(){
        $list = $this->getAllTags();
        $img = $this->getImagesTags();

        $this->View->assign("img", $img['image']);
        $this->View->assign("list",$list);
        return $this->View->toString("../templates/Gm_photo_tags/admin/imageTags.html");
    }
}

?>
