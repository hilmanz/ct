<?php
class SQLData{
	var $schema;
	var $conn;
	var $rs;
	var $msg;
	var $lastInsertId;
	var $objName;
	function SQLData(){
		global $CONFIG;
		$this->host = $CONFIG['HOST'];
		$this->username = $CONFIG['USERNAME'];
		$this->password = $CONFIG['PASSWORD'];
		$this->database = $CONFIG['DATABASE'];
		$this->msg="";
	
	}
	function open(){
		if($this->conn==NULL){
			$this->conn = mysql_connect($this->host,$this->username,$this->password);
			$this->addMessage("Open Connection -->".$this->conn);
		}else{
			$this->addMessage("Connection already opened : ".$this->conn."<br/>");
		}	
	}
	function addMessage($msg){
		$this->msg.=$msg."<br/>";
	}
	function close(){
		if($this->conn!=NULL){
			if(@mysql_close($this->conn)){
				$this->addMessage("Connection closed --> ".$this->conn);
				$this->conn=NULL;
			}
		}else{
			$this->addMessage("Connection already closed --> ".$this->conn);
		}
	}
	function setSchema($schema){
		$this->schema = $schema;
	}
	function fetch($str,$flag=0){
		$sql = $this->query($str);
		
		if($flag){
			$n=0;
			while($fetch = mysql_fetch_array($sql,MYSQL_ASSOC)){
				$rs[$n] = $fetch;
				$n++;
			}
		}else{
			$rs = mysql_fetch_array($sql,MYSQL_ASSOC);
		}
		
		mysql_free_result($sql);
		return $rs;
	}
	function reset(){
		$this->rs = NULL;
	}
	function query($sql,$flag=0){
		//print $sql;
		//if($this->conn==NULL){$this->open();}
		$this->addMessage("do query using ".$this->conn.": <br/>");
		$rs = mysql_db_query($this->database,$sql);	
		if($flag){
			$this->lastInsertId = mysql_insert_id();
		}
		$this->addMessage($rs);
		$this->addMessage(mysql_error()."<br/>");
		return $rs;
	}
	function getMessage(){
		$msg=mysql_error();
		$msg.="<br/>";
		$msg.=$this->msg;
		return $msg;
	}
	function getConsoleMessage(){
		$msg=mysql_error();
		$msg.="\n";
		$msg.=str_replace("<br/>","\n",$this->msg);
		return $msg;
	}
	function getLastInsertId(){
		return $this->lastInsertId;
	}
	
	//**
	/* Special Instant Methods
	//*/
	function setObject($objName){
		$this->objName = $objName;	
	}
	function get($id){
		$this->open();
		$rs = $this->fetch("SELECT * FROM ".$this->objName." WHERE id='".$id."' LIMIT 1");
		$this->close();
		return $rs;
	}
	function retrieve($stmt,$start,$total,$force=0){
		if($force){
			$this->open();
			$rs = $this->fetch($stmt." LIMIT ".$start.",".$total,1);
			
			$this->close();
		}else{
			$rs = $this->fetch($stmt." LIMIT ".$start.",".$total,1);
		}
		return $rs;
	}
	function getObject(){
		return $this->objName;	
	}
	function getFields(){
		$tbl_name = $this->getObject();
		$this->open();
		$fields = $this->fetch("SHOW FIELDS FROM ".$tbl_name,1);
		$this->close();
		return $fields;
	}
	function getFieldType($name){
		$tbl_name = $this->getObject();
		$this->open();
		$fields = $this->fetch("SHOW FIELDS FROM ".$tbl_name." WHERE Field='".$name."'");
		$this->close();
		return $fields['Type'];
	}
	function insert($data){
		$fields = $this->getFields();
		for($i=0;$i<sizeof($fields);$i++){
			if($data[$fields[$i]['Field']]!=NULL){
				$rs[$fields[$i]['Field']] = $data[$fields[$i]['Field']];
			}
		}
		foreach($rs as $name=>$val){
			//fields
			$strFields.=$name.",";
			//values
			$strValues.="'".$val."',";
		}
		$strFields = substr($strFields,0,strlen($strFields)-1);
		$strValues = substr($strValues,0,strlen($strValues)-1);
		$str = "INSERT INTO ".$this->getObject()."(".$strFields.") VALUES(".$strValues.")";
		
		$this->open();
		$rs = $this->query($str);
		$id =  mysql_insert_id();
		$this->close();
		return $id;
	}
	function update($id,$data){
		$id = mysql_escape_string($id);
		$fields = $this->getFields();
		for($i=0;$i<sizeof($fields);$i++){
			if($data[$fields[$i]['Field']]!=NULL){
				$rs[$fields[$i]['Field']] = $data[$fields[$i]['Field']];
			}
		}
		foreach($rs as $name=>$val){
			//fields
			$strFields.=$name."='".$val."',";
		}
		$strFields = substr($strFields,0,strlen($strFields)-1);
		
		$str = "UPDATE ".$this->getObject()." SET ".$strFields." WHERE id='".$id."'";
		$this->open();
		$rs = $this->query($str);
		$this->close();
		return $rs;
	}
	function delete($id){
		if(is_numeric($id)){
			$this->open();
			$rs = $this->query("DELETE FROM ".$this->getObject()." WHERE id='".$id."'");	
			$this->close();
			return $rs;
		}
	}
	// END OF SPECIAL INSTANT METHODS
}
?>