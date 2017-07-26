<?php
class ActivityLogger extends SQLData{
	var $uname;
	function ActivityLogger(){
		parent::SQLData();
		$this->Session = new SessionManager("GM_ADMIN");
		$this->uname = $this->Session->getVariable("username");
		//$this->uname = $_SESSION['gm_uname'];
	}
	function log($str,$url="#"){
		//$this->open();
		@$this->query("INSERT INTO gm_log(username,activity,log_time,url) 
		VALUES('".$this->uname."','".mysql_escape_string($str)."',NOW(),'$url')");
		//$this->close();
	}
	function getRecentLogs($total=30){
		//$this->open();
		$rs = $this->fetch("SELECT *,DATE_FORMAT(log_time,'%d %M %Y, %H:%i') as record_time 
							FROM gm_log ORDER BY log_time DESC LIMIT $total",1);
		//$this->close();
		return $rs;
	}
	function getLogs($start,$total=50){
		if($start==NULL){$start=0;}else{$start=mysql_escape_string($start);}
		$rs = $this->fetch("SELECT * FROM gm_log ORDER BY log_time DESC LIMIT $start,$total",1);
		return $rs;
	}
}
?>