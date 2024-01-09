<?php 

class Database extends PDO {
	/*
	* initializing db inside constructor
	**/
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);		
	}
	/*
	* select table data
	* $table is the table name, mandetory field
	* $fields is array to be selected mandetory
	* $where clause is optional
	* $order by is for sorting optional
	**/
	public function select($table, $fields, $where = "1 = 1", $orderby="", $limit="", $fetchMode = PDO::FETCH_ASSOC){
		
		$selectfields = "";
		
		if ($fields != NULL){
			for($i = 0; $i < count($fields); $i++){
				$selectfields.=$fields[$i].",";
			}
			$selectfields = rtrim($selectfields, ',');
		}else{
			$selectfields = "*";
		}
		 //echo "SELECT $selectfields FROM $table WHERE $where $orderby"; die;
		$sth = $this->prepare("SELECT $selectfields FROM $table WHERE $where $orderby $limit");
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}

	public function callprocedure($statement, $fetchMode = PDO::FETCH_ASSOC){
		
		$selectfields = "";
		
		$sth = $this->prepare($statement);
		//echo $statement;die;
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	/**
	* $table string type is the table name of table
	* $agg two dimensional array as key and multiple value for aggregate function as key and values as fields array("sum"=>array("xqty_qty","xrate_rate"),"count"=>array("xvat"_vat),))
	* $groupby is also group column name
	*/
	public function selectAggregate($table,$agg, $where="", $groupby=array(), $orderby="", $fetchMode = PDO::FETCH_ASSOC){
		
		$xsumary = "select ";
		$grpby = "";
		if(!empty($groupby)){
		$grpby = " group by ";
		for($i=0;$i<count($groupby); $i++){
			$xsumary.=$groupby[$i].",";
			$grpby.=$groupby[$i].",";
			}
		$grpby = rtrim($grpby, ',');	
		}
		
		
		foreach ($agg as $key=>$value){
			switch ($key){
				case "sum":
					for($i = 0; $i < count($value); $i++){
						$xval=explode('_',$value[$i]);
						$xsumary .= "coalesce(sum(". $xval[0] ."),0) as ". $xval[1] .","; 
					}
					break;
				case "avg":
					for($i = 0; $i < count($value); $i++){
						$xval=explode('_',$value[$i]);
						$xsumary .= "coalesce(avg(". $xval[0] ."),0) as ". $xval[1] .","; 
					}
					break;
				case "count":
					for($i = 0; $i < count($value); $i++){
						$xval=explode('_',$value[$i]);
						$xsumary .= "coalesce(count(". $xval[0] ."),0) as ". $xval[1] .","; 
					}
					break;		
			}
				
				
		}
		
		$xsumary = rtrim($xsumary, ',');
		//echo $xsumary." from ".$table." ".$where.$grpby.$orderby; die;
		$sth = $this->prepare($xsumary." from ".$table." ".$where.$grpby.$orderby);
		$sth->execute();
		
		return $sth->fetchAll($fetchMode);
		
	}
	
	public function selectDistinct($table, $fields, $where = "1 = 1", $orderby="", $limit="", $fetchMode = PDO::FETCH_ASSOC){
		
		$selectfields = "";
		
		if ($fields != NULL){
			for($i = 0; $i < count($fields); $i++){
				$selectfields.=$fields[$i].",";
			}
			$selectfields = rtrim($selectfields, ',');
		}else{
			$selectfields = "*";
		}
		//echo "SELECT distinct $selectfields FROM $table WHERE $where $orderby $limit"; die;
		$sth = $this->prepare("SELECT distinct $selectfields FROM $table WHERE $where $orderby $limit");
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	/*
	* insert data into table
	* $table is the table name, mandetory field
	* $data is array to be inserted
	**/
	public function inserttemp($nexttbl, $cols, $vals){
		
			$res="0";
		
			//echo "INSERT INTO $nexttbl ($cols) VALUES $vals ";die;
			$st = $this->prepare("INSERT INTO $nexttbl ($cols) VALUES $vals");
			$st->execute();
			$res=$this->lastInsertId();
		
			
			return $res;
		
	}
	public function insert($table, $data){
		
			$result=0;
		
			ksort($data);
			
			$columns = implode('`, `', array_keys($data));
			$fields = ':' . implode(', :', array_keys($data));
			//echo "INSERT INTO $table (`$columns`) VALUES ($fields)";
			//print_r($data);die;
			$sth = $this->prepare("INSERT INTO $table (`$columns`) VALUES ($fields)");

			foreach ($data as $key => $value){
				$sth->bindValue(":$key", $value);
			//	echo "'".$value."', ";
			}
		//	die;
			$sth->execute();
			$result=$this->lastInsertId();
			
		return $result;
	}
	/*
	* $table is master table name
	* $data is array of columns and data for master table insert
	* $nexttbl is detail table name
	* $cols is array of detail table columns
	* $vals is string with multiple rows
	* $checkval is the  is string for where clause for duplicate value
	**/
	public function insertMasterDetail($table, $data, $nexttbl, $cols, $vals, $checkval){
		//print_r($data); die;
			$result = 0;
			$exists = "0";
			//to check key data exists
			$mstdata = $this->select($table, array(), $checkval);
			$exists=count($mstdata);
			if($exists>0){
				$result = 1;
			}
			//echo $exists; die;
			if($exists == 0){
				ksort($data);
				
				$columns = implode('`, `', array_keys($data));
				$fields = ':' . implode(', :', array_keys($data));
				//echo "INSERT INTO $table (`$columns`) VALUES ($fields)";


				// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
				// echo fwrite($file,"INSERT INTO $table (`$columns`) VALUES ($fields)");
				// fclose($file);
				
				$sth = $this->prepare("INSERT INTO $table (`$columns`) VALUES ($fields)");

				foreach ($data as $key => $value){
					$sth->bindValue(":$key", $value);
				//	echo "'".$value."',";
				}
				
				$sth->execute();
				//echo $this->lastInsertId();
				$result=$this->lastInsertId();
				//echo $result;die;
			}
			$res="0";
			
			if($result>0){
			//	echo "INSERT INTO $nexttbl ($cols) VALUES $vals";
				$st = $this->prepare("INSERT INTO $nexttbl ($cols) VALUES $vals");
				$st->execute();
				$res=$this->lastInsertId();
			}
			
		return $res;
	}
	
	public function insertMasterDetailTest($table, $data, $nexttbl, $cols, $vals, $checkval){
		//print_r($data); die;
			$result = 0;
			$exists = "0";
			//to check key data exists
			$mstdata = $this->select($table, array(), $checkval);
			$exists=count($mstdata);
			if($exists>0){
				$result = 1;
			}
			//echo $exists; die;
			if($exists == 0){
				ksort($data);
				
				$columns = implode('`, `', array_keys($data));
				$fields = ':' . implode(', :', array_keys($data));
				echo "INSERT INTO $table (`$columns`) VALUES ($fields)";


				// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
				// echo fwrite($file,"INSERT INTO $table (`$columns`) VALUES ($fields)");
				// fclose($file);
				
				$sth = $this->prepare("INSERT INTO $table (`$columns`) VALUES ($fields)");

				foreach ($data as $key => $value){
					$sth->bindValue(":$key", $value);
					echo "'".$value."',";
				}
				//die;
				$sth->execute();
				//echo $this->lastInsertId();
				$result=$this->lastInsertId();
				//echo $result;die;
			}
			$res="0";
			
			if($result>0){
				echo "INSERT INTO $nexttbl ($cols) VALUES $vals";
				$st = $this->prepare("INSERT INTO $nexttbl ($cols) VALUES $vals");
				$st->execute();
				$res=$this->lastInsertId();
			}
			
		return $res;
	}
	
	public function insertMultipleDetail($nexttbl, $cols, $vals, $onduplicateupdt=""){
			$res="0";
		
			//echo "INSERT INTO $nexttbl ($cols) VALUES $vals $onduplicateupdt";die;
			$st = $this->prepare("INSERT INTO $nexttbl ($cols) VALUES $vals $onduplicateupdt");
			$st->execute();
			$res=$this->lastInsertId();
		
			
			return $res;
	}
	
	function insertAsFromTable($tbl, $mstfields, $mstdata, $totbl,$intocols, $frmcols,$selecttbl, $where){
		
				//echo "INSERT INTO $totbl ($intocols) select  $frmcols from $selecttbl $where";die;
				$st = $this->prepare("INSERT INTO $tbl ($mstfields) VALUES ($mstdata)");
				$st->execute();
				
				$sth = $this->prepare("INSERT INTO $totbl ($intocols) select  $frmcols from $selecttbl $where");
				$sth->execute();
				$res=$this->lastInsertId();
			
			
		return $res;
	}

	function insertAsFromSingleTable($totbl,$intocols, $frmcols,$selecttbl, $where){
				
				//echo "INSERT INTO $totbl ($intocols) select  $frmcols from $selecttbl $where"; die;
				
				$sth = $this->prepare("INSERT INTO $totbl ($intocols) select  $frmcols from $selecttbl $where");
				$sth->execute();
				$res=$this->lastInsertId();
			
			
		return $res;
	}
	/*
	* update data of table
	* $table is the table name, mandetory field
	* $data is array to be inserted
	* $where clause is optional
	**/
	public function update($table, $data, $where){

		ksort($data);

		$updateFields = NULL;

		foreach($data as $key => $value){
			$updateFields .= "`$key` = :$key,";
		}

		$updateFields = rtrim($updateFields, ',');
		//print_r($data); die;
		//echo "update $table set $updateFields WHERE $where";
		
		$sth = $this->prepare("update $table set $updateFields WHERE $where");
				
		foreach ($data as $key => $value){
			$sth->bindValue(":$key", $value);
		//	echo "'".$value."',";
		}
		 
		return $sth->execute();
	}
	public function updateConcat($table, $updateCode, $where){

		//print_r($data); die;
		//echo "update $table set $updateCode WHERE $where";die;
		
		$sth = $this->prepare("update $table set $updateCode WHERE $where");
				
		// foreach ($data as $key => $value){
		// 	$sth->bindValue(":$key", $value);
			
		// }
		 
		return $sth->execute();
	}
	/*
	* update data of table
	* $table is the table name, mandetory field
	* $data is array to be inserted
	* $where clause is optional
	**/
	public function dbdelete($table, $where, $limit=""){
		//echo "DELETE FROM $table $where";die;
		$sth = $this->prepare("DELETE FROM $table $where");
		return $sth->execute();
	}
	public function delete($table, $where, $limit=""){
		//echo "DELETE FROM $table $where";die;
		$sth = $this->prepare("DELETE FROM $table $where");
		return $sth->execute();
	}
	/*
	* $table is table name
	* $keyfield is the field will be incremented
	* $prefix is the prefix of the transaction number will be added at the begining of the transaction
	* $num is the number of digits of the transaction number after prefix
	*/
	public function keyIncrement($table,$keyfield,$prefix,$num){
		$where = "bizid=".Session::get('sbizid')." and $keyfield like '".$prefix."%'";
		//echo "SELECT coalesce(max(SUBSTRING($keyfield, 4, $num)),0) as maxnum FROM $table WHERE $where";die;
		$sth = $this->prepare("SELECT coalesce(max(SUBSTRING($keyfield, -$num)),0) as maxnum FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxnum'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);die;
		return 	$prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);
	}
	
	public function getRINNo($table,$keyfield,$bin){
		$where = "bizid=".Session::get('sbizid')." and cbin=".$bin;
		
		$sth = $this->prepare("SELECT coalesce(max(SUBSTRING($keyfield, -4)),0) as maxnum FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxnum'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		
		return 	"ABL-".$bin."-".str_pad((string)$pdonum,4,"0",STR_PAD_LEFT);
	}
	
	public function keyIncrementNow($table,$keyfield,$prefix,$num){
		$where = "bizid=".Session::get('sbizid')." and xprefix = '".$prefix."'";
		//echo "SELECT coalesce(max(SUBSTRING($keyfield, 4, $num)),0) as maxnum FROM $table WHERE $where";die;
		$sth = $this->prepare("SELECT coalesce(max(SUBSTRING($keyfield, 5, $num)),0) as maxnum FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxnum'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);die;
		return 	$prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);
	}
	
	public function rowIncrement($table,$keyfield,$num, $field){
		$where = "bizid=".Session::get('sbizid')." and $keyfield='".$num."'";
		//echo "SELECT coalesce(max(SUBSTRING($keyfield, 4, $num)),0) as maxnum FROM $table WHERE $where";die;
		$sth = $this->prepare("SELECT coalesce(max($field),0) as maxrow FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxrow'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $prefix.str_pad((string)$pdonum,$num,"0",STR_PAD_LEFT);die;
		return 	$pdonum;
	}
	
	public function rowplus($table, $field){
		$where = "bizid=".Session::get('sbizid')."";
		//echo "SELECT coalesce(max($field),0) as maxrow FROM $table WHERE $where";die;
		$sth = $this->prepare("SELECT coalesce(max($field),0) as maxrow FROM $table WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxrow'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $pdonum;die;
		return 	$pdonum;
	}
	
	
	public function getIMBalance($xitemcode, $xwh){
		$stock=0;
		$where = "bizid=".Session::get('sbizid')." and xitemcode='".$xitemcode."' and xwh='".$xwh."'";
		//echo "SELECT xqty FROM vimstock WHERE $where";die;
		$sth = $this->prepare("SELECT COALESCE(xqty,0) as xbalance FROM vimstock WHERE $where");
		$sth->execute();
		
		
		return 	$sth->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	
	public function getItemDetail($searchby, $val, $fetchMode = PDO::FETCH_ASSOC){
		$where = "bizid=".Session::get('sbizid')." and $searchby = '".$val."' and xtxntype='Inventory Receive'";
		//echo "SELECT coalesce(max(SUBSTRING($keyfield, 4, $num)),0) as maxnum FROM $table WHERE $where";die;
		$sth = $this->prepare("SELECT * FROM imsetxn WHERE $where");
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	public function getItemMaster($searchby, $val, $fetchMode = PDO::FETCH_ASSOC){
		$where = "bizid=".Session::get('sbizid')." and xrecflag='Live' and $searchby = '".$val."'";
		//echo "SELECT coalesce(max(SUBSTRING($keyfield, 4, $num)),0) as maxnum FROM $table WHERE $where";die;

		$sth = $this->prepare("SELECT * FROM seitem WHERE $where");
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	public function getItemCost($xitemcode){
		$cost=0;
		$where = "bizid=".Session::get('sbizid')." and xitemcode='".$xitemcode."' LIMIT 1";
		//echo "SELECT xbal FROM vimstock WHERE $where";die;
		$sth = $this->prepare("SELECT xavgcost FROM vpoavgcost WHERE $where");
		$sth->execute();
		$avgcost = $sth->fetch(PDO::FETCH_ASSOC);
		If (!empty($avgcost)){
			$cost = $avgcost['xavgcost'];
		}
		return 	$cost;
	}
	
	public function getItemCode(){
		$user = Session::get('suserrow');
		$where = "bizid=". Session::get('sbizid') ." and zemail='". Session::get('suser') ."' and xtxntype='Inventory Receive'";
		//echo "SELECT max(coalesce(CAST(SUBSTRING(xitemcode, 3) AS UNSIGNED),0)) as maxrow FROM imsetxn WHERE $where";die;
		$sth = $this->prepare("SELECT max(coalesce(CAST(SUBSTRING(xitemcode, 3) AS UNSIGNED),0)) as maxrow FROM imsetxn WHERE $where");
		$sth->execute();
		$maxnum = $sth->fetch(PDO::FETCH_ASSOC);
		
		$pdonum = (int)$maxnum['maxrow'];
		if($pdonum==0)
			$pdonum = 1;
		else
			$pdonum += 1;
		
		//echo $pdonum;die;
		return 	$user."-".$pdonum;
	}
	
	
	/*
	* $xper is the offset setting period for financial period eg. if sets to 6 then July to jun
	* $cper is the current month or period
	* $returns an array of financial per=>year
	* call this method like -
	* foreach ($this->db->getYearPer(6,3) as $key=>$val); echo "Period-".$key." Year-".$val;
	**/
	public function getYearPer($xper, $cper){
		
		$year = date('Y');
		$pertable = array();
		
			for($i = 1; $i<13; $i++){
				$xper++;
				
				if($xper<13){
					$pertable[$xper] = array( $i => $year);
					}
				else{
					$year = $year - 1;
					$xper = 0;
					$xper++;
					$pertable[$xper] = array( $i => $year);
				}
			
			}
		
		return $pertable[$cper];
		
	}
	
}