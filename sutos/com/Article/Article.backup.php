<?php
include_once $ENGINE_PATH."Utility/Paginate.php";

class Article extends SQLData{
	var $strHTML;
	var $View;
	var $categoryID;
    var $logger;
	function Article($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		$this->Paging = new Paginate();
        
	
	}

    function getRootID($id){
		$rs = $this->fetch("SELECT * FROM gm_static_page WHERE id='".$id."'");
		if($rs['parentID']!=0){
			$rs = $this->getRootID($rs['parentID']);
		}
		return $rs;
	}
	function getRootIDByTag($tag){
		$rs = $this->fetch("SELECT * FROM gm_static_page WHERE tag='".$tag."' LIMIT 1");
		if($rs['parentID']!=0){
			$rs = $this->getRootID($rs['parentID']);
		}
		return $rs;
	}
	
	/****** End-User FUNCTIONS ********************************************/
	function getPage($id){
		global $LOCALE;
		$id = mysql_escape_string($id);
		$rs = $this->fetch("SELECT *,DATE_FORMAT(posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article 
							WHERE id='".$id."' LIMIT 1");
		if($rs['groupID']=="1"){
            print $rs['groupID'];
			$this->View->assign("CATEGORY_NAME",$LOCALE['LATEST_NEWS']);	
		}else{
            print "no";
			$this->View->assign("CATEGORY_NAME",$LOCALE['PRESS_RELEASES']);	
		}
		$this->View->assign("rs",$rs);
		$this->categoryID = $rs['groupID'];
        //print_r($rs);
        return $this->View->toString("FRONTEND/contents/article/content.html");
        

		
	}

    function getPageByGroup($groupID){
		//$this->View->assign("id",$id);
		$rs = $this->fetch("SELECT * FROM gm_article
                           WHERE groupID='".$groupID."' LIMIT 1");
		if(!is_array($rs)){
			return "<p>Page not found.</p>";
		}
		$this->View->assign("rs",$rs);
		$this->tag = $rs['tag '];
		$this->title = $rs['title'];
		$strHTML = $this->View->toString("Article/default.html");
		return $strHTML;
	}
    function getParentID($id){
		$rs = $this->fetch("SELECT parentID FROM gm_article WHERE id='".$id."'");
		return $rs['parentID'];
	}
    function addon(){
		return array("CONTENT_TITLE"=>$this->title);
	}
	function getArchive($start,$categoryID=1,$total=5){
		if($start==NULL){$start=0;}
		if($categoryID==NULL){$categoryID=1;}
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
	function getAllArchives($start,$total=10){
		if($start==NULL){$start=0;}
		$list = $this->fetch("SELECT *,DATE_FORMAT(posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article
							ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);
		$this->View->assign("list",$list);
		
		//paging
		$foo = $this->fetch("SELECT COUNT(*) as total FROM gm_article");
		$this->View->assign("page",$this->Paging->generate($start,$total,$foo['total'],"?archive=1"));
		return $this->View->toString("article/archive.html");
	}
	function getCurrentCategory(){
		return $this->categoryID;
	}
	function getArticles($categoryID=1,$total=20){
		return $this->fetch("SELECT *,DATE_FORMAT(posted_date,'%M %d, %Y') as posted,
							DATE_FORMAT(posted_date,'%H:%i:%s') as time
							FROM gm_article WHERE categoryID='".$categoryID."'
							ORDER BY posted_date DESC LIMIT 0,".$total,1);
	}
	function getLandingPage(){
		global $LOCALE;
		if($this->Request->getParam("c")!=NULL){
			if($this->Request->getParam("c")=="1"){
				$this->View->assign("CATEGORY_NAME",$LOCALE['LATEST_NEWS']);	
			}else{
				$this->View->assign("CATEGORY_NAME",$LOCALE['PRESS_RELEASES']);	
			}
			return $this->getArchive($this->Request->getParam("st"),$this->Request->getParam("c"),10);
		}else if($this->Request->getParam("archive")=="1"){
			$this->View->assign("CATEGORY_NAME",$LOCALE['ARCHIVE']);	
			return $this->getAllArchives($this->Request->getParam("st"));
		}else if($this->Request->getParam("id")!=NULL){
			return $this->getPage($this->Request->getParam("id"));
		}else{
			$news = $this->getArticles(1,1);
			$press = $this->getArticles(2,1);
			$this->View->assign("news",$news[0]);
			$this->View->assign("press",$press[0]);

            return $this->View->toString("article/landing.html");
            
		}
		
	}

    function isArticleRelated($id){
        $qselectTag = $this->fetch("SELECT id, tag FROM gm_static_page WHERE id='".$id."' LIMIT 1");
        $tag = $qselectTag['tag'];
        
        //*/*/print $tag;
        return $this->fetch("SELECT id, title FROM gm_article WHERE title LIKE '%".$tag."%'
                                ORDER BY posted_date DESC LIMIT 5", 1);
        
    }

		/****** ADMIN FUNCTIONS ********************************************/
	function admin($logger=NULL){
        $this->logger = $logger;
		if($this->Request->getPost("r")=="add"){
			return $this->saveContent();
            
		}else if($this->Request->getPost("r")=="update"){
			return $this->updateContent();

		}else if($this->Request->getPost("r")=="add_group"){
			return $this->saveGroup();

		}else if($this->Request->getPost("r")=="update_group"){
			return $this->updateGroup();

		}else if($this->Request->getParam("r")=="new"){
			return $this->showNewPage();

		}else if($this->Request->getParam("r")=="edit"){
			return $this->showEditPage();

		}else if($this->Request->getParam("r")=="delete"){
			return $this->performDeletePage();
            
		}else if($this->Request->getParam("r")=="list"){
			return $this->showPageListByGroup();

		}else if($this->Request->getParam("r")=="edit_group"){
			return $this->showEditGroup();

		}else if($this->Request->getParam("r")=="new_group"){
			return $this->View->toString("Article/admin/group_new.html");

		}else if($this->Request->getParam("r")=="group"){
			return $this->showGroupList();

		}else{
			return $this->showManagePage();
		}
	}

    function showNewPage(){
		$parentID = $this->Request->getParam("parentID");
        $groupID = $this->Request->getParam("groupID");
        
		if($parentID!=NULL){
			$parent = $this->fetch("SELECT * FROM gm_article WHERE id='".$parentID."' LIMIT 1");
			$this->View->assign("parent",$parent);
		}
		$groups = $this->fetch("SELECT * FROM gm_article_group ORDER BY groupID",1);
		$this->View->assign("groups",$groups);

        $q = $this->fetch("SELECT * FROM gm_article WHERE id='".$parentID."' LIMIT 1");
        $this->View->assign("selected",$q);
		//$this->View->assign("ADMIN_CONTENT",
		//$this->View->toString("Articleadmin/new.html"));
		return $this->View->toString("Article/admin/new.html");
	}

    function showEditPage(){
		$id = $this->Request->getParam("id");
        $parentID = $this->Request->getParam("parentID");

        if($parentID){
            $rs = $this->fetch("SELECT * FROM gm_article 
                                WHERE id='".$id."' AND parentID='".$parentID."' LIMIT 1");
        }else{
            $rs = $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
        }
        $rs['detail'] = str_replace("contents/article/", "../contents/article/",$rs['detail']);
		$groups = $this->fetch("SELECT * FROM gm_article_group ORDER BY groupID",1);
		$this->View->assign("groups",$groups);

        $this->View->assign("rs",$rs);
		return $this->View->toString("Article/admin/edit.html");
	}

    function saveContent(){
		//upload file
		if(!is_dir("../contents/article/")){
			mkdir("../contents/article/");
		}
		if($_FILES['file']['tmp_name']!=NULL){
			$filename = date("Ymdhis").str_replace(" ","_",$_FILES['file']['name']);
			if(!copy($_FILES['file']['tmp_name'],"../contents/article/".$filename)){
				$msg = "Cannot upload the file, please try again !";
				return $this->View->showMessage($msg,"?s=page&r=new");
			}
		}
		//--->

		//save to db
		$groupID = $this->Request->getPost("groupID");
		$title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");
		$parentID = $this->Request->getPost("parentID");
		$detail = str_replace("../contents/article/", "contents/article/",$detail);
		$status = 1;
		$tag = $this->Request->getPost("tag");
		$this->saveTags($tag);
		if($this->query("INSERT INTO gm_article(title, posted_date, brief,detail,
                        attachment, tag, img, groupID, parentID, status)
                        VALUES('".$title."', NOW(), '".$brief."','".$detail."', '".$attachmentFile."',
                        '".$tag."','".$filename."', '".$groupID."',
                        '".$parentID."', '".$status."')")){

            //Log
			if($this->logger!=NULL){
				$this->logger->log("Article Created --> ".$title,"?s=article&r=edit&id=".$id);
			}
			//end

			$msg = "New content has been added successfully !";
            
		}else{
			$msg = "Sorry, we cannot add new content, please try again !";
		}

		return $this->View->showMessage($msg,"?s=article&amp;groupID=$groupID");
	}

    function saveTags($tags){
		$foo = explode(",",$tags);
		$n = sizeof($foo);
		for($i=0;$i<$n;$i++){
			@$this->query("INSERT INTO gm_tags(tag) VALUES('".trim($foo[$i])."')");
            //Log
			if($this->logger!=NULL){
				$this->logger->log("Tag Created --> ".trim($foo[$i]),"?s=article&amp;tag=$tags");
			}
			//end
		}
	}

    function updateContent(){
		//save to db
		$groupID = $this->Request->getPost("groupID");
		$title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");
		$detail = str_replace("../contents/article/","contents/article/",$detail);
		$status = 1;
		$id = $this->Request->getPost("id");
		$tag = $this->Request->getPost("tag");
		$this->saveTags($tag);

        $pathImage = "../contents/article/";
        $pathArticle = "../contents/article/";
        
        if($_FILES['file']['tmp_name']!=NULL){
			if(!is_dir($pathImage)){@mkdir($pathImage);}
			$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $pathImage.$filename)){
				$this->query("UPDATE gm_article SET img='".$filename."' WHERE id='".$id."'");
				@unlink($pathImage.$rs['img']);
			}
		}
		if($_FILES['attachment']['tmp_name']!=NULL){

			if(!is_dir($pathArticle)){@mkdir($pathArticle);}
			$attachment = date("Ymdhis")."_".str_replace(" ","_",$_FILES['attachment']['name']);

			if(move_uploaded_file($_FILES['attachment']['tmp_name'],$pathArticle.$attachment)){
				$this->query("UPDATE gm_article SET attachment='".$attachment."' WHERE id='".$id."'");

				@unlink($pathArticle.$rs['attachment']);
			}
		}

		if($this->query("UPDATE gm_article SET
						 title='".$title."', posted_date=NOW(), brief='".$brief."',
						 detail='".$detail."', tag='".$tag."', groupID='".$groupID."', status='".$status."'
						 WHERE id='".$id."'")){

            //Log
			if($this->logger!=NULL){
				$this->logger->log("Article Updated --> ".$title,"?s=article&r=edit&id=".$id);
			}
			//end
            
			$msg = "The page has been updated successfully !";
		}else{
			$msg = "cannot update the page, please try again !";
		}
		return $this->View->showMessage($msg,"?s=article&amp;groupID=$groupID");
	}

    function showEditGroup(){
		$id = $this->Request->getParam("groupID");
		$rs = $this->fetch("SELECT * FROM gm_article_group
							WHERE groupID='".$id."' LIMIT 1");

        $this->View->assign("rs",$rs);
		return $this->View->toString("Article/admin/group_edit.html");
	}
	function saveGroup(){
		$groupName = $this->Request->getPost("groupName");
		if($this->query("INSERT INTO gm_article_group(groupName)
						 VALUES('$groupName')")){

            //Log
			if($this->logger!=NULL){
				$this->logger->log("Group Created --> ".$title,"?s=article");
			}
			//end
			$msg = "The group has been created successfully !";
		}else{
			$msg = "Cannot create a group, please try again later !";
		}

		return $this->View->showMessage($msg,"?s=article&r=group");
	}
	function updateGroup(){
		$groupName = $this->Request->getPost("groupName");
        //print $groupName;
        
		$groupID = $this->Request->getPost("groupID");
		if($this->query("UPDATE gm_article_group SET groupName='".$groupName."'
						 WHERE groupID='".$groupID."'")){
			
            //Log
			if($this->logger!=NULL){
				$this->logger->log("Group updated --> ".$title,"?s=article&r=update_group&id=".$id);
			}
			//end
            $msg = "The group has been updated successfully !";
		}else{
			$msg = "Cannot update the group, please try again later !";
		}

		return $this->View->showMessage($msg,"?s=article&r=group&amp;groupID=$groupID");
         
	}

	function showGroupList(){
		$list = $this->fetch("SELECT * FROM gm_article_group ORDER BY groupName",1);
		$n = sizeof($list);
		for($i=0;$i<$n;$i++){
			$groupID = $list[$i]['groupID'];
			$foo = $this->fetch("SELECT COUNT(*) as total FROM gm_static_page WHERE groupID='".$groupID."'");
			$list[$i]['total'] = $foo['total'];
		}

		$this->View->assign("list",$list);
		$this->View->assign("ADMIN_CONTENT", $this->View->toString("Article/admin/group_list.html"));
		return $this->View->toString("Article/admin/manage.html");

	}

    function getGroup(){
        return $this->fetch("SELECT * FROM gm_article_group", 1);
    }

    function performDeletePage(){
		$id = $this->Request->getParam("id");
		if($this->query("DELETE FROM gm_article WHERE id='".$id."'")){
			//Log
			if($this->logger!=NULL){
				$this->logger->log("Article Deleted --> ID : ".$id,"?s=article");
			}
			//end
            $msg = "The page has been deleted successfully !";
		}else{
			$msg = "Cannot delete the page, please try again later!";
		}
		return $this->View->showMessage($msg,"?s=article");
	}
    
	function showEditForm(){
		$id = $this->Request->getParam("id");
        $path = "html/contents/Article/";
		$rs = $this->fetch("SELECT * FROM gm_article WHERE id='".$id."' LIMIT 1");
		$rs['detail'] = str_replace($path,$path,$rs['detail']);
		$this->View->assign("rs",$rs);
        return $this->View->toString("Article/admin/edit.html");
       
		
	}

    
    function getChild(){
        return $this->fetch();
    }



    function getTags($start=0,$total=20){
		return $this->fetch("SELECT tag FROM gm_article LIMIT ".$start.",".$total,1);
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

    function getChildrens($id){
		return $this->fetch("SELECT * FROM gm_article WHERE parentID='".$id."'",1);
	}

    function showGroupNameById($gid){
        return $this->fetch("SELECT * FROM gm_article_group WHERE groupID='".$gid."' LIMIT 1");
    }

    function showPageListByGroup(){
		$groupID = $this->Request->getParam("groupID");
		$rs = $this->fetch("SELECT * FROM gm_article_group WHERE groupID='".$groupID."' LIMIT 1");
		$this->View->assign("rs",$rs);
		//view list
		$list = $this->fetch("SELECT * FROM gm_article a, gm_article_group b
							   WHERE a.groupID = b.groupID AND a.groupID='".$groupID."'
							   ORDER BY id",1);
		$this->View->assign("list",$list);

        //show trace page
        $groupName = $this->showGroupNameById($groupID);
        $this->View->assign("groupName", $groupName);

        if($tagName){
            $getTagByName = $this->getTagsByName($tagName);
            $this->View->assign("tagName", $getTagByName);
        }else{
            $this->View->assign("tagName", $tagName);
        }
        //end

		$this->View->assign("ADMIN_CONTENT", $this->View->toString("Article/admin/list_by_group.html"));
		return $this->View->toString("Article/admin/manage.html");
	}

    function getTagsByName($tagName){
        return $this->fetch("SELECT tag FROM gm_article WHERE tag LIKE '%".$tagName."%' LIMIT 1 ");
    }

	function showManagePage($total = 30){
		$gid = $this->Request->getParam("groupID");
        $tagName = $this->Request->getParam("tag");
        //print $tagName;
        //print $gid;

        if($gid){
            $list = $this->fetch("SELECT * FROM gm_article a,gm_article_group b
								WHERE parentID='0' AND a.groupID = b.groupID
                                AND b.groupID='".$gid."'
                                ORDER BY b.groupName,a.id",1);
            
        }else if($this->Request->getParam("tag")==NULL){
			$list = $this->fetch("SELECT * FROM gm_article a,gm_article_group b
								WHERE parentID='0' AND a.groupID = b.groupID
                                ORDER BY b.groupName,a.id",1);
		}else{
        	$list = $this->fetch("SELECT * FROM gm_article a,gm_article_group b
								WHERE a.groupID = b.groupID
                                AND tag LIKE '%".$this->Request->getParam("tag")."%'
								ORDER BY a.groupID,a.id",1);
		}


        //show trace page
        $groupName = $this->showGroupNameById($gid);
        $this->View->assign("groupName", $groupName);

        if($tagName){
            $getTagByName = $this->getTagsByName($tagName);
            $this->View->assign("tagName", $getTagByName);
        }else{
            $this->View->assign("tagName", $tagName);
        }
        //end

        
		$this->View->assign("tags",$this->getTags());
		$this->View->assign("list",$this->toTree($list));
		$this->View->assign("ADMIN_CONTENT",$this->View->toString("Article/admin/list.html"));
		
        
        return $this->View->toString("Article/admin/manage.html");
       
		
	}

    
}
?>