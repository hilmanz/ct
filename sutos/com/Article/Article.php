<?php
include_once $ENGINE_PATH."Utility/Paginate.php";
include_once $APP_PATH."Homepagesetting/Homepagesetting.php";
include_once $ENGINE_PATH."Utility/Thumbnail.php"; //not curently in use, link 18-03-2010
include_once $APP_PATH. "PhotoTag/PhotoTag.php";
include_once $APP_PATH. "Printing/Printing.php";

class Article extends SQLData{
	var $strHTML;
	var $View;
	var $categoryID;
	var $logger;
    var $Homepagesetting;
    var $thumb;
    var $photoTag;

	function Article($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		$this->Paging = new Paginate();
        $this->Homepagesetting = new Homepagesetting($req);
      //  $this->thumb = new Thumbnail();
        $this->photoTag = new PhotoTag($req);
	}


     /****** ADMIN FUNCTIONS ********************************************/
	function admin($logger){
		$this->logger = $logger;
		if($this->Request->getPost("r")=="add"){
			return $this->performSaveContent();

		}else if($this->Request->getPost("r")=="addImageTags"){
            $imageUpdate = $_FILES['file']['tmp_name'];
            $id = $this->Request->getPost("id");
            if($imageUpdate!=NULL){
                return $this->performUpdateContent();

            }else{
                if($this->Request->getPost("x1")){
                    return $this->photoTag->performAddImageTags($id, $this->Request->getPost("typingText"));
                }else{
                    return $this->performUpdateContent();
                }


            }

		}else if($this->Request->getParam("r")=="removeTag"){
            return $this->photoTag->performDeleteImageTags();

		}else if($this->Request->getPost("r")=="update"){
			return $this->performUpdateContent();

		}else if($this->Request->getPost("r")=="updateHeadline"){
			return $this->performUpdate();

		}else if($this->Request->getParam("r")=="new"){
			return $this->showNewForm();

		}else if($this->Request->getParam("r")=="edit"){
			return $this->showEditForm();

		}else if($this->Request->getParam("r")=="delete"){
			return $this->performDeleteContent();

		}else if($this->Request->getParam("r")=="delete_attachment"){
			return $this->DeleteAttachment();

		}else if($this->Request->getParam("r")=="whatsUpSetting"){
            $box1 = $this->getBox1();
            $box2 = $this->getBox2();
            $box3 = $this->getBox3();
            $box4 = $this->getBox4();

            $this->View->assign("box1",$box1);
            $this->View->assign("box2",$box2);
            $this->View->assign("box3",$box3);
            $this->View->assign("box4",$box4);

            //category dropdown menu
            $r = $this->dropdownListCategory();
            $this->View->assign("group", $r);
            //print_r($r);
            //end dropdown menu
            return $this->View->toString("../templates/Article/admin/whatsUpSetting.html");

		}else if($this->Request->getParam("r")=='whatsUpSlideshow'){

            if($this->Request->getPost("do")=='update'){
                $boxID = $this->Request->getPost("id");



                //print $boxID;
                if($boxID==1){
                    $id = '1';
                    $pageID = $this->Request->getPost("pageID");
                    $cidQuery = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$pageID."' LIMIT 1");
                    //print_r($cidQuery);
                    $categoryID = $cidQuery['parentID'];
                    //print $categoryID;
                    $status = $this->Request->getPost("status1");
                    return $this->performUpdateBoxSlide($id, $pageID, $categoryID,  $status); //slide1

                }else if($boxID==2){
                    $id = '2';
                    $pageID = $this->Request->getPost("pageID2");
                    $cidQuery = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$pageID."' LIMIT 1");
                    //print_r($cidQuery);
                    $categoryID = $cidQuery['parentID'];
                    //print $categoryID;
                    $status = $this->Request->getPost("status2");
                    return $this->performUpdateBoxSlide($id, $pageID, $categoryID,  $status);//slide2

                }else if($boxID==3){
                    $id = '3';
                    $pageID = $this->Request->getPost("pageID3");
                    $cidQuery = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$pageID."' LIMIT 1");
                    //print_r($cidQuery);
                    $categoryID = $cidQuery['parentID'];
                    //print $categoryID;
                    $status = $this->Request->getPost("status3");
                    return $this->performUpdateBoxSlide($id, $pageID, $categoryID,  $status); //slide3

                }else if($boxID==4){
                    $id = '4';
                    $pageID = $this->Request->getPost("pageID4");
                    $cidQuery = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$pageID."' LIMIT 1");
                    //print_r($cidQuery);
                    $categoryID = $cidQuery['parentID'];
                    //print $categoryID;
                    $status = $this->Request->getPost("status4");
                    return $this->performUpdateBoxSlide($id, $pageID, $categoryID,  $status); //slide3

                }else{
                    $id = '5';
                    $pageID = $this->Request->getPost("pageID5");
                    $cidQuery = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$pageID."' LIMIT 1");
                    //print_r($cidQuery);
                    $categoryID = $cidQuery['parentID'];
                    //print $categoryID;
                    $status = $this->Request->getPost("status5");
                    return $this->performUpdateBoxSlide($id, $pageID, $categoryID, $status);//slide4
                }

            }else{
                $boxSlide1 = $this->getSlideBox1();
                $boxSlide2 = $this->getSlideBox2();
                $boxSlide3 = $this->getSlideBox3();
                $boxSlide4 = $this->getSlideBox4();
                $boxSlide5 = $this->getSlideBox5();

                $this->View->assign("slide1",$boxSlide1);
                $this->View->assign("slide2",$boxSlide2);
                $this->View->assign("slide3",$boxSlide3);
                $this->View->assign("slide4",$boxSlide4);
                $this->View->assign("slide5",$boxSlide5);
                //category dropdown menu
                $r = $this->dropdownListCategory();
                //print_r($r);
                $this->View->assign("group", $r);
                //print_r($r);
                //end dropdown menu
                return $this->View->toString("../templates/Article/admin/whatsUpSlideshow.html");
            }

        }else if($this->Request->getParam("r")=="manageCategory"){
            $dropdownSearch = $this->fetch("SELECT * FROM gm_article_category WHERE parentID='0'
                                            ORDER BY categoryName ASC",1);
            $this->View->assign("dropdownSearch", $dropdownSearch);

            $list = $this->showManageArticleCategory();
            $this->View->assign("list", $list);
            return $this->View->toString("Article/admin/manageCategory.html");

		}else if($this->Request->getParam("r")=="newCategory"){
            $dropdownSearch = $this->fetch("SELECT * FROM gm_article_category WHERE parentID='0'
                                                    ORDER BY categoryName",1);
            $this->View->assign("dropdownSearch", $dropdownSearch);

            return $this->View->toString("Article/admin/newCategory.html");

		}else if($this->Request->getParam("r")=="deleteCategory"){
            $id = $this->Request->getParam("id");

            $deleteArticle = $this->deleteArticleByCategory($id);
            if($deleteArticle){
                $delete = $this->deleteCategory($id);
                if($delete){
                    $msg = "Category has been delete successfully";
                }else{
                    $msg = "Cannot delete category. Please contact your administrator system.";
                }
            }else{
                $msg = "Delete article error. Please contact your administrator system.";
            }

            return $this->View->showMessage($msg, "?s=article&r=manageCategory");


		}else if($this->Request->getParam("r")=="searchCategory"){
            $categoryID = $this->Request->getParam("categoryID");
            if($categoryID!='0'){
                $subCategory = $this->searchArticleChildCategory($categoryID);
                if($subCategory){
                    $dropdownSearch = $this->fetch("SELECT * FROM gm_article_category WHERE parentID='0'
                                                    ORDER BY categoryName",1);
                    $this->View->assign("dropdownSearch", $dropdownSearch);
                    $this->View->assign("list", $subCategory);
                    return $this->View->toString("Article/admin/manageCategory.html");

                }else{
                    $msg = "This category cannot contain sub category";
                    return $this->View->showMessage($msg, "index.php?s=article&r=manageCategory");

                }
            }else{
                $list = $this->showManageArticleCategory();
                $this->View->assign("list", $list);
                return $this->View->toString("Article/admin/manageCategory.html");
            }


		}else if($this->Request->getParam("r")=="saveCategory"){
            $categoryName = $this->Request->getPost("categoryName");
            $parentID = $this->Request->getPost("rootCategory");
            $save = $this->addArticleCategory($categoryName, $parentID);
            if($save){
                $msg = "Add category successfully";
            }else{
                $msg = "Add category failed";
            }
            return $this->View->showMessage($msg, "?s=article&r=manageCategory");


        }else if($this->Request->getParam("r")=="editCategory"){
            $id = $this->Request->getParam("id");
            $list = $this->getCategoryNameById($id);
            $this->View->assign("list", $list);
            return $this->View->toString("Article/admin/editCategory.html");

        }else if($this->Request->getParam("r")=="saveEditCategory"){
            $id = $this->Request->getPost("id");
            $categoryName = $this->Request->getPost("categoryName");
            $categoryID = $this->Request->getPost("categoryID");
            $update = $this->updateArticleCategory($id, $categoryName);
            if($update){
                $msg = "Category has been update successfully";
            }else{
                $msg = "Cannot update category. Please contact your administrator system.";
            }
            return $this->View->showMessage($msg, "?categoryID=$categoryID&button=GO&s=article&r=searchCategory");

		}else if($this->Request->getParam("r")=="setStatus"){
            $id = $this->Request->getParam("id");
            $status = $this->Request->getParam("status");

            return $this->updateStatus($id, $status);

        }else{
			return $this->showManagePage();
		}
	}


    function getMetaTitleDetail($id){
        return $this->fetch("SELECT title FROM gm_article WHERE id='".$id."'");
    }

    //category code
    function deleteCategory($id){
        return $this->query("DELETE FROM gm_article_category WHERE id='".$id."'");
    }

    function deleteArticleByCategory($categoryID){
        return $this->query("DELETE FROM gm_article WHERE categoryID='".$categoryID."'");
    }

    function addArticleCategory($categoryName, $parentID){
        return $this->query("INSERT INTO gm_article_category(categoryName, parentID)
                            VALUES('".$categoryName."', '".$parentID."')");
    }

    function updateArticleCategory($id, $categoryName){
        return $this->query("UPDATE gm_article_category SET categoryName='".$categoryName."'
                            WHERE id='".$id."'");
    }

    function searchArticleChildCategory($categoryID){
        $this->View->assign("categoryID",$categoryID); //category selected
        $tenantChild = $this->fetch("SELECT * FROM gm_article_category WHERE parentID = '".$categoryID."'", 1);
        return $tenantChild;
    }

    function showManageArticleCategory(){
        return $this->fetch("SELECT * FROM gm_article_category WHERE parentID NOT LIKE '0' ORDER BY categoryName ASC", 1);
    }
    //end category code


    function updateStatus($id, $status){
        if($status=='1'){
            $setStatus = "Published";
        }
        if($status=='0'){
            $setStatus = "Unpublished";
        }

        $q = $this->query("UPDATE gm_article SET status = '".$status."' WHERE id='".$id."'");
        if($q){
            $msg = "Article has $setStatus";
        }else{
            $msg = "Article cannot set to publish or unpublish. Please contact your administrator system.";
        }
        return $this->View->showMessage($msg, "?s=article");
    }

    //slideshow whats up
    function performUpdateBoxSlide($id, $pageID, $categoryID, $status){

        $this->thumb = new Thumbnail();
        $imageName = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];

        $path = "../contents/static/";
        if(!is_dir($path)){
            @mkdir($path);
        }

        //print $filename;
        if($imageName){
            $rs = $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='".$id."' LIMIT 1");
            @unlink($path.$rs['image']);
            @unlink($path."thumb_".$rs['image']);

            $filename = md5(date("Ymdhis")."_".str_replace(" ","_", $imageName)).".jpg";
            move_uploaded_file($tempName, $path.$filename);

            /*print ("UPDATE gm_block_whats_up
                 SET title='".$title."',brief='".$brief."',
                 pageID='".$pageID."', image= '".$filename."', updated=NOW()
                 WHERE box = '".$box."'");
             *
             */

            if($this->query("UPDATE whats_up_slideshow
                 SET pageID='".$pageID."', parentID='".$categoryID."', image = '".$filename."', updated=NOW(),
                 published='".$status."'
                 WHERE id = '".$id."'")){

                //catat log By Link 22-02-10
                if($this->logger!=NULL){
                    $this->logger->log("Update slideshow whats up setting --> ".$title,"?s=home");
                }
                //end

                if($this->thumb->createThumbnail($path.$filename, $path."thumb_".$filename,300,150)){
                    $msg = "The slideshow ".$box." has been updated successfully.";

                }else{
                    $msg = "The slideshow ".$box." cannot be updated. Please contact your administrator system.";
                }

            }else{
                $msg = "Cannot update query the slideshow, please try again later.";
            }

        }else{
            $msg = "File cannot be move into specific directory, please try again later.";
        }


        if(!$imageName){
            if($this->query("UPDATE whats_up_slideshow
                     SET pageID='".$pageID."', parentID='".$categoryID."', updated=NOW(),
                     published='".$status."'
                     WHERE id = '".$id."'")){

                //catat log By Link 22-02-10
                if($this->logger!=NULL){
                    $this->logger->log("Update What's Up Slideshow setting --> ".$title,"?s=?s=article&r=whatsUpSlideshow");
                }
                //end

                $msg = "The slideshow ".$box." has been updated successfully.";

            }else{
                $msg = "Cannot update the box, please try again later.";
            }
        }

        return $this->View->showMessage($msg,"?s=article&r=whatsUpSlideshow");

	}


    function getSlideBox1(){
        $box1 = $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='1' LIMIT 1");
		return $box1;
    }

    function getSlideBox2(){
        $box1 = $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='2' LIMIT 1");
		return $box1;
    }

    function getSlideBox3(){
        $box3 = $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='3' LIMIT 1");
        return $box3;
    }

    function getSlideBox4(){
        return $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='4' LIMIT 1");
    }

    function getSlideBox5(){
        return $this->fetch("SELECT * FROM whats_up_slideshow WHERE id='5' LIMIT 1");
    }
    //end slide

	/****** End-User FUNCTIONS ********************************************/


    function getPage($id){
		global $LOCALE;
		$id = mysql_escape_string($id);
		$rs = $this->fetch("SELECT *,DATE_FORMAT(posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article
							WHERE id='".$id."' LIMIT 1");
		$prev = $this->fetch("SELECT id FROM gm_article WHERE id <".$id." AND categoryID='".$rs['categoryID']."' ORDER BY id DESC LIMIT 1");
		print mysql_error();
		$next = $this->fetch("SELECT id FROM gm_article WHERE id >".$id." AND categoryID='".$rs['categoryID']."' ORDER BY id ASC LIMIT 1");
		if(is_array($prev)){
			$URL['previous'] = "?id=".$prev['id']."&c=".$rs['categoryID'];
		}
		if(is_array($next)){
			$URL['next'] = "?id=".$next['id']."&c=".$rs['categoryID'];
		}
		$this->View->assign("URL",$URL);
		$this->View->assign("rs",$rs);
		$this->categoryID = $rs['categoryID'];
		$this->View->assign("lang",$this->lang);
		return $this->View->toString("article/content.html");
	}
	function hasArticle($categoryID){
		$foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article WHERE categoryID='".$categoryID."'");
		if($foo['total']!=0){
			return true;
		}
	}
	function getArchive($start,$categoryID=1,$total=5){
		if($start==NULL){$start=0;}
		if($categoryID==NULL){$categoryID=1;}
		$categoryID = mysql_escape_string($categoryID);
		$start = mysql_escape_string($start);
		$total = mysql_escape_string($total);
		$list = $this->fetch("SELECT *,DATE_FORMAT(posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article WHERE categoryID='".$categoryID."'
							ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);
		$this->View->assign("list",$list);

		//paging
		$foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article WHERE categoryID='".$categoryID."'");
		$this->View->assign("page",$this->Paging->generate($start,$total,$foo['total'],"?c=".$categoryID));
		return $this->View->toString("article/archive.html");
	}
	/** custom function special for SSE**/
	function getHeadlineNews($total=1){
		$start=0;
		/*$list = $this->fetch("SELECT *,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article a,gm_article_group b
							WHERE a.groupID <> '3' AND a.groupID =  b.groupID
							GROUP BY b.groupID
							ORDER BY a.posted_date DESC LIMIT ".$start.",".$total,1);
		*/
		$rs = $this->fetch("SELECT *,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article a,gm_article_group b
							WHERE a.groupID = '1' AND a.groupID =  b.groupID
							ORDER BY a.posted_date DESC LIMIT 1");
		if($rs){
			$list[sizeof($list)] = $rs;
		}
		$rs = $this->fetch("SELECT *,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article a,gm_article_group b
							WHERE a.groupID = '4' AND a.groupID =  b.groupID
							ORDER BY a.posted_date DESC LIMIT 1");
		if($rs){
			$list[sizeof($list)] = $rs;
		}
		$rs = $this->fetch("SELECT *,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article a,gm_article_group b
							WHERE a.groupID = '2' AND a.groupID =  b.groupID
							ORDER BY a.posted_date DESC LIMIT 1");
		if($rs){
			$list[sizeof($list)] = $rs;
		}
		return $list;
	}
	function getAllArchives($start,$total=10){
		if($start==NULL){$start=0;}
		$start = mysql_escape_string($start);
		$total = mysql_escape_string($total);
		$list = $this->fetch("SELECT a.*,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(a.posted_date,'%H:%i:%s') as time,b.groupName
							FROM gm_article a, gm_article_group b WHERE a.groupID = b.groupID
							ORDER BY a.posted_date DESC LIMIT ".$start.",".$total,1);
		$this->View->assign("list",$list);

		//paging
		$foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article a, gm_article_group b WHERE a.groupID = b.groupID");
		$this->View->assign("page",$this->Paging->generate($start,$total,$foo['total'],"?archive=1"));
		return $this->View->toString("article/landing.html");
	}
	function getCurrentCategory(){
		return $this->categoryID;
	}
	function getArticles($categoryID=7,$total=20){
		return $this->fetch("SELECT *,DATE_FORMAT(a.posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article a,gm_article_group b WHERE a.groupID='".$categoryID."'
							AND a.groupID = b.groupID
							ORDER BY a.posted_date DESC LIMIT 0,".$total,1);
	}




	function getLandingPage(){
		global $LOCALE;

        $id = $this->Request->getParam("id");

		if($this->Request->getParam("c")!=NULL){
			if($this->Request->getParam("c")=="7"){
				$this->View->assign("CATEGORY_NAME",$LOCALE['LATEST_NEWS']);
			}else{
				$this->View->assign("CATEGORY_NAME",$LOCALE['PRESS_RELEASES']);
			}
			return $this->getArchive($this->Request->getParam("st"),$this->Request->getParam("c"),10);
		}else if($this->Request->getParam("archive")=="1"){
			$this->View->assign("CATEGORY_NAME",$LOCALE['ARCHIVE']);
			print "archive =1";//return $this->getAllArchives($this->Request->getParam("st"));
		}else if($id!=NULL){
            if($id){
                $rs = $this->getArticleDetail($id);
                $this->View->assign("rs", $rs);
                $this->View->assign("CATEGORY_NAME", "WHAT'S UP");
                return $this->View->toString("FRONTEND/contents/Article/content.html");

            }else{
                print "id null";//return $this->getPage($this->Request->getParam("id"));
            }
		}else{
			$whatsUp = $this->getArticles(7,7);

            $this->View->assign("descriptionContent", "WHAT'S UP");
			//$press = $this->getArticles(2,1);
			$this->View->assign("news",$whatsUp);
			//$this->View->assign("press",$press[0]);
			return $this->View->toString("FRONTEND/contents/Article/landing.html");
		}

	}
	function getGroups(){
		return $this->fetch("SELECT * FROM gm_article_group ORDER BY groupID",1);
	}
	function getCategoryName($id){
		$rs = $this->fetch("SELECT * FROM gm_article_group WHERE groupID='".mysql_escape_string(addslashes($id))."' LIMIT 1");
		return $rs['groupName'];
	}




	function DeleteAttachment(){
		$id = $this->Request->getParam("id");
		$rs = $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
		if($this->query("UPDATE gm_article SET attachment='' WHERE id='".$id."'")){
			@unlink("../contents/article/".$rs['attachment']);
			$msg = "The attachment has been removed successfully !";
		}else{
			$msg = "Update failed ! please try again later !";
		}
		return $this->View->showMessage($msg,"?s=article&r=edit&id=".$id);
	}
	function performUpdateContent(){
		$id = $this->Request->getPost("id");
        $title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");
		$detail = str_replace("../contents/article/","contents/article/",$detail);


        /*
		if($this->Request->getPost("custom_date")!=NULL){
			$article_date = $this->Request->getPost("custom_date");
		}else{
			$article_date = $this->Request->getPost("article_date");
		}
         *
         */
        $id = $this->Request->getPost("id");
		$categoryID = $this->Request->getPost("categoryID");
        //print $categoryID;
		$rs = $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");

        $headlineName = $_FILES['file']['name'];
        $headlineTmp = $_FILES['file']['tmp_name'];

        $bannerName = $_FILES['banner']['name'];
        $bannerTmp = $_FILES['banner']['tmp_name'];


        if(!is_dir("../contents/article")){@mkdir("../contents/article");}

        if($headlineName){
            $imageName = $headlineName;
            $tempName = $headlineTmp;
            $filename = date("Ymdhis")."_".str_replace(" ","_", $imageName);
            @unlink("../contents/article/".$rs['img']);
            move_uploaded_file($tempName,"../contents/article/".$filename);
            $this->query("UPDATE gm_article SET img='".$filename."' WHERE id='".$id."'");
        }

        if($bannerName){
            $imageName = $bannerName;
            $tempName = $bannerTmp;
            $filename = date("Ymdhis")."_".str_replace(" ","_", "banner_".$imageName);
            @unlink("../contents/article/".$rs['bannerImg']);
            move_uploaded_file($tempName,"../contents/article/".$filename);
            $this->query("UPDATE gm_article SET bannerImg='".$filename."' WHERE id='".$id."'");
        }








        /*
		if($_FILES['attachment']['tmp_name']!=NULL){

			if(!is_dir("../contents/article")){@mkdir("../contents/article");}
			$attachment = date("Ymdhis")."_".str_replace(" ","_",$_FILES['attachment']['name']);

			if(move_uploaded_file($_FILES['attachment']['tmp_name'],"../contents/article/".$attachment)){
				$this->query("UPDATE gm_article SET attachment='".$attachment."' WHERE id='".$id."'");

				@unlink("../contents/article/".$rs['attachment']);
			}
		}
         *
         */

        //photo tag update photo
        $selectOldPhotoTag = $this->fetch("SELECT image FROM photo_tag WHERE categoryID='".$categoryID."' LIMIT 1");
        $oldPhotoTag = $selectOldPhotoTag['image'];
        if($categoryID=='4' || $categoryID=='5'){
            if($headlineName){
                @unlink("../contents/article/".$oldPhotoTag);
                $this->query("UPDATE photo_tag SET image='".$filename."' WHERE categoryID='".$categoryID."'");
            }
        }
        //end update photo tag


        //if($categoryID=='1'){
            $monthEvents = $this->Request->getPost("events");
        //}else{
        //    $monthEvents = '0';
        //}

		if($this->query("UPDATE gm_article
						SET title='".$title."', posted_date=NOW(), brief='".$brief."',
						detail='".$detail."', categoryID='".$categoryID."', events='".$monthEvents."'
						WHERE id='".$id."'")){
			$msg = "Your article has been saved successfully !";
			$this->logger->log("Article has been updated --->".$rs['title'],"index.php?s=article&r=edit&id=".$id);
		}else{
			$msg = "Cannot save your article, please try again later !";
			print mysql_error();
		}
		return $this->View->showMessage($msg,"?categoryID=$categoryID&amp;button=GO&amp;s=article");
	}
	function performDeleteContent(){
		$id = $this->Request->getParam("id");
		$rs = $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
		if($this->query("DELETE FROM gm_article WHERE id='".$id."'")){
			$msg = "The selected article has been deleted successfully !";
			$this->logger->log("Article has been deleted --->".$rs['title']);
		}else{
			$msg = "Cannot delete the article, please try again !";
		}
		return $this->View->showMessage($msg,"?categoryID=$categoryID&amp;button=GO&amp;s=article");
	}
	function performSaveContent(){
		$categoryID = $this->Request->getPost("categoryID");
        $title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");
        $monthEvents = $this->Request->getPost("events");



        //headeline img
		if($_FILES['file']['tmp_name']!=NULL){
			$img = getimagesize($_FILES['file']['tmp_name']);
			if($img['width']<=300&&$img['height']<=247){
				if(!is_dir("../contents/article")){@mkdir("../contents/article");}
				$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
				if($filename){
					move_uploaded_file($_FILES['file']['tmp_name'],"../contents/article/".$filename);
				}else{
					$filename=NULL;
				}
			}else{
				$msg = "Error, the maximum image size allowed is 300 x 247 pixels.";
			}
		}
        //end

        //banner image
        if($_FILES['banner']['tmp_name']!=NULL){
			if(!is_dir("../contents/article")){@mkdir("../contents/article");}
			$bannerImg = date("Ymdhis")."_".str_replace(" ","_",$_FILES['banner']['name']);
			if($bannerImg){
				move_uploaded_file($_FILES['banner']['tmp_name'],"../contents/article/".$bannerImg);
			}else{
                $bannerImg=NULL;
            }
		}
        //end banner image


        /*
		if($this->Request->getPost("custom_date")!=NULL){
			$article_date = $this->Request->getPost("custom_date");
		}else{
			$article_date = $this->Request->getPost("article_date");
		}
         */


        /*
        //if($categoryID=='1'){
            $month_event = date('F');
        //}else{
            $month_event = '0';
        //}
        */

		$detail = str_replace("../contents/article/","contents/article/",$detail);
		if($this->query("INSERT INTO gm_article(title, posted_date, brief, detail, attachment,
                            img, bannerImg, categoryID, events)
                            VALUES('$title', NOW(), '$brief','$detail','".$attachment."',
                            '".$filename."','".$bannerImg."', '".$categoryID."', '".$monthEvents."')")){

			$msg .= "Your article has been saved successfully !";
			$this->logger->log("New Article has been created --->".$title,"index.php?s=article&r=edit&id=".mysql_insert_id());
		}else{
			$msg .= "Cannot save your article, please try again later !";
			print mysql_error();
		}
		return $this->View->showMessage($msg,"?s=article");
	}
	function showNewForm(){
		//category dropdown menu
        //$r = $this->dropdownListCategory();
        $r = $this->dropdownListCategory();
        $this->View->assign("group", $r);
        //print_r($r);
        //end dropdown menu

		return $this->View->toString("Article/admin/new.html");
	}


    //photo tag name query
    function getPhotoTagName($id,$categoryID){
        return $this->fetch("SELECT * FROM category_photo_tags
                        WHERE articleID='".$id."' AND categoryID='".$categoryID."'", 1);
    }



	function showEditForm(){

        $id = $this->Request->getParam("id");

		$categoryID = $this->Request->getParam("categoryID");

		$rs = $this->fetch("SELECT * FROM gm_article
                            WHERE id='".$id."' LIMIT 1");

        $nameTags = $this->getPhotoTagName($id, $categoryID); //photo tag name query

        //category dropdown menu
        $r = $this->dropdownListCategory();
        $this->View->assign("group", $r);
        //print_r($r);
        //end dropdown menu

        //tagging url dropdown, bwat print nanti
        $print = new Printing($req);
        $getDesc  = $print->getCategoryByCatID($categoryID);
        $this->View->assign("dropdownDescription", $getDesc);
        //print_r($getDesc);
        //end tagging

		$rs['detail'] = str_replace("contents/article/","../contents/article/",$rs['detail']);

		$this->View->assign("rs",$rs);
        $this->View->assign("list", $nameTags);//photo tag name


        //photo tagged
        $photoTagged = $this->fetch("SELECT * FROM gm_article
                                WHERE id='".$id."' AND categoryID='".$categoryID."' LIMIT 1");
        $this->View->assign("photoTagged", $photoTagged['img']);
        //end photo tagged

        $this->View->assign("categoryID", $categoryID);


        //print_r($rs);
		return $this->View->toString("Article/admin/edit.html");
	}

    /*
    function getPagesByParentID($id){
		return $this->fetch("SELECT * FROM gm_article a, gm_article_group b
							  WHERE a.parentID='".$id."' AND a.groupID = b.groupID
							  ORDER BY b.groupName,a.id",1);
	}

    function toTree($list,$t=0){
		$foo = array();
		$n = sizeof($list);
		for($i=0;$i<$n;$i++){

			$list[$i]['title'] = str_pad($list[$i]['title'],
								 strlen($list[$i]['title'])+($t*36),"&nbsp;",
								 STR_PAD_LEFT);
			$list[$i]['level'] = $t+1;
			array_push($foo,$list[$i]);
			$child = $this->getChildrens($list[$i]['id']);
			//print $foo;
			$foo = array_merge($foo,$this->toTree($child,$t+1));
		}
		return $foo;
	}
     *
     */

    function getChildrens($id){
		return $this->fetch("SELECT * FROM gm_article WHERE categoryID='".$id."'",1);
	}

    function performUpdate(){
        $title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$pageID = $this->Request->getPost("pageID");

		if($this->Request->getPost("box")==1){
            $box = '1';
			return $this->performUpdateBox($title, $brief, $pageID, $box); //box1

		}else if($this->Request->getPost("box")==2){
            $box = '2';
            return $this->performUpdateBox($title, $brief, $pageID, $box);//box2

		}else if($this->Request->getPost("box")==3){
            $box = '3';
            return $this->performUpdateBox($title, $brief, $pageID, $box); //box3

        }else{
            $box = '4';
            return $this->performUpdateBox($title, $brief, $pageID, $box);//box4
        }
	}

    function performUpdateBox($title, $brief, $pageID, $box){

        $this->thumb = new Thumbnail();
        $imageName = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];

        $path = "../contents/static/";
        if(!is_dir($path)){
            @mkdir($path);
        }

        //print $filename;
        if($imageName){
            $rs = $this->fetch("SELECT * FROM gm_block_whats_up WHERE box='".$box."' LIMIT 1");
            @unlink($path.$rs['image']);
            @unlink($path."thumb_".$rs['image']);

            $filename = md5(date("Ymdhis")."_".str_replace(" ","_", $imageName)).".jpg";
            move_uploaded_file($tempName, $path.$filename);

            /*print ("UPDATE gm_block_whats_up
                 SET title='".$title."',brief='".$brief."',
                 pageID='".$pageID."', image= '".$filename."', updated=NOW()
                 WHERE box = '".$box."'");
             *
             */

            if($this->query("UPDATE gm_block_whats_up
                 SET title='".$title."',brief='".$brief."',
                 pageID='".$pageID."', image = '".$filename."', updated=NOW()
                 WHERE box = '".$box."'")){

                //catat log By Link 22-02-10
                if($this->logger!=NULL){
                    $this->logger->log("Update homepage setting --> ".$title,"?s=home");
                }
                //end

                if($this->thumb->createThumbnail($path.$filename, $path."thumb_".$filename,300,150)){
                    $msg = "The box ".$box." has been updated successfully.";

                }else{
                    $msg = "The box ".$box." cannot be updated. Please contact your administrator system.";
                }

            }else{
                $msg = "Cannot update query the box, please try again later.";
            }

        }else{
            $msg = "File cannot be move into specific directory, please try again later.";
        }


        if(!$imageName){
            if($this->query("UPDATE gm_block_whats_up
                     SET title='".$title."',brief='".$brief."',
                     pageID='".$pageID."', updated=NOW()
                     WHERE box = '".$box."'")){

                //catat log By Link 22-02-10
                if($this->logger!=NULL){
                    $this->logger->log("Update What's Up Headline setting --> ".$title,"?s=home");
                }
                //end

                $msg = "The box ".$box." has been updated successfully.";

            }else{
                $msg = "Cannot update the box, please try again later.";
            }
        }

        return $this->View->showMessage($msg,"?s=article&r=whatsUpSetting");

	}

    function getBox1(){
        $box1 = $this->fetch("SELECT * FROM gm_block_whats_up WHERE box='1' LIMIT 1");
		return $box1;
    }

    function getBox2(){
        $box1 = $this->fetch("SELECT * FROM gm_block_whats_up WHERE box='2' LIMIT 1");
		return $box1;
    }

    function getBox3(){
        $box3 = $this->fetch("SELECT * FROM gm_block_whats_up WHERE box='3' LIMIT 1");
        return $box3;
    }

    function getBox4(){
        return $this->fetch("SELECT * FROM gm_block_whats_up WHERE box='4' LIMIT 1");
    }

    function getCategoryByParentID($parentID){
        return $this->fetch("SELECT * FROM gm_article_category WHERE parentID='".$parentID."'", 1);
    }

    function getCategoryByParentIDNew($parentID){
        return $this->fetch("SELECT * FROM gm_article_category
                        WHERE parentID='".$parentID."'
                        AND id NOT LIKE '4' AND id NOT LIKE '5'", 1);
    }



	function showManagePage($total = 30){
		//category dropdown menu
        $r = $this->dropdownListCategory();
        $this->View->assign("group", $r);
        //print_r($r);
        //end dropdown menu


        //get article by dropdown menu
        $start = $this->Request->getParam("st");
		if($start==NULL){
			$start=0;
		}
        $categoryID = $this->Request->getParam("categoryID");
        if($categoryID==NULL){$categoryID=1;}
		$this->View->assign("categoryID",$categoryID); //category selected
		$cat = $this->fetch("SELECT * FROM gm_article_category WHERE id = '".$categoryID."' LIMIT 1");
		$this->View->assign("groupName",$cat['groupName']);


        /*backup 29-03-2010, link
        $list = $this->fetch("SELECT a.*, b.categoryName FROM gm_article a, gm_article_category b
                                WHERE a.categoryID='".$categoryID."'
                                AND a.categoryID = b.id
                                ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);
         *
         */


        $selectParent = $this->fetch("SELECT * FROM gm_article_category
                                        WHERE id='".$categoryID."' LIMIT 1");
        $parent = $selectParent['parentID'];
        //print_r($parent);




        if($parent=='0'){
            if(!$categoryID=='2'){
                $list = $this->fetch("SELECT a.*, b.categoryName FROM gm_article a, gm_article_category b
                                WHERE b.parentID='".$categoryID."'
                                AND a.categoryID = b.id
                                ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);


                $foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article a,gm_article_category b
							WHERE a.categoryID='".$categoryID."'
							AND a.categoryID = b.id LIMIT 1");


            }

            if(!$list){
                $list = $this->fetch("SELECT a.*, b.categoryName FROM gm_article a, gm_article_category b
                                    WHERE a.categoryID='".$categoryID."'
                                    AND a.categoryID = b.id
                                    ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);

                $foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article a,gm_article_category b
							WHERE a.categoryID='".$categoryID."'
							AND a.categoryID = b.id LIMIT 1");


            }

        }else{
            $list = $this->fetch("SELECT a.*, b.categoryName FROM gm_article a, gm_article_category b
                                WHERE a.categoryID='".$categoryID."'
                                AND a.categoryID = b.id
                                ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);


            $foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article a,gm_article_category b
							WHERE a.categoryID='".$categoryID."'
							AND a.categoryID = b.id LIMIT 1");


        }

        if($parent){
            $urlBack = "?categoryID=$categoryID&button=GO&s=article";

        }else{
            if($categoryID){
                $urlBack = "?categoryID=$categoryID&button=GO&s=article";

            }else{
                $urlBack = "?s=article";
            }

        }


        $articleID = $this->Request->getParam("articleID");//get title search
        if($articleID){
            $list = $this->searchArticleByTitle($articleID);
            //print_r($list);
            $this->View->assign("articleID", $articleID);
            //print $articleID;
        }

		$this->View->assign("list",$list);
        //$pages = $this->getCategoryByParentID(0);
        //$this->View->assign("pages",$pages);
        //end get article

        //dropdown list search title
        $articleTitle = $this->listTitleArticle();
        $this->View->assign("article", $articleTitle);
        //end

		$this->View->assign("page",$this->Paging->generate($start,$total,$foo['total'],"$urlBack"));
		return $this->View->toString("Article/admin/manage.html");
	}


    function searchArticleByTitle($id){
        return $this->fetch("SELECT a.*, b.categoryName FROM gm_article a, gm_article_category b
                                WHERE a.id='".$id."'
                                AND a.categoryID = b.id",1);
    }

    function listTitleArticle(){
        return $this->fetch("SELECT id, title FROM gm_article ORDER BY title ASC", 1);
    }

    function getCategory($catID){
        return $this->fetch("SELECT * FROM gm_article_category WHERE parentID='".$catID."'", 1);

    }

    function getCategoryNameById($id){
        return $this->fetch("SELECT * FROM gm_article_category WHERE id='".$id."' LIMIT 1");
    }

    function dropdownListCategory(){
        //category dropdown menu //level 2
        $q = $this->getCategoryByParentID(0);
        $r=array();
        $n=0;
        for($i=0;$i<sizeof($q);$i++){
            $r[$n] = $q[$i];
            $n++;
            $q2 = $this->getCategoryByParentID($q[$i]['id']);
            for($j=0;$j<sizeof($q2);$j++){
                $r[$n] = $q2[$j];
                $r[$n]['categoryName']="&nbsp;&nbsp;&nbsp;&nbsp;- ".$r[$n]['categoryName'];
                $n++;
            }
        }
        return $r;
        //print_r($r);
        //end dropdown menu
    }


    function dropdownListCategoryNew(){
        //category dropdown menu //level 2
        $q = $this->getCategoryByParentIDNew(0);
        $r=array();
        $n=0;
        for($i=0;$i<sizeof($q);$i++){
            $r[$n] = $q[$i];
            $n++;
            $q2 = $this->getCategoryByParentIDNew($q[$i]['id']);
            for($j=0;$j<sizeof($q2);$j++){
                $r[$n] = $q2[$j];
                $r[$n]['categoryName']="&nbsp;&nbsp;&nbsp;&nbsp;- ".$r[$n]['categoryName'];
                $n++;
            }
        }
        return $r;
        //print_r($r);
        //end dropdown menu
    }



    //slideshow whats up
    function getSlideshowById(){
        $rs =$this->fetch("SELECT * FROM whats_up_slideshow WHERE published='1' LIMIT 5", 1);
		for($i=0;$i<sizeof($rs);$i++){
			$rs[$i]['no']=($i+1);
		}
		return $rs;
    }

    function whatsUpSetting(){
        return $this->fetch("SELECT * FROM gm_block_whats_up ORDER BY title ASC", 1);
    }

    function landing(){
        $list = $this->whatsUpSetting();
        $slideshow = $this->getSlideshowById();

        //category dropdown menu
        $r = $this->dropdownListCategory();
        $this->View->assign("group", $r);
        //print_r($r);
        //end dropdown menu


        $this->View->assign("club", $r['9']);
        $this->View->assign("offers", $r['11']);


        $this->View->assign("list", $list);
        $this->View->assign("slide", $slideshow);
        return $this->View->toString("FRONTEND/contents/whatsup.html");
    }


    function getParent($pageID, $month){

        if($month){
            return $this->fetch("SELECT ga.*, gc.categoryName, gc.id as child
                                FROM gm_article ga, gm_article_category gc
                                WHERE categoryID='".$pageID."'
                                AND ga.title=gc.categoryName
                                AND ga.status='1' AND ga.events='".$month."'
                                ORDER BY ga.posted_date DESC",1);
        }else{
            return $this->fetch("SELECT ga.*, gc.categoryName, gc.id as child
                                FROM gm_article ga, gm_article_category gc
                                WHERE categoryID='".$pageID."'
                                AND ga.title=gc.categoryName
                                AND ga.status='1'
                                GROUP BY ga.posted_date DESC",1);
        }
    }

    function getChild($parentID){
        return $this->fetch("SELECT * FROM gm_article_category WHERE parentID='".$parentID."'", 1);
    }

    function getArticleList($id, $month){
        return $this->fetch("SELECT * FROM gm_article WHERE categoryID='".$id."' AND events='".$month."'",1);
    }

    function getArticleDetail($id){
        return $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
    }

    function getBanner($bannerDescription){
        return $this->fetch("SELECT * FROM gm_banners WHERE description='".$bannerDescription."' AND published='1' LIMIT 1");
    }

    function getArticleById($id){
        return $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
    }
    function articleLanding($categoryID){
        if($categoryID!='0'){
            $cat = $this->getCategoryNameById($categoryID);
            $this->View->assign("categoryName", $cat);
            //$this->View->assign("pid", $cat['id']);

            /*
            $getCategory = $this->getCategoryNameById($categoryID);
            if($getCategory['parentID']!=NULL){
                $this->View->assign("rootID", $getCategory['parentID']);
            }
            */

            $bannerDescription = $cat['categoryName'];

            /*
             $child = $this->getChild($categoryID);
             //print_r($child);
            if($child!='0'){
                $cat = $this->fetch("SELECT * FROM gm_article_category WHERE parentID='".$categoryID."'",1);
                $this->View->assign("cat", $cat);
                $list = $this->getParent($categoryID);
            }else{
                $list = $this->getLandingList($categoryID);
            }
             */

            $nameTags = $this->getPhotoTagName($id,$categoryID); //photo tag name query

            $this->View->assign("photoTagName", $nameTags);//photo tag name
            //photo tagged
            $photoTagged = $this->fetch("SELECT * FROM photo_tag WHERE categoryID='".$categoryID."' LIMIT 1");
            $this->View->assign("photoTagged", $photoTagged['image']);
            //end photo tagged


            $child = $this->getChild($categoryID);
            $month = date(F);

            /*
            if($thisMonth){
                $month = "APRIL";

            }
             *
             */

            if($child){ //updates, about us
                //print $categoryID;
                $cat = $this->fetch("SELECT * FROM gm_article_category WHERE parentID='".$categoryID."'",1);
                $this->View->assign("cat", $cat);
                $list = $this->getParent($categoryID, $month);


            }else{


                $sel = $this->fetch("SELECT id, parentID FROM gm_article_category WHERE id='".$categoryID."' LIMIT 1");
                $cid = $sel['parentID'];
                //print $cid;
                if($cid=='2' || $cid=='3'){//UPDATES
                    ?>
                        <script>
                            document.location="whatsUp.php?content=<?= $categoryID?>&cid=<?= $cid?>";
                        </script>
                    <?
                }
                $list = $this->getLandingList($categoryID, $month);
                //$list = $this->getLandingTagList($categoryID, $param); //photo tag name list

                //$events = $this->fetch("SELECT DISTINCT * FROM gm_article GROUP BY events DESC", 1);
                $this->View->assign("contentDetailId", $categoryID);
            }


            $banner= $this->getBanner($bannerDescription);
            $this->View->assign("banner", $banner);
            $this->View->assign("monthEvent", $month);
            $this->View->assign("list", $list);

            //$this->View->assign("events", $events);
            //print_r($events);
            return $this->View->toString("FRONTEND/contents/article-landing.html");
        }
    }

    function getLandingList($id, $month){
        if($month){
            return $this->fetch("SELECT * FROM gm_article WHERE categoryID='".$id."'
                                AND status='1' AND events='".$month."' ORDER BY posted_date ASC", 1);
        }else{
            return $this->fetch("SELECT * FROM gm_article WHERE categoryID='".$id."'
                                AND status='1' ORDER BY posted_date ASC", 1);
        }
    }


    function getTagList($categoryID, $month){
        if($month){
            return $this->fetch("SELECT ga.* FROM gm_article ga, category_photo_tags cp
                                WHERE ga.id=cp.articleID
                                AND cp.categoryID='".$categoryID."'
                                AND ga.status='1' AND ga.events='".$month."' AND ga.id='".$id."'
                                ORDER BY ga.posted_date ASC LIMIT 1");
        }
    }


    function articleList($id, $categoryID){
        $root = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$categoryID."' LIMIT 1");
        $this->View->assign("rootName", $root);

        $cat = $this->getCategoryNameById($id);
        $this->View->assign("categoryName", $cat);
        $this->View->assign("rootID", $categoryID);

        $bannerDescription = $root['categoryName'];
        $banner= $this->getBanner($bannerDescription);
        $this->View->assign("banner", $banner);



        $monthSearch = $this->Request->getParam("month");
        $thisMonth = date(F);


        if($monthSearch){
            $month = $monthSearch;

        }else{
            $month = $thisMonth;

        }

        $list = $this->getArticleList($id, $month);
        $this->View->assign("monthEvent", $month);
        $this->View->assign("list", $list);
        return $this->View->toString("FRONTEND/contents/article-list.html");

    }

    function articleDetail($id, $rid, $categoryID){

        $root = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$categoryID."' LIMIT 1");
        $parent = $this->fetch("SELECT * FROM gm_article_category WHERE id='".$root['parentID']."' LIMIT 1");
        $month = $this->fetch("SELECT events FROM gm_article WHERE id='".$id."' LIMIT 1");
        $this->View->assign("month", $month);
        $this->View->assign("parent", $parent);
        $this->View->assign("rootName", $root);

        $list = $this->getArticleDetail($id);

        $cat = $this->getCategoryNameById($categoryID);
        $this->View->assign("categoryName", $cat);
        $this->View->assign("contentDetailId", $categoryID);

        $bannerDescription = $root['categoryName'];
        $banner= $this->getBanner($bannerDescription);
        $this->View->assign("banner", $banner);

        //dropdown search, tenant detail
        $dropdownTitle = $this->getArticleTitle($categoryID);
        //print_r($dropdownTitle);
        $this->View->assign("searchDetail", $dropdownTitle);
        //end

        $detail = $list['detail'];
        $list['details'] = str_replace("../contents/images/","contents/images/", $detail);
        $list['rid'] = $rid;
        $list['id'] = $id;

        $this->View->assign("list", $list);
        return $this->View->toString("FRONTEND/contents/article-detail.html");

    }


    function eventList($param, $pid){
        $root = $this->fetch("SELECT * FROM gm_article_category WHERE id='1' LIMIT 1");
        $bannerDescription = $root['categoryName'];
        $banner= $this->getBanner($bannerDescription);

        if($param){
            $list = $this->getEvents($param, $pid);
        }else{
            $param = "APRIL";//date(Y);
            $list = $this->getEvents($param, $pid);
        }

        //print_r($list);
        $detail = $list['detail'];
        //$list['details'] = str_replace("../contents/images/","contents/images/", $detail);
        $this->View->assign("banner", $banner);
        $this->View->assign("list", $list);
        $this->View->assign("monthEvent", $param);
        return $this->View->toString("FRONTEND/contents/article-events.html");
    }


    function getLandingTagList($categoryID,$param){
        return $this->fetch("SELECT cp.*, ga.events, ga.status, ga.img FROM category_photo_tags cp,
                            gm_article ga WHERE cp.articleID=ga.id AND ga.events='".$param."'
                            AND ga.categoryID='".$categoryID."'
                            AND ga.status='1'",1);
    }


    //landing search tag list
    function taggingList($param){
        $categoryID = $this->Request->getParam("pid");
        $nameTags = $this->getLandingTagList($categoryID, $param); //photo tag name query
        //print_r($nameTags['0']['img']);
        //photo tagged
        //$photoTagged = $this->fetch("SELECT * FROM photo_tag WHERE categoryID='".$categoryID."' LIMIT 1");
        //end photo tagged
        $month = $param;
        //print $param;

        //$list = $this->getTagList($categoryID, $month);


        $this->View->assign("list", $nameTags);
        $this->View->assign("photoTagName", $nameTags);//photo tag name
        $this->View->assign("photo", $nameTags['0']['img']);
        $this->View->assign("month", $month);
        if($categoryID=='4'){
            $categoryName = 'Club';
        }
        if($categoryID=='5'){
            $categoryName = 'Offers';
        }
        $this->View->assign("categoryName", $categoryName);
        $this->View->assign("categoryID", $categoryID);
        $this->View->assign("categoryNameSelected", $month);
        return $this->View->toString("FRONTEND/contents/article-tag-list.html");
    }


    //landing tag list////////////
    function landingTaggingList($categoryID){
        //print $categoryID;
        $thisMonth = date(F);
        $nameTags = $this->getLandingTagList($categoryID, $thisMonth);


        $month = $thisMonth;
        //$month = "APRIL";
        ?>
            <script>
                document.location="landingTag.php?pid=<?= $categoryID?>&events=<?= $month?>";
            </script>
        <?

        /*
        $this->View->assign("list", $nameTags);
        $this->View->assign("photoTagName", $nameTags);//photo tag name

        $photo = $this->fetch("SELECT cp.*, ga.events, ga.status, ga.img FROM category_photo_tags cp,
                            gm_article ga WHERE cp.articleID=ga.id AND ga.events='".$thisMonth."'
                            AND ga.categoryID='".$categoryID."'
                            AND ga.status='1' ORDER BY ga.id DESC LIMIT 1");

        $this->View->assign("photo", $photo['img']);
        //print_r($nameTags);
        $this->View->assign("month", $month);
        if($categoryID=='4'){
            $categoryName = 'Club';
        }
        if($categoryID=='5'){
            $categoryName = 'Offers';
        }
        $this->View->assign("categoryName", $categoryName);
        $this->View->assign("categoryNameSelected", $month);
        $this->View->assign("categoryID", $categoryID);
        return $this->View->toString("FRONTEND/contents/article-tag-list.html");
         *
         */
    }


    /*
    function getTanggingList($param, $pid){
        if($pid==NULL){$pid='4';}
        if($pid=='4'){
            return $this->fetch("SELECT * FROM gm_article WHERE
                                events='".$param."' AND categoryID='4'", 1);
        }else{
            return $this->fetch("SELECT * FROM gm_article WHERE events='".$param."'", 1);
        }
    }
     *
     */



    function getEvents($param, $pid){
        if($pid==NULL){$pid='1';}
        if($pid=='1'){
            return $this->fetch("SELECT * FROM gm_article WHERE
                                events='".$param."' AND categoryID='1'", 1);
        }else{
            return $this->fetch("SELECT * FROM gm_article WHERE events='".$param."'", 1);
        }
    }

    function getArticleTitle($categoryID){
        return $this->fetch("SELECT id, title, categoryID, status FROM gm_article
                                WHERE status='1' AND categoryID='".$categoryID."' ORDER BY title ASC", 1);
    }

    function dummyGet(){
        /*
        $list = $this->fetch("SELECT title, detail FROM gm_article WHERE categoryID='5' LIMIT 1");

        $detail = $list['detail'];
        $list['details'] = str_replace("../contents/images/","contents/images/", $detail);
        $this->View->assign("list",$list);
         *
         */
		$strHTML = $this->View->toString("FRONTEND/contents/contentIndex.html");
		return $strHTML;
    }



    function printPage(){
        $list = $this->fetch("SELECT title, detail FROM gm_article WHERE categoryID='5' LIMIT 1");

        $list['detail'] = str_replace("../contents/images/","contents/images/",$list['detail']);
        return $list;
    }
}
?>