<?php
//require_once $APP_PATH."StaticPage/StaticPage.php";
include_once $ENGINE_PATH."Utility/Thumbnail.php";

define(MANAGE_HOMEPAGE_SETTING, "HomepageSetting/admin/manage.html");

class Homepagesetting extends SQLData{
	var $strHTML;
	var $View;
	//var $Static;
    var $thumb;
    var $logger;
	function Homepagesetting($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
		//$this->Static = new StaticPage($req);


	}
	/****** End-User FUNCTIONS ********************************************/
	function getPage(){

	}
	function getLandingPage(){
		//do nothing
		$this->attachMenu();
	}
	function attachMenu(){


	}
	function getBlocks(){
		$box1 = $this->fetch("SELECT * FROM gm_block WHERE box='1' LIMIT 1");
		$box2 = $this->fetch("SELECT * FROM gm_block WHERE box='2'",1);
		for($i=0;$i<sizeof($box2);$i++){
			$box2[$i]['no']=$i;
		}
		return array($box1,$box2);
	}
	/****** ADMIN FUNCTIONS ********************************************/
	function admin($logger=NULL){
        $this->logger = $logger;
		if($this->Request->getPost("r")=="update"){
			return $this->performUpdate();

		}else{
         	return $this->showManagePage();

		}
	}
	function performUpdate(){
        $title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");


		if($this->Request->getPost("box")==1){
            $box = '1';
            $pageID = $this->Request->getPost("pageID");
			return $this->performUpdateBox($title, $brief, $pageID, $box); //box1

		}else if($this->Request->getPost("box")==2){
            $box = '2';
            $pageID = $this->Request->getPost("pageID2");
            return $this->performUpdateBox($title, $brief, $pageID, $box);//box2

		}else if($this->Request->getPost("box")==3){
            $box = '3';
            $pageID = $this->Request->getPost("pageID3");
            return $this->performUpdateBox($title, $brief, $pageID, $box); //box3

        }else{
            $box = '4';
            $pageID = $this->Request->getPost("pageID4");
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



        if($tempName){
            $rs = $this->fetch("SELECT * FROM gm_block WHERE box='".$box."' LIMIT 1");
            @unlink($path.$rs['image']);
            @unlink($path."thumb_".$rs['image']);

            $filename = md5(date("Ymdhis")."_".str_replace(" ","_", $imageName)).".jpg";
            move_uploaded_file($tempName, $path.$filename);

            /*print ("UPDATE gm_block
                 SET title='".$title."',brief='".$brief."',
                 pageID='".$pageID."', image= '".$filename."', updated=NOW()
                 WHERE box = '".$box."'");
             *
             */

            if($this->query("UPDATE gm_block
                 SET title='".$title."',brief='".$brief."',
                 pageID='".$pageID."', image = '".$filename."', updated=NOW()
                 WHERE box = '".$box."'")){

                    //catat log By Link 22-02-10
                    if($this->logger!=NULL){
                        $this->logger->log("Update homepage setting","?s=homepageSetting");
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
            $msg = "File cannot be moved into specific directory, please try again later.";
        }


        if(!$imageName){
            if($this->query("UPDATE gm_block
                     SET title='".$title."',brief='".$brief."',
                     pageID='".$pageID."', updated=NOW()
                     WHERE box = '".$box."'")){

                //catat log By Link 22-02-10
                if($this->logger!=NULL){
                    $this->logger->log("Update homepage setting","?s=homepageSetting");
                }
                //end

                $msg = "The box ".$box." has been updated successfully.";

            }else{
                $msg = "Cannot update the box, please try again later.";
            }
        }


        return $this->View->showMessage($msg,"?s=homepageSetting");


	}



    function getBox1(){
        $box1 = $this->fetch("SELECT * FROM gm_block WHERE box='1' LIMIT 1");
		return $box1;
    }

    function getBox2(){
        $box1 = $this->fetch("SELECT * FROM gm_block WHERE box='2' LIMIT 1");
		return $box1;
    }

    function getBox3(){
        $box3 = $this->fetch("SELECT * FROM gm_block WHERE box='3' LIMIT 1");
        return $box3;
    }

    function getBox4(){
        return $this->fetch("SELECT * FROM gm_block WHERE box='4' LIMIT 1");
    }

    function getCategoryByParentID($parentID){
        return $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='".$parentID."'", 1);
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

	function showManagePage(){

        $box1 = $this->getBox1();
        $box2 = $this->getBox2();
        $box3 = $this->getBox3();
        $box4 = $this->getBox4();

		$this->View->assign("box1",$box1);
        $this->View->assign("box2",$box2);
		$this->View->assign("box3",$box3);
        $this->View->assign("box4",$box4);

		//dropdowm list category
        $category = $this->dropdownListCategory();
        $this->View->assign("group", $category);
        //end

		return $this->View->toString(MANAGE_HOMEPAGE_SETTING);
	}


    function landing(){
        $list['set1'] = $this->getBox1();
        $list['set2'] = $this->getBox2();
        $list['set3'] = $this->getBox3();


        $this->View->assign("list", $list);
        $strHTML = $this->View->toString("FRONTEND/contents/contentIndex.html");
		return $strHTML;
    }

}
?>