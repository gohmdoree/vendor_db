<?php
// v. 0.0001
// a. charles yoo
//
// todo: 1. add product, select product list
//       2. search functionality
//	 3. javascript error correction
//
//
//

include ("../../includes/vendors/lib.php");
include ("../../includes/vendors/lib_queries.php");
include ("../../includes/vendors/lib_forms.php");
include ("../../includes/vendors/lib_results_contacts.php");
include ("../../includes/vendors/lib_results_vendors.php");
include ("../../includes/vendors/lib_results_products.php");
include ("../../includes/vendors/lib_format.php");
include ("../../includes/vendors/config_vendors.php");

dbConnect();

include ("includes/header.php");
include ("includes/menu_default.php");

if (isset($_GET['action'])){
	// #####################################
	// ### ADD VENDORS ###
	// ###
	if ($_GET['action'] == "add_vendor"){
		addVendorForm();
	// #####################################
	// ### LIST VENDORS ###
	// ###
	}else if ($_GET['action'] == "list_vendor"){
		listVendors(0);
	// #####################################
	// ### LIST VENDORS ###
	// ###
	}else if ($_GET['action'] == "list_vendor_domestic"){
		listVendors(1);
	// #####################################
	// ### LIST VENDORS ###
	// ###
	}else if ($_GET['action'] == "list_vendor_international"){
		listVendors(2);
	// #####################################
	// ### LIST VENDORS ###
	// ###
	}else if ($_GET['action'] == "list_vendor_open"){
		listVendors(3);
	// #####################################
	// ### LIST VENDORS ###
	// ###
	}else if ($_GET['action'] == "list_vendor_closed"){
		listVendors(4);
	// #####################################
	// ### VIEW VENDORS COMMENTS ###
	// ###
	}else if ($_GET['action'] == "view_vendor_comments"){
		$v_id = $_GET['vendor_id'];

		showAllVendorComments($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### VIEW VENDORS ###
	// ###
	}else if ($_GET['action'] == "view_vendor"){
		$v_id = $_GET['vendor_id'];

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### VIEW VENDORS ###
	// ###
	}else if ($_GET['action'] == "view_vendor_and_product"){
		$v_id = $_GET['vendor_id'];

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### VIEW VENDORS PRODUCTS COLORS ###
	// ###
	}else if ($_GET['action'] == "view_vendor_products_colors"){
		$v_id = $_GET['v_id'];
		$vendorproducts_no = $_GET['vendorproducts_no'];

		viewVendorProductsColors($vendorproducts_no, $v_id);

		include ("includes/menu_products.php");
	// #####################################
	// ### LIST ALL VENDORS ###
	// ###
	}else if ($_GET['action'] == "view_all_vendors"){

		viewAllVendors();

	// #####################################
	// ### LIST VENDOR CONTACT ###
	// ###
	}else if ($_GET['action'] == "list_vendor_contact"){
		$v_id = $_GET['vendor_id'];

		listVendorContacts($v_id, 0);

	// #####################################
	// ### Add Vendor Product
	// ###
	}else if ($_GET['action'] == "add_vendor_product"){
		$v_id = $_GET['vendor_id'];

		addVendorProductForm($v_id);

	// #####################################
	// ### Add Vendor Products
	// ###
	}else if ($_GET['action'] == "add_vendor_products"){
		$v_id = $_GET['vendor_id'];

		addVendorProductsForm($v_id);

	// #####################################
	// ### Add Vendor Products Colors
	// ###
	}else if ($_GET['action'] == "add_vendor_products_colors"){
		$vendorproducts_no = $_GET['vendorproducts_no'];
		$v_id = $_GET['v_id'];

		addVendorProductsColorsForm($vendorproducts_no, $v_id);

	// #####################################
	// ### Add Vendor Comments
	// ###
	}else if ($_GET['action'] == "add_vendor_comments"){
		$v_id = $_GET['vendor_id'];

		addVendorCommentsForm($v_id);

	// #####################################
	// ### VIEW CONTACT ###
	// ###
	}else if ($_GET['action'] == "view_contact"){
		$c_id = $_GET['contact_id'];
		$v_id = $_GET['vendor_id'];

		viewContact($c_id, $v_id);

		include ("includes/menu_contact.php");
	// #####################################
	// ### ADD VENDOR ACCOUNT ###
	// ###
	}else if ($_GET['action'] == "add_vendor_account"){
		$v_id = $_GET['vendor_id'];

		addVendorAccountForm($v_id);

	// #####################################
	// ### ADD VENDOR ADDRESS ###
	// ###
	}else if ($_GET['action'] == "add_vendor_address"){
		$v_id = $_GET['vendor_id'];

		addVendorAddressForm($v_id);

	// #####################################
	// ### ADD VENDOR PHONE ###
	// ###
	}else if ($_GET['action'] == "add_vendor_phone"){
		$v_id = $_GET['vendor_id'];
		$vc_id = $_GET['country_id'];

		addVendorPhoneForm($v_id);

	// #####################################
	// ### ADD VENDOR EMAIL ###
	// ###
	}else if ($_GET['action'] == "add_vendor_email"){
		$v_id = $_GET['vendor_id'];

		addVendorEmailForm($v_id);

	// #####################################
	// ### ADD VENDOR URL ###
	// ###
	}else if ($_GET['action'] == "add_vendor_url"){
		$v_id = $_GET['vendor_id'];

		addVendorURLForm($v_id);

	// #####################################
	// ### CHANGE VENDOR STATUS ###
	// ###
	}else if ($_GET['action'] == "change_vendor_status"){
		$v_id = $_GET['vendor_id'];

		changeVendorStatusForm($v_id);

	// #####################################
	// ### ADD VENDOR CONTACT ###
	// ###
	}else if ($_GET['action'] == "add_vendor_contact"){
		$v_id = $_GET['vendor_id'];

		addVendorContactForm($v_id);

	// #####################################
	// ### ADD CONTACT PHONE ###
	// ###
	}else if ($_GET['action'] == "add_contact_phone"){
		$c_id = $_GET['contact_id'];
		$v_id = $_GET['vendor_id'];

		addContactPhoneForm($c_id, $v_id);

	// #####################################
	// ### ADD CONTACT EMAIL ###
	// ###
	}else if ($_GET['action'] == "add_contact_email"){
		$c_id = $_GET['contact_id'];
		$v_id = $_GET['vendor_id'];

		addContactEmailForm($c_id, $v_id);

	// #####################################
	// ### DELETE VENDOR PRODUCT ###
	// ###
	}else if ($_GET['action'] == "delete_vendor_product"){
		$v_id = $_GET['vendor_id'];
		$pr_id = $_GET['product_id'];

		deleteVendorProduct($v_id, $pr_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### DELETE VENDOR CONTACT ###
	// ###
	}else if ($_GET['action'] == "delete_vendor_contact"){
		$v_id = $_GET['vendor_id'];
		$c_id = $_GET['contact_id'];

		deleteVendorContact($v_id, $c_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### EDIT VENDOR ACCOUNT ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_account"){
		$v_id = $_GET['vendor_id'];

		editVendorAccountForm($v_id);

	// #####################################
	// ### EDIT VENDOR NAME ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_name"){
		$v_id = $_GET['vendor_id'];

		editVendorNameForm($v_id);

	// #####################################
	// ### EDIT VENDOR ADDRESS ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_address"){
		$v_id = $_GET['vendor_id'];

		editVendorAddressForm($v_id);
	// #####################################
	// ### EDIT VENDOR PHONE ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_phone"){
		$vp_id = $_GET['vendorphone_id'];
		$v_id = $_GET['vendor_id'];

		editVendorPhoneForm($vp_id, $v_id);
	// #####################################
	// ### EDIT VENDOR EMAIL ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_email"){
		$ve_id = $_GET['vendoremail_id'];
		$v_id = $_GET['vendor_id'];

		editVendorEmailForm($ve_id, $v_id);
	// #####################################
	// ### EDIT VENDOR URL ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_url"){
		$vu_id = $_GET['vendorurl_id'];
		$v_id = $_GET['vendor_id'];

		editVendorURLForm($vu_id, $v_id);
	// #####################################
	// ### EDIT VENDOR COMMENT ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_comments"){
		$vc_id = $_GET['vendorcomment_id'];
		$v_id = $_GET['vendor_id'];

		editVendorCommentsForm($vc_id, $v_id);
	// #####################################
	// ### EDIT VENDOR PRODUCT ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_product"){
		$vpr_id = $_GET['vendorproduct_id'];
		$v_id = $_GET['vendor_id'];

		editVendorProductForm($vpr_id, $v_id);
	// #####################################
	// ### EDIT VENDOR CONTACT ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_contact"){
		$c_id = $_GET['contact_id'];
		$v_id = $_GET['vendor_id'];

		editVendorContactForm($c_id, $v_id);
	// #####################################
	// ### EDIT VENDOR CONTACT PHONE ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_contact_phone"){
		$c_id = $_GET['contact_id'];
		$cp_id = $_GET['contact_phone_id'];
		$v_id = $_GET['vendor_id'];

		editVendorContactPhoneForm($c_id, $cp_id, $v_id);
	// #####################################
	// ### EDIT VENDOR CONTACT EMAIL ###
	// ###
	}else if ($_GET['action'] == "edit_vendor_contact_email"){
		$c_id = $_GET['contact_id'];
		$ce_id = $_GET['contact_email_id'];
		$v_id = $_GET['vendor_id'];

		editVendorContactEmailForm($c_id, $ce_id, $v_id);
	}
}else if (isset($_POST['submit'])){
	// #####################################
	// ### ADD VENDOR ###
	// ###
	if ($_POST['submit'] == "Add Vendor"){
		$v_name = $_POST['v_name'];
		$v_dba = $_POST['v_dba'];
		$v_street0 = $_POST['v_street0'];
		$v_street1 = $_POST['v_street1'];
		$v_street2 = $_POST['v_street2'];
		$v_city = $_POST['v_city'];
		$v_state = $_POST['v_state'];
		$v_province = $_POST['v_province'];
		$v_postal = $_POST['v_postal'];
		//	$vc_name = $_POST['v_country'];
		$vc_id = $_POST['vc_id'];

		// Remnants of prior code.  Consolidated vendor_country into country_code, may rename to something else later
		//	if ($vc_name){
		//		$query0 = "insert into vendor_country (vc_name) values ('" . $vc_name . "');";
		//		$result0 = mysql_query($query0) or die ("There was an error inserting the new vendor country: " . mysql_error());
		//		$vc_id = mysql_insert_id();
		//	}

		$v_id = addVendor($v_name, $v_dba, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR ADDRESS ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Address"){
		$v_id = $_POST['v_id'];
		$v_street0 = $_POST['v_street0'];
		$v_street1 = $_POST['v_street1'];
		$v_street2 = $_POST['v_street2'];
		$v_city = $_POST['v_city'];
		$v_state = $_POST['v_state'];
		$v_province = $_POST['v_province'];
		$v_postal = $_POST['v_postal'];
		$vc_id = $_POST['vc_id'];

		addVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR ACCOUNT ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Account"){
		$v_id = $_POST['v_id'];
		$v_account = $_POST['v_account'];

		addVendorAccount($v_id, $v_account);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR PHONE ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Phone"){
		$v_id = $_POST['v_id'];
		$vc_id = $_POST['vc_id'];
		$v_phone_num = $_POST['v_phone_num'];
		$v_phone_ext = $_POST['v_phone_ext'];
		$p_id = $_POST['p_id'];

		addVendorPhone($v_id, $vc_id, $v_phone_num, $v_phone_ext, $p_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR EMAIL ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Email"){
		$v_id = $_POST['v_id'];
		$v_email = $_POST['v_email'];
		$e_id = $_POST['e_id'];

		addVendorEmail($v_id, $v_email, $e_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR URL ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor URL"){
		$v_id = $_POST['v_id'];
		$v_url = $_POST['v_url'];

		addVendorURL($v_id, $v_url);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### CHANGE VENDOR STATUS ###
	// ###
	}else if ($_POST['submit'] == "Change Vendor Status"){
		$v_id = $_POST['v_id'];
		$vs_id = $_POST['vs_id'];

		changeVendorStatus($v_id, $vs_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR PRODUCT ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Product"){
		$v_id = $_POST['v_id'];
		$pr_id = $_POST['pr_id'];
		$pr_type = $_POST['pr_type'];
		$pr_cost = $_POST['pr_cost'];
		$pr_minimum = $_POST['pr_minimum'];

		addVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR PRODUCTS ###
	// ### Information from the vendor
	// ### color cards
	// ###
	}else if ($_POST['submit'] == "Add Vendor Products"){
		$v_id = $_POST['v_id'];
		$vendorproducts_no = $_POST['vendorproducts_no'];
		$vendorproducts_name = $_POST['vendorproducts_name'];
		$products_width_no = $_POST['products_width_no'];
		$products_width_name = $_POST['products_width_name'];
		$products_content_no = $_POST['products_content_no'];
		$products_content_name = $_POST['products_content_name'];
		$products_country_no = $_POST['products_country_no'];
		$products_country_name = $_POST['products_country_name'];

		if (!vendorProductsNoExists($vendorproducts_no)){
			// *name fields that are not blank, will ignore *no fields
			if (isset($products_width_name)){
				if (!productsWidthExists($products_width_name)){
					$products_width_no = addProductsWidth($products_width_name);
				}else{
					// #####################
					// ### should say exists
					$products_width_no = getProductsWidthNo($products_width_name);
				}
			}else if (isset($products_width_no)){
				// ################
				// ### means products_width_no exists
			}else{
				$products_width_no = "";
			}
	
			if (isset($products_content_name)){
				if (!productsContentExists($products_content_name)){
					$products_content_no = addProductsContent($products_content_name);
				}else{
					// #####################
					// ### should say exists
					$products_content_no = getProductsContentNo($products_content_no);
				}
			}else if (isset($products_content_no)){
				// ################
				// ### means products_content_no exists
			}else{
				$products_content_no = "";
			}
	
			if (isset($products_country_name)){
				if (!productsCountryExists($products_country_name)){
					$products_country_no = addProductsCountry($products_country_name);
				}else{
					// #####################
						// ### should say exists
					$products_country_no = getProductsCountryNo($products_country_name);
				}
			}else if (isset($products_country_no)){
				// ################
				// ### means products_country_no exists
			}else{
				$products_country_no = "";
			}
	
			addVendorProducts($vendorproducts_no, $vendorproducts_name, $v_id, $products_width_no, $products_content_no, $products_country_no);

			viewVendor($v_id);

			include ("includes/menu_vendor.php");
		}else{
			echo "Vendor Products No Exists.";
			lineBreak();

			viewVendor($v_id);

			include ("includes/menu_vendor.php");
		}
	// #####################################
	// ### ADD VENDOR PRODUCTS COLORS ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Products Colors"){
		$v_id = $_POST['v_id'];
		$vendorproducts_no = $_POST['vendorproducts_no'];
		$color_no = $_POST['color_no'];
		$color_name = $_POST['color_name'];

		addVendorProductsColors($vendorproducts_no, $color_no, $color_name);

		viewVendorProductsColors($vendorproducts_no, $v_id);

		include ("includes/menu_products.php");
	// #####################################
	// ### ADD VENDOR COMMENTS ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Comments"){
		$v_id = $_POST['v_id'];
		$v_comments = $_POST['v_comments'];

		addVendorComments($v_id, $v_comments);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### ADD VENDOR CONTACT ###
	// ###
	}else if ($_POST['submit'] == "Add Vendor Contact"){
		$v_id = $_POST['v_id'];
		$c_first = $_POST['c_first'];
		$c_last = $_POST['c_last'];
		$ct_id = $_POST['ct_id'];

		$c_id = addVendorContact($v_id, $c_first, $c_last, $ct_id);

		viewContact($c_id, $v_id);

		include ("includes/menu_contact.php");
	// #####################################
	// ### ADD CONTACT PHONE ###
	// ###
	}else if ($_POST['submit'] == "Add Contact Phone"){
		$c_id = $_POST['c_id'];
		$v_id = $_POST['v_id'];
		$vc_id = $_POST['vc_id'];
		$c_phone_num = $_POST['c_phone_num'];
		$c_phone_ext = $_POST['c_phone_ext'];
		$p_id = $_POST['p_id'];

		addContactPhone($c_id, $vc_id, $c_phone_num, $c_phone_ext, $p_id);

		viewContact($c_id, $v_id);

		include ("includes/menu_contact.php");
	// #####################################
	// ### ADD CONTACT EMAIL ###
	// ###
	}else if ($_POST['submit'] == "Add Contact Email"){
		$c_id = $_POST['c_id'];
		$v_id = $_POST['v_id'];
		$c_email = $_POST['c_email'];
		$e_id = $_POST['e_id'];

		addContactEmail($c_id, $c_email, $e_id);

		viewContact($c_id, $v_id);

		include ("includes/menu_contact.php");
	// #####################################
	// ### UPDATE VENDOR ACCOUNT ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Account"){
		$v_id = $_POST['v_id'];
		$v_account = $_POST['v_account'];

		editVendorAccount($v_id, $v_account);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### update vendor name ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Name"){
		$v_id = $_POST['v_id'];
		$v_name = $_POST['v_name'];
		$v_dba = $_POST['v_dba'];

		editVendorName($v_id, $v_name, $v_dba);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR ADDRESS ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Address"){
		$v_id = $_POST['v_id'];
		$v_street0 = $_POST['v_street0'];
		$v_street1 = $_POST['v_street1'];
		$v_street2 = $_POST['v_street2'];
		$v_city = $_POST['v_city'];
		$v_state = $_POST['v_state'];
		$v_province = $_POST['v_province'];
		$v_postal = $_POST['v_postal'];
		$vc_id = $_POST['vc_id'];

		editVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR PHONE ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Phone"){
		$vp_id = $_POST['vp_id'];
		$v_id = $_POST['v_id'];
		$v_phone_num = $_POST['v_phone_num'];
		$v_phone_ext = $_POST['v_phone_ext'];
		$p_id = $_POST['p_id'];
		$vc_id = $_POST['vc_id'];

		editVendorPhone($vp_id, $v_phone_num, $v_phone_ext, $p_id, $vc_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR EMAIL ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Email"){
		$ve_id = $_POST['ve_id'];
		$v_id = $_POST['v_id'];
		$v_email = $_POST['v_email'];
		$e_id = $_POST['e_id'];

		editVendorEmail($ve_id, $v_email, $e_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR URL ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor URL"){
		$vu_id = $_POST['vu_id'];
		$v_id = $_POST['v_id'];
		$v_url = $_POST['v_url'];

		editVendorURL($vu_id, $v_url);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR COMMENTS ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Comments"){
		$vendorcomment_id = $_POST['vendorcomment_id'];
		$v_id = $_POST['v_id'];
		$v_comments = $_POST['v_comments'];

		editVendorComments($vendorcomment_id, $v_comments);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR CONTACT ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Contact"){
		$c_id = $_POST['c_id'];
		$v_id = $_POST['v_id'];
		$c_first = $_POST['c_first'];
		$c_last = $_POST['c_last'];
		$ct_id = $_POST['ct_id'];

		editVendorContact($c_id, $c_first, $c_last, $ct_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR CONTACT PHONE ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Contact Phone"){
		$c_id = $_POST['c_id'];
		$v_id = $_POST['v_id'];
		$cp_id = $_POST['cp_id'];
		$c_phone_num = $_POST['c_phone_num'];
		$c_phone_ext = $_POST['c_phone_ext'];
		$p_id = $_POST['p_id'];
		$vc_id = $_POST['vc_id'];

		editVendorContactPhone($cp_id, $c_id, $c_phone_num, $c_phone_ext, $p_id, $vc_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	// #####################################
	// ### UPDATE VENDOR CONTACT EMAIL ###
	// ###
	}else if ($_POST['submit'] == "Update Vendor Contact Email"){
		$c_id = $_POST['c_id'];
		$v_id = $_POST['v_id'];
		$ce_id = $_POST['ce_id'];
		$c_email = $_POST['c_email'];
		$e_id = $_POST['e_id'];

		editVendorContactEmail($ce_id, $c_id, $c_email, $e_id);

		viewVendor($v_id);

		include ("includes/menu_vendor.php");
	}
// #####################################
// ### DEFAULT ###
// ###
}else{
}
include ("includes/footer.php");
?>
