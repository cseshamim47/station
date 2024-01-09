<?php 

class Jsondata_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
		
	public function getItemInfoForSale($searchby, $val){
		echo json_encode($this->db->getItemMaster($searchby, $val));
	}
	public function getWorkOrderDetail($wonum){
		$fields = array("*");
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and wonum = '". $wonum ."'";	
		echo json_encode($this->db->select("workorder", $fields, $where));
	}
	public function getWoDtForWor($wonum){
		$fields = array("*","(xamount + COALESCE((select sum(xamount) from worevise where worevise.wonum='".$wonum."' and xstatus='Confirmed'),0)) as xprevamount");
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and wonum = '". $wonum ."'";	
		echo json_encode($this->db->select("workorder", $fields, $where));
	}
	public function getPlatDetails($platcode){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xplatcode = '". $platcode ."'";	
		echo json_encode($this->db->select("seplat", $fields, $where));
	}
	
	public function getItemStock($xitemcode, $xwh){
		echo json_encode($this->db->getIMBalance($xitemcode, $xwh));
	}
	
	public function getPoint($cus){
		$points = array("point"=>$this->db->getCustomerPoint($cus));
		echo json_encode($points);
	}
	
	public function isMyCus($cus){
		
		$fields = array();
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus."' and xagent='". Session::get('suser') ."'" ;	
		
		if( empty($this->db->select("secus", $fields, $where))){
			return false;
		}else{
			return true;
		}
	
	}
	public function getSuppliersByLimit($limit=""){
		$fields = array("xsup", "xorg", "xadd1","xmobile", "xsupemail");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("sesup", $fields, $where, " order by xsup desc", $limit);
	}
	public function getPOByLimit($limit=""){
		$fields = array("xponum", "date_format(xdate,'%d-%m-%Y') as xdate", "xsup","(select xorg from sesup where sesup.xsup = pomst.xsup) as xorg","xproj");
		
		$where = " xstatus='Confirmed' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("pomst", $fields, $where, " order by xdate", $limit);
	}
	public function getGrnByLimit($limit=""){
		$fields = array("xgrnnum", "date_format(xdate,'%d-%m-%Y') as xdate", "xsup","(select xorg from sesup where sesup.xsup = pogrnmst.xsup) as xorg","xproj");
		
		$where = " xstatus='Confirmed' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("pogrnmst", $fields, $where, " order by xdate", $limit);
	}
	public function getWoByLimit($limit=""){
		$fields = array("wonum", "date_format(xdate,'%d-%m-%Y') as xdate", "toname","toorg","tomobile","xamount");
		
		$where = " xstatus='Confirmed' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("workorder", $fields, $where, " order by xdate", $limit);
	}
	public function getcrSuppliersByLimit($limit=""){
		$fields = array("xsup as xsupcr", "xorg", "xadd1","xmobile", "xsupemail");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("sesup", $fields, $where, " order by xsup desc", $limit);
	}
	public function getCustomersByLimit($limit=""){
		$fields = array("xcus", "xorg", "xadd1","xmobile", "xcusemail");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("secus", $fields, $where, " order by xcus desc", $limit);
	}
	public function getSchoolByLimit($limit=""){
		$fields = array("xcus", "xorg", "xadd1","xmobile", "xcusemail");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("secus", $fields, $where, " order by xcus desc", $limit);
	}
	public function getBookByLimit($limit=""){
		$fields = array("xitemcode", "xdesc");
		// and xgitem = 'Book'
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("seitem", $fields, $where, $limit);
	}
	public function getcrCustomersByLimit($limit=""){
		$fields = array("xcus as xcuscr", "xorg", "xadd1","xmobile", "xcusemail");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("secus", $fields, $where, " order by xcus desc", $limit);
	}
	public function getoutletbysup($sup){
		$fields = array("xoutlet", "xdesc", "xadd1");
		
		$where = " bizid = ". Session::get('sbizid') ." and xsup='".$sup."'";	
		return $this->db->select("sesupoutlet", $fields, $where);
	}
	
	public function getCustomer($cus){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";	
		echo json_encode($this->db->select("secus", $fields, $where));
	}

	
	public function getItem($id){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xitemcode = '". $id ."'";	
		echo json_encode($this->db->select("seitem", $fields, $where));
	}
	
	public function getAllItem($cus,$clsarr,$conv,$dis){
		// $fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`c`.`xcur` as `xcur`","`c`.`xmrp` as `xmrp`","(
		// 	CASE WHEN `c`.`xcur` = 'BDT' THEN '1'
		// 	WHEN `c`.`xcur` = 'RS' THEN '".$conv."'
		// 	ELSE `c`.`xcurconversion`
		// 	END
		// ) as `xcurconversion`","(
		// 	CASE WHEN `c`.`xcur` = 'BDT' THEN '".$dis."'
		// 	WHEN `c`.`xcur` = 'RS' THEN '0'
		// 	ELSE '0'
		// 	END
		// ) as `xdis`");
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`c`.`xcur` as `xcur`","`b`.`xmrp` as `xmrp`","`b`.`xqty` as `xqty`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","`b`.`xdisc` as `xnetdis`","(`b`.`xmrp`-`b`.`xdisc`) as `xnet`","((`b`.`xmrp`-`b`.`xdisc`)*`b`.`xqty`) as `xtotal`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xcus`= '".$cus."' and `b`.`xitemcode` = `c`.`xitemcode` and `c`.`xgitem`='Book' and `b`.`xclass` IN (".$clsarr.")";	
		echo json_encode($this->db->select("`itemscmap` `b` join `seitem` `c`", $fields, $where));
	}
	public function getAllItemSta($cus,$clsarr,$conv,$dis){
		// $fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`c`.`xcur` as `xcur`","`c`.`xmrp` as `xmrp`","(
		// 	CASE WHEN `c`.`xcur` = 'BDT' THEN '1'
		// 	WHEN `c`.`xcur` = 'RS' THEN '".$conv."'
		// 	ELSE `c`.`xcurconversion`
		// 	END
		// ) as `xcurconversion`","(
		// 	CASE WHEN `c`.`xcur` = 'BDT' THEN '".$dis."'
		// 	WHEN `c`.`xcur` = 'RS' THEN '0'
		// 	ELSE '0'
		// 	END
		// ) as `xdis`");
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`c`.`xcur` as `xcur`","`b`.`xmrp` as `xmrp`","`b`.`xqty` as `xqty`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","`b`.`xdisc` as `xnetdis`","(`b`.`xmrp`-`b`.`xdisc`) as `xnet`","((`b`.`xmrp`-`b`.`xdisc`)*`b`.`xqty`) as `xtotal`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xcus`= '".$cus."' and `b`.`xitemcode` = `c`.`xitemcode` and `c`.`xgitem`='Stationary' and `b`.`xclass` IN (".$clsarr.")";	
		echo json_encode($this->db->select("`itemscmap` `b` join `seitem` `c`", $fields, $where));
	}
	
	public function getSoItem($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","((`b`.`xrate`*`b`.`xexch`)-((`b`.`xrate`*`b`.`xexch`*`b`.`xdispct`)/100)) as xnet","(`b`.`xdisc`/`b`.`xqty`) as xnetdis","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as xdistotal", "`b`.`xrow` as `xrow`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`sodet` `b` join `seitem` `c`", $fields, $where));
	}
	public function getSoItemSta($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","((`b`.`xrate`*`b`.`xexch`)-((`b`.`xrate`*`b`.`xexch`*`b`.`xdispct`)/100)) as xnet","(`b`.`xdisc`/`b`.`xqty`) as xnetdis","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as xdistotal", "`b`.`xrow` as `xrow`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode` and `c`.`xgitem` <> 'Book'";	
		echo json_encode($this->db->select("`sodet` `b` join `seitem` `c`", $fields, $where));
	}
	
	public function getSoItemFree($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","((`b`.`xrate`*`b`.`xexch`)-((`b`.`xrate`*`b`.`xexch`*`b`.`xdispct`)/100)) as xnet","(`b`.`xdisc`/`b`.`xqty`) as xnetdis","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as xdistotal", "`b`.`xrow` as `xrow`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`sofreedet` `b` join `seitem` `c`", $fields, $where));
	}
	public function getFormaItem($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xprintqty` as `xprintqty`","`b`.`xforma` as `xforma`","`b`.`xformaplate` as `xformaplate`","`b`.`xpapername` as `xpapername`","`b`.`xpaperqty` as `xpaperqty`","`b`.`xboardname` as `xboardname`","`b`.`xboardqty` as `xboardqty`","`b`.`xcoverplate` as `xcoverplate`","`b`.`xrow` as `xrow`");
		$where = "`c`.`bizid` = `c`.`bizid` and `b`.`xordernum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`formadet` `b` join `seitem` `c`", $fields, $where));
	}
	
	public function getBooklistDt($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`c`.`xbrand` as `xbrand`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdispct`","`b`.`xqty` as `xqty`","`b`.`xdisc` as xdisc", "`b`.`xrow` as `xrow`", "`b`.`xsubject` as `xsubject`", "`b`.`xschoolpur` as `xschoolpur`", "`b`.`xschoolsale` as `xschoolsale`", "`b`.`xclass` as `xclass`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xdocnum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`booklistdet` `b` join `seitem` `c`", $fields, $where," order by `b`.`xclass`,`b`.`xsubject`,`b`.`xrow`"));
	}
	
	public function getSoItemReject($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","((`b`.`xrate`*`b`.`xexch`)-((`b`.`xrate`*`b`.`xexch`*`b`.`xdispct`)/100)) as xnet","(`b`.`xdisc`/`b`.`xqty`) as xnetdis","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as xdistotal", "`b`.`xrow` as `xrow`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`rejectdet` `b` join `seitem` `c`", $fields, $where));
	}
	// public function getSoItemStaFree($sonum){
	// 	$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","`b`.`xdispct` as `xdis`","((`b`.`xrate`*`b`.`xexch`)-((`b`.`xrate`*`b`.`xexch`*`b`.`xdispct`)/100)) as xnet","(`b`.`xdisc`/`b`.`xqty`) as xnetdis","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as xdistotal", "`b`.`xrow` as `xrow`");
	// 	$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode` and `c`.`xgitem` <> 'Book'";	
	// 	echo json_encode($this->db->select("`sofreedet` `b` join `seitem` `c`", $fields, $where));
	// }
	public function getSoDt($sonum){
		$fields = array("`b`.`xsonum` as `xsonum`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","`c`.`xorg` as `xorg`","`b`.`xwh` as `xwh`","`b`.`xquotnum` as `xquotnum`","`b`.`xgrossdisc` as `xgrossdisc`","`b`.`xrcvamt` as `xrcvamt`","`b`.`xnotes` as `xnotes`","`b`.`xstatus` as `xstatus`","(select sum((`sodet`.`xrate`*`sodet`.`xexch`*`sodet`.`xqty`)-`sodet`.`xdisc`) from sodet where sodet.bizid = b.bizid and sodet.xsonum = b.xsonum) as xtotalprice","`b`.`xpackcharge` as `xpackcharge`","`b`.`xtranscost` as `xtranscost`","`b`.`xcusbal` as `xcusbal`");
		$where = "`b`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xcus` = `c`.`xcus`";	
		echo json_encode($this->db->select("`somst` `b` join `secus` `c`", $fields, $where));
	}
	public function getSoDtFree($sonum){
		$fields = array("`b`.`xsonum` as `xsonum`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","`c`.`xorg` as `xorg`","`b`.`xwh` as `xwh`","`b`.`xquotnum` as `xquotnum`","`b`.`xgrossdisc` as `xgrossdisc`","`b`.`xrcvamt` as `xrcvamt`","`b`.`xnotes` as `xnotes`","`b`.`xstatus` as `xstatus`","(select sum((`sodet`.`xrate`*`sodet`.`xexch`*`sodet`.`xqty`)-`sodet`.`xdisc`) from sodet where sodet.bizid = b.bizid and sodet.xsonum = b.xsonum) as xtotalprice","`b`.`xpackcharge` as `xpackcharge`","`b`.`xtranscost` as `xtranscost`","`b`.`xcusbal` as `xcusbal`");
		$where = "`b`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xcus` = `c`.`xcus`";	
		echo json_encode($this->db->select("`sofreemst` `b` join `secus` `c`", $fields, $where));
	}
	public function getForma($sonum){
		$fields = array("`b`.`xordernum` as `xordernum`","`b`.`xdate` as `xdate`","`b`.`xpress` as `xpress`","`b`.`xquotnum` as `xquotnum`","`b`.`xnotes` as `xnotes`","`b`.`xstatus` as `xstatus`");
		$where = "`b`.`xrecflag`='Live' and `b`.`xordernum`= '".$sonum."'";	
		echo json_encode($this->db->select("`formamst` `b`", $fields, $where));
	}
	public function getBooklist($sonum){
		$fields = array("`b`.`xdocnum` as `xdocnum`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","`c`.`xorg` as `xorg`","`b`.`xquotnum` as `xquotnum`","`b`.`xnotes` as `xnotes`","`b`.`xstatus` as `xstatus`");
		$where = "`b`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xdocnum`= '".$sonum."' and `b`.`xcus` = `c`.`xcus`";	
		echo json_encode($this->db->select("`booklist` `b` join `secus` `c`", $fields, $where));
	}
	public function getSoDtReject($sonum){
		$fields = array("`b`.`xsonum` as `xsonum`","`b`.`xdate` as `xdate`","`b`.`xwh` as `xwh`","`b`.`xquotnum` as `xquotnum`","`b`.`xgrossdisc` as `xgrossdisc`","`b`.`xrcvamt` as `xrcvamt`","`b`.`xnotes` as `xnotes`","`b`.`xstatus` as `xstatus`","(select sum((`sodet`.`xrate`*`sodet`.`xexch`*`sodet`.`xqty`)-`sodet`.`xdisc`) from sodet where sodet.bizid = b.bizid and sodet.xsonum = b.xsonum) as xtotalprice","`b`.`xpackcharge` as `xpackcharge`","`b`.`xtranscost` as `xtranscost`","`b`.`xcusbal` as `xcusbal`");
		$where = "`b`.`xrecflag`='Live' and `b`.`xsonum`= '".$sonum."'";	
		echo json_encode($this->db->select("`rejectmst` `b`", $fields, $where));
	}
	public function getSalesItems($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xcur` as `xcur`","`b`.`xrate` as `xmrp`","`b`.`xexch` as `xcurconversion`","(`b`.`xdisc`/(`b`.`xrate`*`b`.`xexch`*`b`.`xqty`))*100 as `xdis`","`b`.`xqty` as `xqty`", "((`b`.`xrate`*`b`.`xexch`*`b`.`xqty`)-`b`.`xdisc`) as `xtotal`","`b`.`xdisc` as `xdistotal`", "`b`.`xrow` as `xrow`","(SELECT xclass from itemscmap where itemscmap.xcus = b.xcus and itemscmap.xitemcode = b.xitemcode) as xclass","`c`.`xgitem` as `xgitem`","`b`.`xsubtotal` as `xsubtotal`","`b`.`xgrossdisc` as `xgrossdisc`","`b`.`xrcvamt` as `xrcvamt`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","(select xorg from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xorg","(select xadd1 from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xadd1","(select xmobile from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xmobile","(select xphone from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xphone","(select xcity from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xcity","(select xprovince from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xprovince","`b`.`xpackcharge` as `xpackcharge`","`b`.`xtranscost` as `xtranscost`","`b`.`xcusbal` as `xcusbal`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`vsalesdt` `b` join `seitem` `c`", $fields, $where));
	}
	public function getPrintOrder($sonum){
		$fields = array("`b`.`xdate` as `xdate`","`b`.`xordernum` as `xordernum`","`b`.`xpress` as `xpress`","`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xprintqty` as `xprintqty`","`b`.`xforma` as `xforma`","`b`.`xformaplate` as `xformaplate`","`b`.`xpapername` as `xpapername`","`b`.`xpaperqty` as `xpaperqty`","`b`.`xboardname` as `xboardname`","`b`.`xboardqty` as `xboardqty`","`b`.`xcoverplate` as `xcoverplate`","`b`.`xrow` as `xrow`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xordernum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`formadet` `b` join `seitem` `c`", $fields, $where));
	}
	public function getSalesItemsFree($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xqty` as `xqty`", "`b`.`xrow` as `xrow`","(SELECT xclass from itemscmap where itemscmap.xcus = b.xcus and itemscmap.xitemcode = b.xitemcode) as xclass","`c`.`xgitem` as `xgitem`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","(select xorg from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xorg","(select xadd1 from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xadd1","(select xmobile from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xmobile","(select xphone from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xphone","(select xcity from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xcity","(select xprovince from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xprovince","xrate");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`sofreedet` `b` join `seitem` `c`", $fields, $where));
	}
	public function getBookListReport($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xqty` as `xqty`", "`b`.`xrow` as `xrow`","`b`.`xclass` as `xclass`","`c`.`xgitem` as `xgitem`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","(select xorg from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xorg","(select xadd1 from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xadd1","(select xmobile from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xmobile","(select xphone from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xphone","(select xcity from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xcity","(select xprovince from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xprovince","`b`.`xsubject` as `xsubject`","`b`.`xqty` as `xqty`","`b`.`xrate` as `xrate`","`b`.`xexch` as `xexch`","`b`.`xdisc` as `xdisc`","`b`.`xdispct` as `xdispct`","`b`.`xschoolpur` as `xschoolpur`","`b`.`xschoolsale` as `xschoolsale`","`c`.`xbrand` as `xbrand`");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xdocnum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`booklistdet` `b` join `seitem` `c`", $fields, $where, " order by `b`.`xclass`,`b`.`xsubject`,`b`.`xrow`"));
	}
	public function getSalesItemsReject($sonum){
		$fields = array("`b`.`xitemcode` as `xitemcode`","`c`.`xdesc` as `xdesc`","`c`.`xlongdesc` as `xlongdesc`","`b`.`xqty` as `xqty`", "`b`.`xrow` as `xrow`","(SELECT xclass from itemscmap where itemscmap.xcus = b.xcus and itemscmap.xitemcode = b.xitemcode) as xclass","`c`.`xgitem` as `xgitem`","`b`.`xdate` as `xdate`","`b`.`xcus` as `xcus`","(select xorg from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xorg","(select xadd1 from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xadd1","(select xmobile from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xmobile","(select xphone from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xphone","(select xcity from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xcity","(select xprovince from secus where secus.xcus = b.xcus and secus.bizid = b.bizid) as xprovince");
		$where = "`c`.`xrecflag`='Live' and `c`.`bizid` = `c`.`bizid` and `b`.`xsonum`= '".$sonum."' and `b`.`xitemcode` = `c`.`xitemcode`";	
		echo json_encode($this->db->select("`rejectdet` `b` join `seitem` `c`", $fields, $where));
	}

	// public function getData($code){
	// 	$fields = array("xitemcode");
	// 	$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
	// 	$ar = $this->db->select("seitem", $fields, $where);
	// 	$return_arr = array();
	// 	foreach($ar as $k=>$v) {
	// 		$return_arr[] =  $v['xitemcode'];
	// 	  }
	// 	  echo json_encode($return_arr);
	// }

	public function getData2($wh=""){
		if($wh != "" && $wh != null){
			$fields = array("xitemcode", "xdesc","xmrp","xcur","IFNULL((SELECT xqty from vimstock where vimstock.xitemcode = seitem.xitemcode and vimstock.xwh = '". $wh ."'),0) as xqty");
		}
		else{
			$fields = array("xitemcode", "xdesc","xmrp","xcur","IFNULL((SELECT SUM(xqty) from vimstock where vimstock.xitemcode = seitem.xitemcode GROUP BY bizid,xitemcode),0) as xqty");
		}
		$where = " xrecflag = 'Live' and bizid = ".Session::get('sbizid');
		//$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
		$ar = $this->db->select("seitem", $fields, $where);
		$return_arr = array();
		foreach($ar as $k=>$v) {
			$return_a = array("xitemcode"=>$v['xdesc']."*".$v['xitemcode'], "xdesc"=>$v['xqty']);
			array_push($return_arr, $return_a);
		  }
		  echo json_encode($return_arr);
	}
	public function getDataForAuto($code=""){// or xadd1 LIKE '%".$code."%'
		$fields = array("xorg as value", "xcus", "xmobile");
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') . " and xorg like '%".$code."%'";	
		echo json_encode($this->db->select("secus", $fields, $where, " LIMIT 5"));
	}
	
	public function getWarehouse($type){
		$fields = array("xcodetype","xcode");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcodetype='".$type."'";	
		echo json_encode($this->db->select("secodes", $fields, $where));
	}
	
	public function getAccHead($type){
		$fields = array("concat(xdesc,'~',xacc) as xdesc","xacc");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." order by xdesc";	// and xacctype='".$type."'
		echo json_encode($this->db->select("glchart", $fields, $where));
	}
	public function getData(){
		$fields = array("xitemcode", "xdesc","xmrp","xcur");
		//$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid');
		$ar = $this->db->select("seitem", $fields, $where);
		$return_arr = array();
		foreach($ar as $k=>$v) {
			$return_a = array("xitemcode"=>$v['xdesc']."*".$v['xitemcode'], "xdesc"=>$v['xmrp'].$v['xcur']);
			array_push($return_arr, $return_a);
		  }
		  echo json_encode($return_arr);
	}
	
	public function getItemDataTest(){
		$fields = array("xitemcode", "xdesc","xmrp","xcur");
		//$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
		$ar = $this->db->select("seitem", $fields, "1=1");
		$return_arr = array();
		foreach($ar as $k=>$v) {
			$return_a = array("xitemcode"=>$v['xdesc']);
			array_push($return_arr, $return_a);
		  }
		  echo json_encode($return_arr);
	}
	
	public function getclass($cus, $group){
		$fields = array("xclass");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."' and (SELECT xgitem from seitem where seitem.bizid=itemscmap.bizid and seitem.xitemcode=itemscmap.xitemcode)='".$group."'";	
		echo json_encode($this->db->select("itemscmap", $fields, $where, "GROUP BY xclass"));
	}
	
	public function getSubject(){
		$fields = array("xcodetype","xcode");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and (xcodetype='Subject' or xcodetype='Class')";	
		echo json_encode($this->db->select("secodes", $fields, $where));
	}

	public function getBooks($xcus){
		$fields = array("xitemcode");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $xcus ."'" ;	
		
		return $this->db->select("itemscmap", $fields, $where);
	}

	public function getCustomerBal($cus){
		$fields = array("*");
		$where = " bizid = ". Session::get('sbizid') ." and xaccsub = '". $cus ."'";	
		echo json_encode($this->db->select("vcustomerbal", $fields, $where));
	}
	public function getPoBal($ponum){
		$fields = array("xponum", "xsup", "((SELECT sum(xqty*xratepur*xexch) from podet where podet.xponum=pomst.xponum)-IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xponum=pomst.xponum and xstatus<>'Created'),0)) as xpobal", "(select xorg from sesup where sesup.xsup = pomst.xsup) as xorg");
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $ponum ."' and xstatus='Confirmed' ";	
		echo json_encode($this->db->select("pomst", $fields, $where));
	}
	public function getGrnBal($ponum){
		$fields = array("xgrnnum", "xsup", "((SELECT sum(xqtypur*xratepur*xexch) from pogrndet where pogrndet.xgrnnum=pogrnmst.xgrnnum)-IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xgrnnum=pogrnmst.xgrnnum and xstatus<>'Created' and xstatus<>'Canceled'),0)) as xgrnbal", "IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xgrnnum=pogrnmst.xgrnnum and xstatus='Confirmed'),0) as xprepay", "(select xorg from sesup where sesup.xsup = pogrnmst.xsup) as xorg");
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $ponum ."' and xstatus='Confirmed' ";	
		echo json_encode($this->db->select("pogrnmst", $fields, $where));
	}
	public function getWoBal($wonum){
		$fields = array("*", "((IFNULL(sum(xamount),0))+ (IFNULL((select sum(xamount) from worevise where wonum='".$wonum."' and xstatus='Confirmed'),0))) as xwobal", "(IFNULL((SELECT sum(xprime) from gldetail where gldetail.xaccsub=workorder.wonum and gldetail.xprime>0),0)) as xprepay");
		$where = " bizid = ". Session::get('sbizid') ." and wonum = '". $wonum ."' and xstatus='Confirmed' ";	
		echo json_encode($this->db->select("workorder", $fields, $where));
	}
	public function cusgeoloc(){
		$fields = array("*");
		$where = " DATE_FORMAT(xdate,'%Y-%m-%d')='2018-06-05'";	
		echo json_encode($this->db->select("emp_movement", $fields, $where));
	}
	public function getSupplier($sup){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";	
		echo json_encode($this->db->select("sesup", $fields, $where));
	}
	public function getInfoRinDetail($rin){
		$fields = array("*","(select xbalance from vospbal where mlminfo.bizid=vospbal.bizid and mlminfo.xrdin=vospbal.xrdin) as xospbal");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		echo json_encode($this->db->select("mlminfo", $fields, $where));
	}

	
	public function getSalesList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("somst", $fields, $where));
	}
	public function getSalesListFree($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("sofreemst", $fields, $where));
	}
	// public function getPO($code){
	// 	$fields = array("distinct xponum");
	// 	$where = " xitemcode='".$code."' and xstatus='Confirmed' and bizid = ". Session::get('sbizid') ;
	// 	echo json_encode($this->db->select("vpodet", $fields, $where));
	// }
	public function getFormaList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xordernum","xpress");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("formamst", $fields, $where));
	}
	public function getBookListTable($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xdocnum","xcus","(select xorg from secus where secus.bizid=booklist.bizid and secus.xcus=booklist.xcus) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("booklist", $fields, $where));
	}
	public function getSalesListReject($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","'' as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("rejectmst", $fields, $where));
	} 
	public function getCusMap(){
		$fields = array("xcus","(select xorg from secus where secus.bizid=itemscmap.bizid and secus.xcus=itemscmap.xcus) as xorg","xclass");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("itemscmap", $fields, $where, " group by xcus,xclass"));
	}



	public function getMapping($xcus, $xclass){
		$fields = array("*","(select xorg from secus where secus.bizid=itemscmap.bizid and secus.xcus=itemscmap.xcus) as xorg","(select xdesc from seitem where seitem.bizid=itemscmap.bizid and seitem.xitemcode=itemscmap.xitemcode) as xdesc","(select xlongdesc from seitem where seitem.bizid=itemscmap.bizid and seitem.xitemcode=itemscmap.xitemcode) as xlongdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xcus='".$xcus."' and xclass='".$xclass."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("itemscmap", $fields, $where));
	}



	//GL List Area

	public function getGlchartByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	public function getGlchartsubByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xaccsource='Sub Account' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	public function getGlchartSubList($limit=""){
		$fields = array("xacc","(select xdesc from glchart where glchart.xacc=glchartsub.xacc) as xaccdesc","xaccsub","xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchartsub", $fields, $where, " order by xacc, xaccsub", $limit);
	}
	public function getGlchartcrByLimit($limit=""){
		$fields = array("xacc as xacccr", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xaccusage in ('Cash', 'Bank') and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacccr desc", $limit);
	}
	
	public function getGlchartcrByLimit2($limit=""){
		$fields = array("xacc as xacccr", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xacctype= 'Asset' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacccr desc", $limit);
	}
	
	public function getGlchartexpByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xacctype = 'Expenditure' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	
	public function getGlchartincByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";// and xacctype = 'Income'	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	
	public function getPurchaseList(){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xponum","xsup","(select xorg from sesup where sesup.bizid=pomst.bizid and sesup.xsup=pomst.xsup) as xsupname","xsupdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='Confirmed' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}




	//For Data Table ------
	
	public function getSalesListTest($status, $index, $srow, $search=""){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "(xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid').") AND (xsonum like '%".$search."%' OR xcus like '%".$search."%' OR date_format(xdate, '%d-%m-%Y') like '%%".$search."%')" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("sofreemst", $fields, $where, " LIMIT ".$index.", ".$srow);
	}
	public function getCount($status, $search=""){
		$fields = array("count(sosl) as count");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "(xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid').") AND (xsonum like '%".$search."%' OR xcus like '%".$search."%' OR date_format(xdate, '%d-%m-%Y') like '%%".$search."%')" ;
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("sofreemst", $fields, $where);
	}

}