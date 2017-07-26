<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tenant
 *
 * @author linkx
 */

include_once $ENGINE_PATH. "Utility/Paginate.php";
define(MANAGE_TENANT, "Tenant/admin/manage.html");

class Tenant extends SQLData{
    var $strHTML;
	var $View;
	var $tag;
	var $title;
	var $id;
	var $logger;
    var $Paging;
    function Tenant($req){
        parent::SQLData();
        $this->View = new BasicView();
        $this->Paging = new Paginate();
		$this->Request = $req;
    }

    function admin($logger){
        $this->logger = $logger;
        if($this->Request->getPost("r")=="add"){
			return $this->performSaveContent();

		}else if($this->Request->getPost("r")=="update"){
			return $this->performUpdateContent();

		}else if($this->Request->getPost("r")=="updateHeadline"){
			return $this->performUpdate();

		}else if($this->Request->getParam("r")=="new"){
            //dropdowm list category
            $category = $this->dropdownListCategory();
            $this->View->assign("group", $category);
            //end
            return $this->View->toString("Tenant/admin/new.html");

		}else if($this->Request->getParam("r")=="edit"){
			return $this->showEditForm();

		}else if($this->Request->getParam("r")=="delete"){
			return $this->performDeleteContent();
            
        }else if($this->Request->getParam("r")=="manageCategory"){
            $dropdownSearch = $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='0'
                                            ORDER BY categoryName ASC",1);
            $this->View->assign("dropdownSearch", $dropdownSearch);

            $list = $this->showManageTenantCategory();
            $this->View->assign("list", $list);
            return $this->View->toString("Tenant/admin/manageCategory.html");

		}else if($this->Request->getParam("r")=="newCategory"){
            $dropdownSearch = $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='0'
                                                    ORDER BY categoryName",1);
            $this->View->assign("dropdownSearch", $dropdownSearch);
            
            return $this->View->toString("Tenant/admin/newCategory.html");

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
                $msg = "Delete tenant error. Please contact your administrator system.";
            }
            
            return $this->View->showMessage($msg, "?s=pages&r=manageCategory");
            

		}else if($this->Request->getParam("r")=="searchCategory"){
            $categoryID = $this->Request->getParam("categoryID");
            if($categoryID!='0'){
                $subCategory = $this->searchTenantChildCategory($categoryID);
                if($subCategory){
                    $dropdownSearch = $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='0'
                                                    ORDER BY categoryName",1);
                    $this->View->assign("dropdownSearch", $dropdownSearch);
                    $this->View->assign("list", $subCategory);
                    return $this->View->toString("Tenant/admin/manageCategory.html");

                }else{
                    $msg = "This category cannot contain sub category";
                    return $this->View->showMessage($msg, "index.php?s=pages&r=manageCategory");

                }
            }else{
                $list = $this->showManageTenantCategory();
                $this->View->assign("list", $list);
                return $this->View->toString("Tenant/admin/manageCategory.html");
            }
            
            
		}else if($this->Request->getParam("r")=="saveCategory"){
            $categoryName = $this->Request->getPost("categoryName");
            $parentID = $this->Request->getPost("rootCategory");
            $save = $this->addTenantCategory($categoryName, $parentID);
            if($save){
                $msg = "Add category successfully";
            }else{
                $msg = "Add category failed";
            }
            return $this->View->showMessage($msg, "?s=pages&r=manageCategory");
            

        }else if($this->Request->getParam("r")=="editCategory"){
            $id = $this->Request->getParam("id");
            $list = $this->getCategoryNameById($id);
            $this->View->assign("list", $list);
            return $this->View->toString("Tenant/admin/editCategory.html");

        }else if($this->Request->getParam("r")=="saveEditCategory"){
            $id = $this->Request->getPost("id");
            $categoryName = $this->Request->getPost("categoryName");
            $categoryID = $this->Request->getPost("categoryID");
            $update = $this->updateTenantCategory($id, $categoryName);
            if($update){
                $msg = "Category has been update successfully";
            }else{
                $msg = "Cannot update category. Please contact your administrator system.";
            }
            return $this->View->showMessage($msg, "?categoryID=$categoryID&button=GO&s=pages&r=searchCategory");

		}else if($this->Request->getParam("r")=="setStatus"){
            $id = $this->Request->getParam("id");
            $status = $this->Request->getParam("status");

            return $this->updateStatus($id, $status);

        }else{
            return $this->showManagePage();
        }
    }

    function updateStatus($id, $status){
        if($status=='1'){
            $setStatus = "Published";
        }
        if($status=='0'){
            $setStatus = "Unpublished";
        }
        
        $q = $this->query("UPDATE ms_tenant SET status = '".$status."' WHERE id='".$id."'");
        if($q){
            $msg = "Tenant has $setStatus";
        }else{
            $msg = "Tenant cannot set to publish or unpublish. Please contact your administrator system.";
        }
        return $this->View->showMessage($msg, "?s=pages");
    }

    function deleteCategory($id){
        return $this->query("DELETE FROM ms_tenant_category WHERE id='".$id."'");
    }

    function deleteArticleByCategory($categoryID){
        return $this->query("DELETE FROM ms_tenant WHERE categoryID='".$categoryID."'");
    }
    function addTenantCategory($categoryName, $parentID){
        return $this->query("INSERT INTO ms_tenant_category(categoryName, parentID)
                            VALUES('".$categoryName."', '".$parentID."')");
    }

    function updateTenantCategory($id, $categoryName){
        return $this->query("UPDATE ms_tenant_category SET categoryName='".$categoryName."'
                            WHERE id='".$id."'");
    }

    function searchTenantChildCategory($categoryID){
        $this->View->assign("categoryID",$categoryID); //category selected
        $tenantChild = $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID = '".$categoryID."'", 1);
        return $tenantChild;
    }

    function showManageTenantCategory(){
        return $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID NOT LIKE '0' ORDER BY categoryName ASC", 1);
    }

    function performSaveContent(){
		$categoryID = $this->Request->getPost("categoryID");
        $title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");

        /*
		if($_FILES['attachment']['tmp_name']!=NULL){
			if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
			$attachment = date("Ymdhis")."_".str_replace(" ","_",$_FILES['attachment']['name']);
			move_uploaded_file($_FILES['attachment']['tmp_name'],"../contents/tenant/".$attachment);
		}
         * 
         */


		if($_FILES['file']['tmp_name']!=NULL){
			$img = getimagesize($_FILES['file']['tmp_name']);
			if($img['width']<=300&&$img['height']<=247){
				if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
				$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'],"../contents/tenant/".$filename)){

				}else{
					$msg = "Cannot upload your headline preview image, please try again !";
				}
			}else{
				$msg = "Error, the maximum image size allowed is 300 x 247 pixels.";
			}
		}

        //banner image
        if($_FILES['banner']['tmp_name']!=NULL){
			if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
			$bannerImg = date("Ymdhis")."_".str_replace(" ","_",$_FILES['banner']['name']);
			if($bannerImg){
				move_uploaded_file($_FILES['banner']['tmp_name'],"../contents/tenant/".$bannerImg);
			}else{
                $bannerImg=NULL;
            }
		}else{
            $msg = "Cannot upload banner image. Please try again later.";
        }
        //end banner image


        /*
		if($this->Request->getPost("custom_date")!=NULL){
			$article_date = $this->Request->getPost("custom_date");
		}else{
			$article_date = $this->Request->getPost("article_date");
		}
         *
         */
		$detail = str_replace("../contents/tenant/","contents/tenant/",$detail);
		if($this->query("INSERT INTO ms_tenant(title, posted_date, brief, detail, attachment,
                            img, bannerImg, categoryID)
                            VALUES('$title', NOW(), '$brief','$detail','".$attachment."',
                            '".$filename."', '".$bannerImg."', '".$categoryID."')")){

			$msg .= "Your tenant has been saved successfully !";
			$this->logger->log("New Tenant has been created --->".$title,"index.php?s=pages&r=edit&id=".mysql_insert_id());
		}else{
			$msg .= "Cannot save your tenant, please try again later !";
			print mysql_error();
		}
		return $this->View->showMessage($msg,"?s=pages");
	}

    function showEditForm(){
        $id = $this->Request->getParam("id");
		//$categoryID = $this->Request->getParam("categoryID");

		$rs = $this->fetch("SELECT * FROM ms_tenant WHERE id='".$id."' LIMIT 1");

        //dropdowm list category
        $category = $this->dropdownListCategory();
        $this->View->assign("group", $category);
        //end
		$rs['detail'] = str_replace("contents/tenant/","../contents/tenant/",$rs['detail']);
		$this->View->assign("rs",$rs);
        //print_r($rs);
		return $this->View->toString("Tenant/admin/edit.html");
	}

    function performUpdateContent(){
		$id = $this->Request->getPost("id");
		$title = $this->Request->getPost("title");
		$brief = $this->Request->getPost("brief");
		$detail = $this->Request->getPost("detail");
		$detail = str_replace("../contents/tenant/","contents/tenant/",$detail);


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
        $categoryIDDropDown = $this->Request->getPost("categoryIDDropDown");
        //print $categoryIDDropDown;

		$rs = $this->fetch("SELECT * FROM ms_tenant WHERE id='".$id."' LIMIT 1");

        //headline image
		if($_FILES['file']['tmp_name']!=NULL){
			if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
			$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['file']['name']);
			if(move_uploaded_file($_FILES['file']['tmp_name'],"../contents/tenant/".$filename)){
				$this->query("UPDATE ms_tenant SET img='".$filename."' WHERE id='".$id."'");
				@unlink("../contents/tenant/".$rs['img']);
			}else{
                $msg = "Cannot upload headline image. Please try again later.";
            }
		}else{
            $msg = "Cannot upload headline image. Please try again later.";
        }
        //end headline

        //banner image
        if($_FILES['banner']['tmp_name']!=NULL){
			if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
			$filename = date("Ymdhis")."_".str_replace(" ","_",$_FILES['banner']['name']);
			if(move_uploaded_file($_FILES['banner']['tmp_name'],"../contents/tenant/".$filename)){
				$this->query("UPDATE ms_tenant SET bannerImg='".$filename."' WHERE id='".$id."'");
				@unlink("../contents/tenant/".$rs['bannerImg']);
			}else{
                $msg = "Cannot upload banner image. Please try again later.";
            }
		}else{
            $msg = "Cannot upload banner image. Please try again later.";
        }
        //end banner image

        /*
		if($_FILES['attachment']['tmp_name']!=NULL){

			if(!is_dir("../contents/tenant")){@mkdir("../contents/tenant");}
			$attachment = date("Ymdhis")."_".str_replace(" ","_",$_FILES['attachment']['name']);

			if(move_uploaded_file($_FILES['attachment']['tmp_name'],"../contents/tenant/".$attachment)){
				$this->query("UPDATE ms_tenant SET attachment='".$attachment."' WHERE id='".$id."'");
				@unlink("../contents/tenant/".$rs['attachment']);
			}
		}
         * 
         */
		if($this->query("UPDATE ms_tenant
						SET title='".$title."', posted_date=NOW(), brief='".$brief."',
						detail='".$detail."', categoryID='".$categoryIDDropDown."'
						WHERE id='".$id."'")){
			$msg = "Your tenant has been saved successfully !";
			$this->logger->log("Tenant has been updated --->".$rs['title'],"index.php?s=pages&r=edit&id=".$id);
		}else{
			$msg = "Cannot save your tenant, please try again later !";
			print mysql_error();
		}
		return $this->View->showMessage($msg,"?categoryID=$categoryID&amp;button=GO&amp;s=pages");
	}

    function performDeleteContent(){
		$id = $this->Request->getParam("id");
		$rs = $this->fetch("SELECT * FROM ms_tenant WHERE id='".$id."' LIMIT 1");
		if($this->query("DELETE FROM ms_tenant WHERE id='".$id."'")){
			$msg = "The selected tenant has been deleted successfully !";
			$this->logger->log("Tenant has been deleted --->".$rs['title']);
		}else{
			$msg = "Cannot delete the tenant, please try again !";
		}
		return $this->View->showMessage($msg,"?categoryID=$categoryID&amp;button=GO&amp;s=pages");
	}

    function getTenant($start, $total, $fieldFilter, $categoryID){
        return $this->fetch("SELECT a.*, b.categoryName FROM ms_tenant a, ms_tenant_category b
                                WHERE $fieldFilter='".$categoryID."'
                                AND a.categoryID = b.id
                                ORDER BY a.posted_date DESC LIMIT ".$start.",".$total,1);
    }

    function searchTenant($id, $fieldFilter){
        return $this->fetch("SELECT a.*, b.categoryName FROM ms_tenant a, ms_tenant_category b
                                WHERE $fieldFilter='".$id."'
                                AND a.categoryID = b.id",1);
    }

    function getParentById($categoryID){
        return $this->fetch("SELECT * FROM ms_tenant_category
                        WHERE id='".$categoryID."' LIMIT 1");
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


    //belom selesai, terakhir update 19-03-2010, link
    function getTenantByParentId($start, $total, $categoryID){
         return $this->fetch("SELECT FROM ms_tenant WHERE categoryID='".$categoryID."'
                                ORDER BY posted_date DESC LIMIT ".$start.",".$total,1);
    }

    function showManagePage(){
        $start = $this->Request->getParam("st");
		if($start==NULL){
			$start=0;
		}
        $total = 3;
        $categoryID = $this->Request->getParam("categoryID");
        
        if($categoryID==NULL){$categoryID=1;}
		$this->View->assign("categoryID",$categoryID); //category selected
        $cat = $this->fetch("SELECT * FROM ms_tenant_category WHERE id = '".$categoryID."' LIMIT 1");
		$this->View->assign("groupName",$cat['groupName']);


        //get child //nyoba2, belom selesai, terakhir update 19-03-2010, link
        //$selectChild = $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='".$categoryID."'", 1);
        
        //if($selectChild){
            //belom selesai, terakhir update 19-03-2010, link
            //$list = $this->getTenantByParentId($start, $total, $categoryID);
            //print_r($list);
            
        //}else{
        $selectParent = $this->getParentById($categoryID);
        //print_r($selectParent);
        $parent = $selectParent['parentID'];

        if($parent=='0'){
            $fieldFilter = "b.parentID";
            $list = $this->getTenant($start, $total, $fieldFilter, $categoryID);
            if(!$list){
                $tenantID = $this->Request->getParam("tenantID");
                if($tenantID){
                    $fieldFilter = "a.id";
                    $list = $this->searchTenant($tenantID, $fieldFilter);
                    $this->View->assign("tenantID", $tenantID);
                    

                }else{
                    $fieldFilter = "a.categoryID";
                    $list = $this->getTenant($start, $total, $fieldFilter, $categoryID);
                    $foo = $this->fetch("SELECT COUNT(*) as total FROM ms_tenant WHERE categoryID='".$categoryID."' LIMIT 1");
        
                }
            }
            
        }else{
            $fieldFilter = "a.categoryID";
            $list = $this->getTenant($start, $total, $fieldFilter, $categoryID);
            $foo = $this->fetch("SELECT COUNT(*) as total FROM ms_tenant WHERE categoryID='".$categoryID."' LIMIT 1");
        
        }
        
        //}
        
        $this->View->assign("list", $list);
        //dropdown list category
        $category = $this->dropdownListCategory();
        $this->View->assign("group", $category);
        //end

        //dropdown list tenant search
        $tenant = $this->listTenantTitle();
        $this->View->assign("tenant", $tenant);
        //end

        


        $this->View->assign("paging", $this->Paging->generate($start, $total, $foo['total'], "?categoryID=$categoryID&button=GO&s=pages"));
        return $this->View->toString(MANAGE_TENANT);

    }

    function getChild($parentID){
        return $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='".$parentID."'", 1);
    }

    function listTenantTitle(){
        return $this->fetch("SELECT id, title, categoryID FROM ms_tenant ORDER BY title ASC", 1);
    }
    
    function getCategory($catID){
        return $this->fetch("SELECT * FROM ms_tenant_category WHERE parentID='".$catID."'", 1);
        
    }

    function getCategoryNameById($id){
        return $this->fetch("SELECT * FROM ms_tenant_category WHERE id='".$id."' LIMIT 1");
    }

    function getBanner($categoryID){
        return $this->fetch("SELECT * FROM gm_banners WHERE id='".$categoryID."' AND published='1' LIMIT 1");
    }


    function getTenantDetail($id){
        return $this->fetch("SELECT * FROM ms_tenant WHERE id='".$id."' LIMIT 1");
    }

    function getParent($pageID){
        return $this->fetch("SELECT * FROM ms_tenant WHERE categoryID='".$pageID."'",1);
    }

    function getTenantList($start, $total, $categoryID){
        return $this->fetch("SELECT * FROM ms_tenant WHERE categoryID='".$categoryID."'
                             AND status='1'
                             ORDER BY title ASC LIMIT ".$start.",".$total,1);
    }

    function getTenantTitle($categoryID){
        //8 = find us, 9 = information --->not both
        return $this->fetch("SELECT id, title, categoryID, status FROM ms_tenant
                                WHERE categoryID <> '8' AND categoryID <> '9'
                                AND status='1' AND categoryID='".$categoryID."' ORDER BY title ASC", 1);
    }


    function getMetaTitleDetail($id){
        return $this->fetch("SELECT title FROM ms_tenant WHERE id='".$id."'");
    }

    function tenantDetail($id, $categoryID){
        
        $cat = $this->getCategoryNameById($categoryID);
        //print_r($cat);
        $this->View->assign("categoryName", $cat);
        $this->View->assign("pid", $cat['id']);


        //dropdown search, tenant detail
        $dropdownTitle = $this->getTenantTitle($categoryID);
        //print_r($dropdownTitle);
        $this->View->assign("searchDetail", $dropdownTitle);
        //end

        $list = $this->getTenantDetail($id);

        $detail = $list['detail'];
        $list['details'] = str_replace("../contents/images/","contents/images/", $detail);
        if($getCategory['parentID']!=NULL){
            $this->View->assign("rootID", $getCategory['parentID']);
        }
        $this->View->assign("list", $list);
        $this->View->assign("tenantID", $id);
        return $this->View->toString("FRONTEND/contents/tenant-detail.html");
    }

    
    function tenantList($categoryID){
        $start = $this->Request->getParam("st");
		if($start==NULL){
			$start=0;
		}
        $total = 6;
        if($categoryID!='0'){
            $cat = $this->getCategoryNameById($categoryID);
            $this->View->assign("categoryName", $cat);
            $this->View->assign("pid", $cat['id']);
            
            if($cat['parentID']!='0'){
                $checkBanner = $this->fetch("SELECT * FROM gm_banners WHERE id='".$cat['parentID']."' LIMIT 1");
                //print_r($checkBanner['file']);
                if($checkBanner['file']){
                    $this->View->assign("rootBanner", $checkBanner['file']);
                }
            }
            
            $getCategory = $this->getCategoryNameById($categoryID);
            
            if($getCategory['parentID']!=NULL){
                $this->View->assign("rootID", $getCategory['parentID']);
            }
            
            if($getCategory['parentID']=='5'){ //banner, root=explore
                $banner= $this->getBanner(8);
            }else{
                $banner= $this->getBanner($categoryID);
                
            }
            $this->View->assign("banner", $banner);
            $list = $this->getTenantList($start, $total, $categoryID);


            //dropdown search, tenant detail
            $dropdownTitle = $this->getTenantTitle($categoryID);
            //print_r($dropdownTitle);
            $this->View->assign("searchDetail", $dropdownTitle);
            //end
            
            $this->View->assign("list", $list);
            

            $foo = $this->fetch("SELECT COUNT(*) as total FROM ms_tenant
                                WHERE categoryID='".$categoryID."' AND status='1'");
            
            $this->View->assign("page",$this->Paging->generate($start,$total,$foo['total'],"tenant.php?pid=$categoryID"));
            return $this->View->toString("FRONTEND/contents/tenant-list.html");
        }
        
    }

   

    function getFloor($categoryID, $id){
        $search = $this->fetch("SELECT title, id FROM ms_tenant
                            WHERE categoryID='".$categoryID."' AND status='1' ORDER BY title ASC",1);

        $categoryName = $this->getCategoryNameById($categoryID);
        $list = $this->getTenantDetail($id);
        
        $detail = $list['detail'];
        
        $list['details'] = str_replace("../contents/images/","contents/images/", $detail);
        $this->View->assign("search", $search);
        $this->View->assign("categoryName", $categoryName);
        $this->View->assign("list", $list);
        $this->View->assign("floorSelected", $id);
        return $this->View->toString("FRONTEND/contents/floor.html");
            
        /*else{
            $this->View->assign("pid", $floor);
            return $this->View->toString("FRONTEND/contents/ground-floor.html");
        }*/
        
    }

}
?>
