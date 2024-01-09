<?php
class Role extends Controller{
	public $menus=array();
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
		// session menu management
		$usersessionmenu = 	Session::get('mainmenus');
		
		$iscode=0;
		foreach($usersessionmenu as $menus){
				if($menus["xsubmenu"]=="Role Management")
					$iscode=1;							
		}
		if($iscode==0)	
			header('location: '.URL.'mainmenu');
		// session menu management ENDS
		
			$this->menus=array(					
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"1",
					"submenu"=>"Item Category",
					"url"=>"code/index/Item Category",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"2",
					"submenu"=>"Project",
					"url"=>"code/index/Project",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"3",
					"submenu"=>"GL Prefix",
					"url"=>"code/index/GL Prefix",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"4",
					"submenu"=>"Color",
					"url"=>"code/index/Color",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"5",
					"submenu"=>"BOM Cost Head",
					"url"=>"code/index/BOM Cost Head",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"6",
					"submenu"=>"Currency",
					"url"=>"code/index/Currency",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"7",
					"submenu"=>"PO Cost Head",
					"url"=>"code/index/PO Cost Head",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"8",
					"submenu"=>"Item Size",
					"url"=>"code/index/Item Size",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"9",
					"submenu"=>"Item Prefix",
					"url"=>"code/index/Item Prefix",
					"menutype"=>"Main Menu"
				),
				// array(
				// "menuindex"=>"1",
				// 	"menu"=>"General Settings",
				// 	"submenuindex"=>"10",
				// 	"submenu"=>"School",
				// 	"url"=>"code/index/School",
				// 	"menutype"=>"Main Menu"
				// ),
				// array(
				// "menuindex"=>"1",
				// 	"menu"=>"General Settings",
				// 	"submenuindex"=>"11",
				// 	"submenu"=>"Class",
				// 	"url"=>"code/index/Class",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"10",
					"submenu"=>"Supplier Prefix",
					"url"=>"code/index/Supplier Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"11",
					"submenu"=>"Customer Prefix",
					"url"=>"code/index/Customer Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"12",
					"submenu"=>"Item Brand",
					"url"=>"code/index/Item Brand",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"13",
					"submenu"=>"Bank",
					"url"=>"code/index/Bank",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"14",
					"submenu"=>"UOM",
					"url"=>"code/index/UOM",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"15",
					"submenu"=>"IM Receive Prefix",
					"url"=>"code/index/IM Receive Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"16",
					"submenu"=>"IM Transfer Prefix",
					"url"=>"code/index/IM Transfer Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"17",
					"submenu"=>"Purchase Prefix",
					"url"=>"code/index/Purchase Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"18",
					"submenu"=>"Sales Prefix",
					"url"=>"code/index/Sales Prefix",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"19",
					"submenu"=>"Warehouse",
					"url"=>"code/index/Warehouse",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"20",
					"submenu"=>"Branch",
					"url"=>"code/index/Branch",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"21",
					"submenu"=>"Customer Group",
					"url"=>"code/index/Customer Group",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"22",
					"submenu"=>"Item Group",
					"url"=>"code/index/Item Group",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"23",
					"submenu"=>"Bill Category",
					"url"=>"code/index/Bill Category",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"24",
					"submenu"=>"Purpose",
					"url"=>"code/index/Purpose",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"24",
					"submenu"=>"Divition",
					"url"=>"code/index/Division",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"25",
					"submenu"=>"District",
					"url"=>"code/index/District",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"26",
					"submenu"=>"Approval Level",
					"url"=>"code/index/Approval Level",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"27",
					"submenu"=>"Approval Status",
					"url"=>"code/index/Approval Status",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"28",
					"submenu"=>"Module",
					"url"=>"code/index/Module",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"29",
					"submenu"=>"Flat Level",
					"url"=>"code/index/Flat Level",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"30",
					"submenu"=>"Flat Type",
					"url"=>"code/index/Flat Type",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"31",
					"submenu"=>"Bill or TADA",
					"url"=>"code/index/Bill or TADA",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"32",
					"submenu"=>"Occupation",
					"url"=>"code/index/Occupation",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"1",
					"menu"=>"General Settings",
					"submenuindex"=>"33",
					"submenu"=>"Academic Year",
					"url"=>"code/index/Academic Year",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"1",
					"submenu"=>"Item Database",
					"url"=>"items",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"2",
				// 	"menu"=>"Core Settings",
				// 	"submenuindex"=>"2",
				// 	"submenu"=>"School wise Item Mapping",
				// 	"url"=>"itemscmap",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"2",
					"submenu"=>"Customer Database",
					"url"=>"customers",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"3",
					"submenu"=>"Supplier Database",
					"url"=>"suppliers",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"7",
					"submenu"=>"Work Order",
					"url"=>"workorder",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"8",
					"submenu"=>"Work Order Revise",
					"url"=>"worevise",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"9",
					"submenu"=>"Flat Entry",
					"url"=>"plats",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"10",
					"submenu"=>"Agent Entry",
					"url"=>"agent",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"2",
				// 	"menu"=>"Core Settings",
				// 	"submenuindex"=>"4",
				// 	"submenu"=>"Tax Setup",
				// 	"url"=>"taxcode",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"2",
					"menu"=>"Core Settings",
					"submenuindex"=>"5",
					"submenu"=>"Business Page",
					"url"=>"bizdef",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"1",
					"submenu"=>"Store Purchase Requisition",
					"url"=>"distreq",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"1",
					"submenu"=>"General Store Purchase Req.",
					"url"=>"distreqgen",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"2",
					"submenu"=>"Local Purchase Order",
					"url"=>"purchase",
					"menutype"=>"Main Menu"
				),array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"3",
					"submenu"=>"International Purchase Order",
					"url"=>"purchaseint",
					"menutype"=>"Main Menu"
				),array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"4",
					"submenu"=>"Additional Purchase Cost",
					"url"=>"purchasecost",
					"menutype"=>"Main Menu"
				),array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"5",
					"submenu"=>"Goods Receipt Note",
					"url"=>"purchasegrn",
					"menutype"=>"Main Menu"
				),array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"6",
					"submenu"=>"Purchase Return",
					"url"=>"purchasereturn",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"7",
					"submenu"=>"Purchase Reports",
					"url"=>"porpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"3",
					"menu"=>"Purchase",
					"submenuindex"=>"8",
					"submenu"=>"Purchase Requisition Reports",
					"url"=>"preqrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"4",
					"menu"=>"Sales",
					"submenuindex"=>"1",
					"submenu"=>"Sales Quotation",
					"url"=>"salesquot",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"4",
					"menu"=>"Sales",
					"submenuindex"=>"2",
					"submenu"=>"Sales Order",
					"url"=>"sales",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"4",
					"menu"=>"Sales",
					"submenuindex"=>"3",
					"submenu"=>"Delivery Order",
					"url"=>"imreqdo",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"4",
					"menu"=>"Sales",
					"submenuindex"=>"4",
					"submenu"=>"Delivery Return",
					"url"=>"imreturn",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"4",
				// 	"menu"=>"Sales",
				// 	"submenuindex"=>"5",
				// 	"submenu"=>"Employee Movement Map",
				// 	"url"=>"movementmap",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"4",
					"menu"=>"Sales",
					"submenuindex"=>"6",
					"submenu"=>"Sales Reports",
					"url"=>"sorpt",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"4",
				// 	"menu"=>"Sales",
				// 	"submenuindex"=>"7",
				// 	"submenu"=>"Sales Order",
				// 	"url"=>"schoolsales",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"5",
					"menu"=>"Specimen",
					"submenuindex"=>"8",
					"submenu"=>"Specimen Entry",
					"url"=>"issuefree",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"5",
					"menu"=>"Specimen",
					"submenuindex"=>"9",
					"submenu"=>"Specimen Reports",
					"url"=>"issuefreerpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"5",
					"menu"=>"Reject",
					"submenuindex"=>"8",
					"submenu"=>"Reject Entry",
					"url"=>"reject",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"5",
					"menu"=>"Reject",
					"submenuindex"=>"9",
					"submenu"=>"Reject Reports",
					"url"=>"rejectrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"6",
					"menu"=>"Book List & Forma",
					"submenuindex"=>"1",
					"submenu"=>"Book List",
					"url"=>"booklist",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"6",
					"menu"=>"Book List & Forma",
					"submenuindex"=>"2",
					"submenu"=>"Forma & Cover Print",
					"url"=>"forma",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"6",
					"menu"=>"Inventory",
					"submenuindex"=>"3",
					"submenu"=>"Invoice",
					"url"=>"diststocktransfer",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"6",
					"menu"=>"Inventory",
					"submenuindex"=>"4",
					"submenu"=>"Stock Status",
					"url"=>"imstock",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"6",
					"menu"=>"Inventory",
					"submenuindex"=>"5",
					"submenu"=>"Inventory Reports",
					"url"=>"imrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"7",
					"menu"=>"Installment",
					"submenuindex"=>"1",
					"submenu"=>"Installment Schedule",
					"url"=>"installment",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"7",
					"menu"=>"Installment",
					"submenuindex"=>"2",
					"submenu"=>"Installment Collection",
					"url"=>"installmentcollection",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"7",
					"menu"=>"Installment",
					"submenuindex"=>"3",
					"submenu"=>"Installment Reports",
					"url"=>"installmentreport",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"7",
				// 	"menu"=>"Installment",
				// 	"submenuindex"=>"4",
				// 	"submenu"=>"Commission Paid",
				// 	"url"=>"commissionpaid",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
				"menuindex"=>"8",
					"menu"=>"GL Settings",
					"submenuindex"=>"1",
					"submenu"=>"Acc Level1",
					"url"=>"code/index/Acc Level1",
					"menutype"=>"Main Menu"
				),array(
				"menuindex"=>"8",
					"menu"=>"GL Settings",
					"submenuindex"=>"2",
					"submenu"=>"Acc Level2",
					"url"=>"code/index/Acc Level2",
					"menutype"=>"Main Menu"
				),array(
				"menuindex"=>"8",
					"menu"=>"GL Settings",
					"submenuindex"=>"3",
					"submenu"=>"Acc Level3",
					"url"=>"code/index/Acc Level3",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"8",
					"menu"=>"GL Settings",
					"submenuindex"=>"4",
					"submenu"=>"Chart Of Accounts",
					"url"=>"glchart",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"8",
					"menu"=>"GL Settings",
					"submenuindex"=>"5",
					"submenu"=>"Sub Account",
					"url"=>"glchartsub",
					"menutype"=>"Main Menu"
				),array(
					"menuindex"=>"9",
					"menu"=>"GL Interface",
					"submenuindex"=>"1",
					"submenu"=>"GL Sales Interface",
					"url"=>"glinterface/index/GL Sales Interface",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"9",
					"menu"=>"GL Interface",
					"submenuindex"=>"2",
					"submenu"=>"GL GRN Interface",
					"url"=>"glinterface/index/GL GRN Interface",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"9",
					"menu"=>"GL Interface",
					"submenuindex"=>"3",
					"submenu"=>"GL DO Interface",
					"url"=>"glinterface/index/GL DO Interface",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"9",
					"menu"=>"GL Interface",
					"submenuindex"=>"4",
					"submenu"=>"DO Return Interface",
					"url"=>"glinterface/index/DO Return Interface",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"9",
					"menu"=>"GL Interface",
					"submenuindex"=>"5",
					"submenu"=>"PO Return Interface",
					"url"=>"glinterface/index/PO Return Interface",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"1",
					"submenu"=>"Opening Balance",
					"url"=>"glopening",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"2",
					"submenu"=>"Journal Voucher",
					"url"=>"gljvvou",
					"menutype"=>"Main Menu"
				),
				array(
				"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"3",
					"submenu"=>"JV Single Entry",
					"url"=>"gljvsingle",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"3",
					"submenu"=>"Debit Voucher",
					"url"=>"glpayvou",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"4",
					"submenu"=>"Credit Voucher",
					"url"=>"glrcptvou",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"10",
				// 	"menu"=>"Gneneral Ledger",
				// 	"submenuindex"=>"3",
				// 	"submenu"=>"Payment Voucher",
				// 	"url"=>"glpayvou",
				// 	"menutype"=>"Main Menu"
				// ),
				// array(
				// 	"menuindex"=>"10",
				// 	"menu"=>"Gneneral Ledger",
				// 	"submenuindex"=>"4",
				// 	"submenu"=>"Receipt Voucher",
				// 	"url"=>"glrcptvou",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"6",
					"submenu"=>"Trade Payment",
					"url"=>"glrpayvoutrade",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"7",
					"submenu"=>"Trade Receipt",
					"url"=>"glrcptvoutrade",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"8",
					"submenu"=>"Cheque Register",
					"url"=>"glchequeregister",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"9",
					"submenu"=>"GL Reports",
					"url"=>"glrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"10",
					"submenu"=>"Approved Bill & TA/DA List",
					"url"=>"billandtada",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"10",
					"menu"=>"Gneneral Ledger",
					"submenuindex"=>"11",
					"submenu"=>"Approved Payments",
					"url"=>"payments",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"1",
					"submenu"=>"Bill Submit",
					"url"=>"submitbill",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"1",
					"submenu"=>"Supplier Payment",
					"url"=>"supplierpay",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"1",
					"submenu"=>"Work Order Payment",
					"url"=>"wopay",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"2",
					"submenu"=>"TA/DA Submit",
					"url"=>"submittada",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"3",
					"submenu"=>"Bill Reports",
					"url"=>"billrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"11",
					"menu"=>"Bill & TA/DA",
					"submenuindex"=>"4",
					"submenu"=>"TA/DA Reports",
					"url"=>"tadarpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"12",
					"menu"=>"Bill & TA/DA Reports",
					"submenuindex"=>"1",
					"submenu"=>"All Bill Reports",
					"url"=>"allbillrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"12",
					"menu"=>"Bill & TA/DA Reports",
					"submenuindex"=>"2",
					"submenu"=>"All TA/DA Reports",
					"url"=>"alltadarpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"12",
					"menu"=>"Bill & TA/DA Reports",
					"submenuindex"=>"3",
					"submenu"=>"All Bill",
					"url"=>"allbill",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"12",
					"menu"=>"Bill & TA/DA Reports",
					"submenuindex"=>"4",
					"submenu"=>"All TA/DA",
					"url"=>"alltada",
					"menutype"=>"Main Menu"
				),
				// array(
				// 	"menuindex"=>"12",
				// 	"menu"=>"Manufacturing",
				// 	"submenuindex"=>"1",
				// 	"submenu"=>"Bill Of Material",
				// 	"url"=>"pmbom",
				// 	"menutype"=>"Main Menu"
				// ),
				// array(
				// 	"menuindex"=>"12",
				// 	"menu"=>"Manufacturing",
				// 	"submenuindex"=>"2",
				// 	"submenu"=>"BOM Additional Cost",
				// 	"url"=>"pmbomcost",
				// 	"menutype"=>"Main Menu"
				// ),
				// array(
				// 	"menuindex"=>"12",
				// 	"menu"=>"Manufacturing",
				// 	"submenuindex"=>"3",
				// 	"submenu"=>"Finished Goods Receive",
				// 	"url"=>"pmfgr",
				// 	"menutype"=>"Main Menu"
				// ),
				array(
					"menuindex"=>"13",
					"menu"=>"Store",
					"submenuindex"=>"1",
					"submenu"=>"Store Requisition",
					"url"=>"imstorereq",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"13",
					"menu"=>"Store",
					"submenuindex"=>"2",
					"submenu"=>"General Store Requisition",
					"url"=>"imstorereqgen",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"13",
					"menu"=>"Store",
					"submenuindex"=>"3",
					"submenu"=>"Store Requisition Reports",
					"url"=>"sreqrpt",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"13",
					"menu"=>"Store",
					"submenuindex"=>"3",
					"submenu"=>"Store Delivery",
					"url"=>"imstoredo",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"14",
					"menu"=>"Approval/Check",
					"submenuindex"=>"1",
					"submenu"=>"Purchase Requisitions",
					"url"=>"impurapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"14",
					"menu"=>"Approval/Check",
					"submenuindex"=>"2",
					"submenu"=>"Store Requisitions",
					"url"=>"imstorereqapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"14",
					"menu"=>"Approval/Check",
					"submenuindex"=>"3",
					"submenu"=>"Bill",
					"url"=>"billapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"14",
					"menu"=>"Approval/Check",
					"submenuindex"=>"4",
					"submenu"=>"TA/DA",
					"url"=>"tadaapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"14",
					"menu"=>"Approval/Check",
					"submenuindex"=>"5",
					"submenu"=>"Voucher Approval",
					"url"=>"voucherapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Approval/Check",
					"submenuindex"=>"6",
					"submenu"=>"Supplier Payments",
					"url"=>"supayapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Approval/Check",
					"submenuindex"=>"7",
					"submenu"=>"Work Order Payments",
					"url"=>"wopayapproval",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"1",
					"submenu"=>"Employee Prefix",
					"url"=>"code/index/Employee Prefix",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"2",
					"submenu"=>"Designation",
					"url"=>"code/index/Designation",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"1",
					"submenu"=>"Employee Group",
					"url"=>"code/index/Employee Group",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"1",
					"submenu"=>"Nationality",
					"url"=>"code/index/Nationality",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"1",
					"submenu"=>"Religion",
					"url"=>"code/index/Religion",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"1",
					"submenu"=>"Shift",
					"url"=>"code/index/Shift",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"2",
					"submenu"=>"Add Employee",
					"url"=>"stuemployee",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"15",
					"menu"=>"Human Resource",
					"submenuindex"=>"3",
					"submenu"=>"Employee Duty Time",
					"url"=>"empdutytime",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"16",
					"menu"=>"Off Day & Holiday",
					"submenuindex"=>"1",
					"submenu"=>"Holiday Setup",
					"url"=>"holiday",
					"menutype"=>"Main Menu"
				),
				array(
			 		"menuindex"=>"16",
				   "menu"=>"Off Day & Holiday",
				   "submenuindex"=>"2",
				   "submenu"=>"Off Day",
				   "url"=>"code/index/Off Day",
				   "menutype"=>"Main Menu"
			   ), 
			   array(
					"menuindex"=>"17",
				   "menu"=>"Attendance",
				   "submenuindex"=>"1",
				   "submenu"=>"Employee Attendance",
				   "url"=>"stuatt",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"17",
				   "menu"=>"Attendance",
				   "submenuindex"=>"2",
				   "submenu"=>"Attendance Update",
				   "url"=>"stuattupdate",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"1",
				   "submenu"=>"Daily Attendance Report",
				   "url"=>"viewatt",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"2",
				   "submenu"=>"Employee Leave Report",
				   "url"=>"empsummary",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"3",
				   "submenu"=>"Monthly Attendance Report",
				   "url"=>"employeedeviceatt",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"4",
				   "submenu"=>"Daily Late Report",
				   "url"=>"dailylatereport",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"5",
				   "submenu"=>"Daily Present Report",
				   "url"=>"dailypresentreport",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"6",
				   "submenu"=>"Daily Absent Report",
				   "url"=>"dailyabsentreport",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"7",
				   "submenu"=>"Employee Late Report",
				   "url"=>"emplatereport",
				   "menutype"=>"Main Menu"
			   ),
			   array(
					"menuindex"=>"18",
				   "menu"=>"Attendance Report",
				   "submenuindex"=>"8",
				   "submenu"=>"Employee Present Report",
				   "url"=>"singlepresentreport",
				   "menutype"=>"Main Menu"
			   ),
			    array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"1",
					"submenu"=>"Lead Entry",
					"url"=>"lead",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"2",
					"submenu"=>"Oppertunity Entry",
					"url"=>"oppertunity",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"3",
					"submenu"=>"Interaction Entry",
					"url"=>"interaction",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"4",
					"submenu"=>"Work Progress",
					"url"=>"progress",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"5",
					"submenu"=>"Customer Satisfaction Assesment",
					"url"=>"cussatisfaction",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"6",
					"submenu"=>"Customer Complain",
					"url"=>"cuscomplain",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"7",
					"submenu"=>"Progress Type",
					"url"=>"code/index/Progress Type",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"8",
					"submenu"=>"Satisfaction Quality",
					"url"=>"code/index/Satisfaction Quality",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"9",
					"submenu"=>"Delivery Performance",
					"url"=>"code/index/Delivery Performance",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"10",
					"submenu"=>"Value of the Products",
					"url"=>"code/index/Value of the Products",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"11",
					"submenu"=>"Service and Care",
					"url"=>"code/index/Service and Care",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"19",
					"menu"=>"CRM",
					"submenuindex"=>"12",
					"submenu"=>"Lead Prefix",
					"url"=>"code/index/Lead Prefix",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"20",
					"menu"=>"User Roles",
					"submenuindex"=>"1",
					"submenu"=>"User Management",
					"url"=>"user",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"20",
					"menu"=>"User Roles",
					"submenuindex"=>"2",
					"submenu"=>"Role Management",
					"url"=>"role",
					"menutype"=>"Main Menu"
				),
				array(
					"menuindex"=>"20",
					"menu"=>"User Roles",
					"submenuindex"=>"3",
					"submenu"=>"Approval Management",
					"url"=>"approval",
					"menutype"=>"Main Menu"
				)
				
			);
		//add page related java scripts/jquery in array. Only rendered on this page load	
		$this->view->js = array('public/js/datatable.js','views/codes/js/codevalidator.js');
		}
		public function index(){
			
			$head=array("Menu Index","Menu","Submenu Index","Submenu","URL","Menu Type");
			$table = new Datatable();
			
			$fields = array("zrole-Roles");
			
			$rows=$this->model->getRoles();
			
			$this->view->roles = $table->myTable($fields,$rows,"zrole", URL."role/editrole/", URL."role/roledelete/");
			
			$this->view->tblmenus = $table->arrayTable($head, $this->menus, "Create Role", URL."role/create");
			$this->view->message = "";
			$this->view->rendermainmenu('role/index');	
			
			//print_r($menus);
			//die;
		}
		
		public function create(){
			$menupost=array();
			$this->view->message = "";
			$role=$_POST['zrole'];
			$cols="`bizid`,`zrole`,`xmenu`,`xmenuindex`,`xsubmenu`,`xurl`,`xmenutype`,`xsubmenuindex`";
			
			if(isset($_POST["checkbox"])){
				
				
			foreach ($_POST["checkbox"] as $checkitem){
				
				foreach($this->menus as $menuarr){
					if($checkitem==$menuarr["submenu"]){
						$menupost[]=$menuarr;
					}
				}
			}
			
			$str="";
			
				for($i=0; $i<count($menupost); $i++){
					$query_parts[] = "('" . Session::get('sbizid') . "','" . $role . "', '" . $menupost[$i]['menuindex'] . "','" . $menupost[$i]['menu'] . "', '" . $menupost[$i]['submenu'] . "', '" . $menupost[$i]['url'] . "', '" . $menupost[$i]['menutype'] . "', '" . $menupost[$i]['submenuindex'] . "'),";
					
				}
			
				foreach ($query_parts as $key=>$value){
					$str.=$value;
				}
				
				
				$form = new Form();
				$data = array();
				
				try{
				$form	->post('zrole')
						->val('minlength', 1)
						->val('maxlength', 50);
						
												
				$form	->submit();
				
				$data = $form->fetch();	
				
				$data['bizid'] = Session::get('sbizid');
								
				$success = $this->model->create($data,"pamenus",$cols,rtrim($str,','));
						
				
				}catch(Exception $e){
					
					$this->view->message = $e->getMessage();
					
				}
				
			}else{
				$this->view->message = "Please select menus bellow...";
			}
			
			//$this->editrole($role);
			$this->showRoleMenus();
		}
		
		public function showRoleMenus(){
			
			$table = new Datatable();
			
			$fields = array("zrole-Roles");
			
			$rows=$this->model->getRoles();
			
			$this->view->roles = $table->myTable($fields,$rows,"zrole", URL."role/editrole/", URL."role/roledelete/");
			
			$head=array("Menu Index","Menu","Submenu","Submenu","URL","Menu Type");
			
			
			$this->view->tblmenus = $table->arrayTable($head, $this->menus, "Create Role", URL."role/create");
			
			
			
			$this->view->rendermainmenu('role/index');	
		}
		
		public function editrole($role){
			
			$usermenus = $this->model->getUserMenus($role);
			
			$head=array("Menu Index","Menu","Submenu","Submenu","URL","Menu Type");
			$table = new Datatable();
			
			$fields = array("zrole-Roles");
			
			$rows=$this->model->getRoles();
			
			$this->view->roles = $table->myTable($fields,$rows,"zrole", URL."role/editrole/", URL."role/roledelete/");
			
			$this->view->tblmenus = $table->arrayTable($head, $this->menus,"Update Role", URL."role/edit/".$role,$role, $usermenus);
			$this->view->message = "";
			$this->view->roletoedit = $role;
			$this->view->rendermainmenu('role/index');	
						
		}
		
		public function edit($role=""){
			
			$menupost=array();
			$cols="`bizid`,`zrole`,`xmenuindex`,`xmenu`,`xsubmenu`,`xurl`,`xmenutype`,`xsubmenuindex`";
			
			if(isset($_POST["checkbox"]) && isset($_POST['zrole'])){
			foreach ($_POST["checkbox"] as $checkitem){
				
				foreach($this->menus as $menuarr){
					if($checkitem==$menuarr["submenu"]){
						$menupost[]=$menuarr;
					}
				}
			}
			$str="";
			
				for($i=0; $i<count($menupost); $i++){
					$query_parts[] = "('" . Session::get('sbizid') . "','" . $role . "', '" . $menupost[$i]['menuindex'] . "','" . $menupost[$i]['menu'] . "', '" . $menupost[$i]['submenu'] . "', '" . $menupost[$i]['url'] . "', '" . $menupost[$i]['menutype'] . "', '" . $menupost[$i]['submenuindex'] . "'),";
					
				}
			
				foreach ($query_parts as $key=>$value){
					$str.=$value;
				}
			$where = " where bizid=".Session::get('sbizid')." and zrole='".$role."'";	
			$editresult=$this->model->edit("pamenus",$cols,rtrim($str,','),$where);
			}
			$this->editrole($role);
		}
		
		public function roledelete($role){
			$where = "bizid=".Session::get('sbizid')." and zrole='".$role."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->showRoleMenus();
		}
			
}