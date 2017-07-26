<?php
/**
* ADMINISTRATION PAGE
* @author Hapsoro Renaldy N <hapsoro.renaldy@winixmedia.com>
*/
include_once "common.php";
$view = new BasicView();

$admin = new Admin();
//$admin->DEBUG=true;
//assign sections
if($admin->auth->isLogin()){
	switch($req->getRequest("s")){

        case "pages":
            $admin->showAdminLogin();
            include_once $APP_PATH. "Tenant/Tenant.php";
            $admin->execute(new Tenant($req), "tenant");
        break;

        /*
		case "page":
            $admin->showAdminLogin();
			include_once $APP_PATH."StaticPage/StaticPage.php";
			$admin->execute(new StaticPage($req),"static");
		break;
         * 
         */

        case "admin":
            $admin->showAdminLogin();
			include_once $APP_PATH."Admin/Admin.php";
			$admin->execute(new AdminConfig($req),"admin");
		break;


        case 'homepageSetting':
            $admin->showAdminLogin();
            include_once $APP_PATH."Homepagesetting/Homepagesetting.php";
			$admin->execute(new Homepagesetting($req),"homepageSetting");
        break;

        
        case 'category':
            $admin->showAdminLogin();
            include_once $APP_PATH."Products/Category.php";
            $admin->execute(new Category($req), "category");
        break;

        
        case 'member':
            $admin->showAdminLogin();
            include_once $APP_PATH."Member/Member.php";
            $admin->execute(new Member($req), "member");
        break;

        case 'viewDetail':
            $admin->showAdminLogin();
            include_once $APP_PATH."Member/Member.php";
            $admin->execute(new Member($req), "member");
        break;

        case 'gallery':
            $admin->showAdminLogin();
            include_once $APP_PATH."Gallery/Gallery.php";
            $admin->execute(new Gallery($req), "gallery");
        break;

        case "article":
            $admin->showAdminLogin();
			include_once $APP_PATH."Article/Article.php";
			$admin->execute(new Article($req),"article");
		break;
        
        case 'statistic':
            $admin->showAdminLogin();
            include_once $APP_PATH."Statistic/Statistic.php";
            $admin->execute(new Statistic($req), "statistic");
        break;

        case "print":
            $admin->showAdminLogin();
			include_once $APP_PATH."Printing/Printing.php";
			$admin->execute(new Printing($req), "print");
		break;



        /*
		case "splash":
            $admin->showAdminLogin();
			include_once $APP_PATH."Banners/SplashScreen.php";
			$admin->execute(new SplashScreen($req),"splash");
		break;
         * 
         */

        case "bannerSet":
            $admin->showAdminLogin();
			include_once $APP_PATH."Banners/Banners.php";
			$admin->execute(new Banners($req),"banners");
		break;

        case "contact":
            $admin->showAdminLogin();
			include_once $APP_PATH."Contact/Contact.php";
			$admin->execute(new Contact($req),"contact");
		break;
		
		

		
        /*
		case "testimony":
			include_once $APP_PATH."BSI/Testimony.php";
			$admin->execute(new Testimony($req),"testimony");
		break;

		case "partners":
			include_once $APP_PATH."BSI/Partners.php";
			$admin->execute(new Partners($req),"partners");
		break;

		case "home":
			include_once $APP_PATH."BSI/BSIMain.php";
			$admin->execute(new BSIMain($req),"home");
		break;

		case "careers":
			include_once $APP_PATH."BSI/Careers.php";
			$admin->execute(new Careers($req),"careers");
		break;

		case "member":
			include_once $APP_PATH."Member/Member.php";
			$admin->execute(new Member($req),"member");
		break;

		case "download":
			include_once $APP_PATH."Download/Download.php";
			$admin->execute(new Download($req),"download");
		break;

		case "help":
			include_once $APP_PATH."BSI/KnowledgeBase.php";
			$admin->execute(new KnowledgeBase($req),"help");
		break;

		case "faq":
			include_once $APP_PATH."BSI/FAQ.php";
			$admin->execute(new FAQ($req),"faq");
		break;

        case "gallery":
			include_once $APP_PATH."Gallery/Gallery.php";
			$admin->execute(new Gallery($req),"gallery");
		break;

        case "calendar":
			include_once $APP_PATH."Calendar/Calendar.php";
			$admin->execute(new Calendar($req),"calendar");
		break;

        case 'tagImages':
            include_once $APP_PATH."BSI/TagImages.php";
			$admin->execute(new TagImages($req),"imagesTag");
        break;

		case "inquiry":
			include_once $APP_PATH."BSI/Contact.php";
			$admin->execute(new Contact($req),"inquiry");
		break;
        */
            
		default:
			//$view->assign("mainContent","dashboard");
			$admin->showDashboard();
		break;
	}
}
//assign content to main template
$admin->show();

$view->assign("mainContent",$admin->toString());
//output the populated main template
print $view->toString($MAIN_TEMPLATE);
?>