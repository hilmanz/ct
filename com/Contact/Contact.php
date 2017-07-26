<?php


define("LANDING", "../templates/Contact/manage.html");
define("NEW_SUBJECT", "../templates/Contact/new_subject.html");
define("NEW_STAFF", "../templates/Contact/new_staff.html");
define("LANDING_INBOX", "../templates/Contact/manage_inbox.html");
define("LANDING_SUBJECT", "../templates/Contact/manage_subject.html");
define("LANDING_EDIT_SUBJECT", "../templates/Contact/edit_subject.html");
define("LANDING_EDIT_STAFF", "../templates/Contact/edit_staff.html");
include_once $ENGINE_PATH."Utility/Mailer.php";


class Contact extends SQLData{
    var $strHTML;
	var $View;
    var $Email;


    function Contact($req){
		parent::SQLData();
		$this->Request = $req;
		$this->View = new BasicView();
        $this->Email = new Mailer();
	}

    function getBanner(){
        return $this->fetch("SELECT * FROM gm_banners WHERE id='11' AND published='1' LIMIT 1");
    }

    function landingPage(){
        $this->open();
        if($this->Request->getParam("do")=="send"){
            $name = $this->Request->getPost("name");
            $phone = $this->Request->getPost("phone");
            $email = $this->Request->getPost("email");
            $address = $this->Request->getPost("address");
            $message = $this->Request->getPost("message");
            $subject = $this->Request->getPost("subject");
            $staff = $this->Request->getPost("staff");
            if(!$name && !$email && !$message){
                $msg = "Name, Email and Comment is required.";

            }else{
                $staff = $this->fetch("SELECT * FROM gm_contact WHERE idCategory='".$subject."'",1);
                
               
                
                for($i=0;$i<sizeof($staff);$i++){
                    $selectSubject = $this->fetch("SELECT * FROM gm_contact_category
                                    WHERE id='".$staff[$i]['idCategory']."' LIMIT 1");
                    
                    $sendToStaff[$i] = "<'".$staff[$i]['staff_email']."'>;";
                    //print $sendToStaff[$i];

                    
                    //print_r($send[$i]);
                    $this->Email->setSubject($selectSubject['subject']);
                    $this->Email->setRecipient("<dhea@townsquare.co.id>");

                    $this->Email->setSender("<'".$email."'>");
                    $rs['nama'] = $name;
                    $rs['email'] = $email;
                    $rs['subject'] = $selectSubject['subject'];
                    $rs['address'] = $address;
                    $rs['message'] = $message;
                    $sent = $this->sendTo($name, $phone, $email, $address, $message, $subject, $staff[$i]['id']);
                    $this->View->assign("rs",$rs);
                    $this->Email->setMessage($this->View->toString("contact.html"));
                    $this->Email->send();
                    //print $rs['subject'];

                }

                /*
                print $subject;
                $this->Email->setSubject($subject);
                $this->Email->setRecipient("Townsquare Citos <a.l1nk@yahoo.com>");
                $this->Email->setSender("<angling.kusuma@kana.co.id>");
                $rs['nama'] = $name;
                $rs['email'] = $email;
                $rs['subject'] = $subject;
                $rs['message'] = $message;
                $sent = $this->sendTo($name, $phone, $email, $address, $message, $subject, 5);
                $this->View->assign("rs",$rs);
                $this->Email->setMessage($this->View->toString("contact.html"));
                $this->Email->send();
                 * 
                 */
                
                
                //$hasSent = $this->Email->send();
                
                if($sent){
                    

                    $msg = "Message has been successfully sent";

                }else{
                    $msg = "Sending message failed. Please contact your administrator system.";

                }

               
                 
            }
            $this->View->assign("msg", $msg);
        }


        $viewBanner = $this->getBanner();

        $this->View->assign("banner", $viewBanner);
        $category = $this->getCategory();
        //$staff = $this->getContact();
        //print_r($staff);
        $this->View->assign("category", $category);
        $this->View->assign("staff", $staff);


        $this->close();
        $strHTML = $this->View->toString("FRONTEND/contents/contact.html");
		return $strHTML;
    }

    function admin(){
        if($this->Request->getParam("r")=="newSubject"){
            return $this->View->toString(NEW_SUBJECT);

        }else if($this->Request->getParam("r")=="newStaff"){
            $category = $this->getCategory();
            $this->View->assign("category", $category);
            return $this->View->toString(NEW_STAFF);

        }else if($this->Request->getParam("r")=="saveSubject"){
            $subject = $this->Request->getPost("subject");
            if(!$subject){
                $msg = "Subject required.";

            }else{
                $insertSubject = $this->insertCategory($subject);
                if($insertSubject){
                    $msg = "Subject has been successfully insert.";

                }else{
                    $msg = "Failed insert subject. Please contact your administrator system.";
                }
            }
            return $this->View->showMessage($msg, "?s=contact");

        }else if($this->Request->getParam("r")=="saveStaff"){
            $staffName = $this->Request->getPost("staffName");
            $staffEmail = $this->Request->getPost("staffEmail");
            $subject = $this->Request->getPost("subject");

            $insertStaff = $this->insertStaff($staffName, $staffEmail, $subject);
            if($insertStaff){
                $msg = "Staff has been successfully insert.";

            }else{
                $msg = "Failed insert staff. Please contact your administrator system.";
            }
            return $this->View->showMessage($msg, "?s=contact");


        }else if($this->Request->getParam("r")=="inbox"){
            $id = $this->Request->getParam("id");
            //print $id;
            $categoryID = $this->Request->getParam("categoryID");

            $list = $this->getInbox($id, $categoryID);
            $staff= $this->getInboxById($id, $categoryID);
            $this->View->assign("list", $list);
            $this->View->assign("staff", $staff);

            $total  = $this->fetch("SELECT COUNT(*)as totalMsg FROM gm_contact_inbox
                                    WHERE idStaff='".$id."' LIMIT 1");
            $this->View->assign("total", $total['totalMsg']);
            $this->View->assign("staffID", $id);
            return $this->View->toString(LANDING_INBOX);

        }else if($this->Request->getParam("r")=="delete"){
            $id = $this->Request->getParam("id");
            $categoryID = $this->Request->getParam("categoryID");

            $qdel = $this->deleteStaff($id);
            if($qdel){
                $this->deleteInboxByStaff($id);
                $msg = "Staff and inbox has been delete successfully.";
            }else{
                $msg = "Delete failed.";
            }
            return $this->View->showMessage($msg, "?s=contact");

        }else if($this->Request->getParam("r")=="manageSubject"){
            $id = $this->Request->getParam("id");
            if($this->Request->getParam("do")=='edit'){
                $msgID = $this->Request->getParam("id");
                $subjectID = $this->Request->getPost("subjectID");
                $subject = $this->Request->getPost("subject");

                if($this->Request->getParam("act")=='updateSubject'){
                    $update = $this->updateSubject($subjectID, $subject);
                    if($update){
                        $msg = "Subject has been update successfully.";

                    }else{
                        $msg = "Update subject failed.";

                    }
                    return $this->View->showMessage($msg, "?s=contact&r=manageSubject");


                }else{
                    $list = $this->getCategoryById($msgID);
                    $this->View->assign("list", $list);
                    return $this->View->toString(LANDING_EDIT_SUBJECT);
                }

            }else if($this->Request->getParam("do")=='delete'){
                $qdel = $this->deleteSubject($id);
                if($qdel){
                    $this->deleteStaffByCat($id);
                    $msg = "Subject has been delete successfully.";
                }else{
                    $msg = "Delete subject failed.";
                }
                return $this->View->showMessage($msg, "?s=contact&amp;=managSubject");

            }else{

                $list = $this->getCategory();
                $this->View->assign("list", $list);
                return $this->View->toString(LANDING_SUBJECT);
            }

        }else if($this->Request->getParam("r")=='deleteMessage'){
            $id = $this->Request->getParam("id");
            $urlBackID = $this->Request->getParam("staffID");
            $selectStaff = $this->fetch("SELECT idStaff FROM gm_contact_inbox LIMIT 1");
            $staffID = $selectStaff['idStaff'];
            $categoryID = $this->Request->getParam("categoryID");

            $qdel = $this->deleteMessage($id);
            if($qdel){
                $msg = "Message has been delete successfully.";
            }else{
                $msg = "Delete message failed.";
            }
            return $this->View->showMessage($msg, "?s=contact&r=inbox&id=$urlBackID&categoryID=$categoryID");


        }else if($this->Request->getParam("r")=="edit"){

            if($this->Request->getParam("do")=="update"){
                $id = $this->Request->getPost("id");
                $categoryID = $this->Request->getPost("categoryID");
                $staffName = $this->Request->getPost("staffName");
                $staffEmail = $this->Request->getPost("staffEmail");

                $update = $this->updateStaff($id, $staffName, $staffEmail);
                if($update){
                    $msg = "Staff has been update successfully.";
                }else{
                    $msg = "Update staff failed.";
                }
                return $this->View->showMessage($msg, "?categoryID=$categoryID&button=GO&s=contact");

            }else{
                $id = $this->Request->getParam("id");
                $categoryID = $this->Request->getParam("categoryID");
                $list = $this->getStaffById($id);
                $this->View->assign("list", $list);
                $this->View->assign("categoryID", $categoryID);
                return $this->View->toString(LANDING_EDIT_STAFF);
            }

        }else{
            return $this->showManagePage();

        }
    }

    function showManagePage(){

        $categoryID = $this->Request->getParam("categoryID");
        if($categoryID==NULL){
            $categoryID='1';
        }

        $cat = $this->fetch("SELECT * FROM gm_contact_category WHERE id='".$categoryID."' LIMIT 1");


        $list = $this->getManage($categoryID);
        $this->View->assign("list", $list);

        $category = $this->getCategory();
        $this->View->assign("category", $category);
        $this->View->assign("categoryById", $cat);
        return $this->View->toString(LANDING);
    }


    function updateStaff($id, $staffName, $staffEmail){
        return $this->query("UPDATE gm_contact SET staff_name='".$staffName."',
                staff_email='".$staffEmail."' WHERE id='".$id."'");
    }

    function getStaffById($id){
        return $this->fetch("SELECT * FROM gm_contact WHERE id='".$id."' LIMIT 1");
    }

    function getCategoryById($id){
        return $this->fetch("SELECT * FROM gm_contact_category WHERE id='".$id."' LIMIT 1");
    }

    function updateSubject($id,$subject){
        return $this->query("UPDATE gm_contact_category SET subject='".$subject."' WHERE id='".$id."'");
    }

    function deleteMessage($id){
        return $this->query("DELETE FROM gm_contact_inbox WHERE id='".$id."'");
    }

    function sendTo($name, $phone, $email, $address, $message, $subject, $staff){
        return $this->query("INSERT INTO gm_contact_inbox(name, phone, email,
                            address, message, idCategory, idStaff, updated)
                            VALUES('".$name."', '".$phone."', '".$email."',
                            '".$address."', '".$message."', '".$subject."', '".$staff."', NOW())");
    }

    function getInbox($id, $categoryID){
        return $this->fetch("SELECT ci.*, c.staff_name,cc.subject
                            FROM gm_contact_inbox ci, gm_contact c, gm_contact_category cc
                            WHERE ci.idStaff=c.id AND ci.idCategory=cc.id
                            AND ci.idCategory='".$categoryID."' AND ci.idStaff='".$id."'
                            ORDER BY ci.updated DESC", 1);
    }

    function getInboxById($id, $categoryID){
        return $this->fetch("SELECT c.staff_name, cc.subject FROM gm_contact c, gm_contact_category cc
                            WHERE c.idCategory=cc.id AND c.id='".$id."'
                            AND cc.id='".$categoryID."' LIMIT 1");
    }

    function insertCategory($subject){
        return $this->query("INSERT INTO gm_contact_category(subject)VALUES('".$subject."')");
    }

    function insertStaff($staffName, $staffEmail, $subject){
        return $this->query("INSERT INTO gm_contact(staff_name, staff_email, idCategory)
                                VALUES('".$staffName."', '".$staffEmail."', '".$subject."')");
    }

    function deleteStaff($id){
        return $this->query("DELETE FROM gm_contact WHERE id='".$id."'");
    }

    function deleteSubject($id){
        return $this->query("DELETE FROM gm_contact_category WHERE id='".$id."'");
    }

    function deleteStaffByCat($categoryID){
        return $this->query("DELETE FROM gm_contact WHERE id_category='".$categoryID."'");
    }

    function deleteInboxByStaff($staffID){
        return $this->query("DELETE FROM gm_contact_inbox WHERE idStaff='".$staffID."'");
    }

    function getCategory(){
        return $this->fetch("SELECT * FROM gm_contact_category ORDER BY subject ASC", 1);
    }

    function getContact(){
        return $this->fetch("SELECT * FROM gm_contact", 1);
    }

    function getManage($categoryID){
        return $this->fetch("SELECT gc.*, gcc.subject FROM gm_contact gc, gm_contact_category gcc
                            WHERE gc.idCategory=gcc.id AND gcc.id='".$categoryID."'", 1);
    }
}
?>
