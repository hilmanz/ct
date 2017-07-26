<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author link
 */
include_once $ENGINE_PATH. "Utility/Paginate.php";
class Gallery extends SQLData{
    var $strHTML;
    var $View;
    var $Paging;

    function Gallery($req){
        parent::SQLData();
        $this->Request = $req;
        $this->View = new BasicView();
        $this->Paging = new Paginate();
    }

    
    function admin(){
        if($this->Request->getParam("r")=="editNewFacebookImage"){
            $this->View->assign("do",$this->Request->getParam("do"));
            return $this->View->toString("../templates/Gallery/admin/editFacebookImage.html");

        }else if($this->Request->getParam("r")=="updateFacebookImage"){
            if($this->Request->getParam("do")=='1'){
                $newname = "facebook_image.jpg";
                
            }

            if($this->Request->getParam("do")=='2'){
                $newname = "facebook_image2.jpg";
                
                
            }
            //print $newname;
            return $this->updateFacebookImage($newname);

        }else if($this->Request->getParam("r")=="viewFacebookImage"){
            return $this->View->toString("../templates/Gallery/admin/viewFacebookImage.html");

        }
    }
	

    //insert facebook image by link 06-01-10
    function updateFacebookImage($newname){

        $name = $_FILES['img']['name'];
        $type = $_FILES['img']['type'];
		$path = "../contents/gallery/facebookImage/";
        if(!is_dir($path)){
			mkdir($path);
		}

        

        
        if($name){
            if($path.$newname){
                @unlink($path.$newname);
                move_uploaded_file($_FILES['img']['tmp_name'],$path.$name);
                rename("$path"."$name", "$path"."$newname");
                list($width, $height, $type, $attr)=getimagesize($path.$newname);
                if($width!=184 || $height!=287  && $type!='1' && $type!='2' && $type!='3' && $type!='4' && $type!='6'){
                    @unlink($path.$newname);
                    $msg = "Upload image failed. Cek your image type or size. File type must be JPG, JPEG, PNG, GIF, BMP, or SWF. And size must be 184px X 287px";
                    return $this->View->showMessage($msg,"?s=gallery&r=viewFacebookImage");
                }else{
                    $msg = "Image has been successfully upload.";
                    //print $width."x".$height.",".$attr.",".$type;
                    return $this->View->showMessage($msg,"?s=gallery&r=viewFacebookImage");
                }
            }

		}else{
         	$msg = "Cannot save image. Please browse image to upload, or contact your administration system.";
            return $this->View->showMessage($msg,"?s=gallery&r=viewFacebookImage");
		}		
    }
    //end insert facebook image by link 06-01-10
    
     
}
?>
