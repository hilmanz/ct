<?php


/**
 * Description of Statistic
 *
 * @author linkx
 */

include_once $ENGINE_PATH."Utility/Paginate.php";
class Statistic extends SQLData{
    var $strHTML;
	var $View;
	var $tag;
	var $title;
	var $id;
	var $logger;
    var $Paging;
    function Statistic($req){
        parent::SQLData();
        $this->View = new BasicView();
        $this->Paging = new Paginate();
		$this->Request = $req;
    }

    function admin($logger=NULL){
		$this->logger = $logger;
		if($this->Request->getPost("r")=="view"){
			return $this->saveContent();
		}else if($this->Request->getPost("r")=="update"){
			return $this->updateContent();
		}else{
            return $this->showManagePage();
        }
    }

    

    function showManagePage(){
        $start = $this->Request->getParam("st");
		$total = 20; //total item retrieved per page


        /*
		if($start==NULL) $start=0;
		
        $sort = $this->Request->getParam("sort");
        if($sort!=NULL){
            //modify by LInk 11-02-2010 12.30PM
            $rs = $this->Product->getAllProductsFilteredSortByHits($start, $total, $forceConnect);
        }else{
            $rs = $this->Product->getAllProductsFilteredSortByHits($start, $total, $forceConnect);
            //$rs = $this->Product->getAllProducts($start,$total);
        }
		
        if($sort=='ASC'){
			  //bikin url baru
			$url = ereg_replace("sort=ASC","sort=DESC",$_SERVER['QUERY_STRING']);
            $this->View->assign("url_sort", $url);
        }else if($sort=="DESC"){
            $url = ereg_replace("sort=DESC","sort=ASC",$_SERVER['QUERY_STRING']);
            $this->View->assign("url_sort", $url);
		}else{
            $url = $_SERVER['QUERY_STRING']."&sort=DESC";
            $this->View->assign("url_sort", $url);
        }


		//retrieve main image
		for($i=0;$i<sizeof($rs['list']);$i++){
			//print "SELECT SUM(amount) as stock FROM product_stock WHERE productID='".$rs['list'][$i]['id']."' LIMIT 1";
			$counter = $this->Product->countHits($rs['list'][$i]['id']); //update hitCounter by Link 05-01-10_15:20PM
            $rs['list'][$i]['image'] = $foo['img'];
			$rs['list'][$i]['Stock'] = $stock['total'];
            $rs['list'][$i]['hits'] = $counter['totalHits']; //update hitCounter by Link 05-01-10_15:20PM


		}

        $this->View->assign("list",$rs['list']);
         * 
         */
		//paging
		$this->View->assign("paging",$this->Paging->generate($start,$total,$rs['total'],
							"?s=statistic"));

        $this->View->assign("test", "asdasddas");
        return $this->View->toString("../templates/Statistic/admin/view.html");

    }
}
?>
