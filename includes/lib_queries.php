<?php
// #####################################
// ### DELETE VENDOR PRODUCT ###
// ###
function queryDeleteVendorProduct($v_id, $pr_id){
	$query = "update vendor_product set vp_status = 1 where v_id = " . $v_id . " and pr_id = " . $pr_id . ";";

	return $query;
}

// #####################################
// ### DELETE VENDOR CONTACT ###
// ###
function queryDeleteVendorContact($v_id, $c_id){
	$query = "update vendor_contact set vc_status = 1 where v_id = " . $v_id . " and c_id = " . $c_id . ";";

	return $query;
}

// #####################################
// $flag
//	1 : Domestic
//	2 : International
//	3 : Open
//	4 : Closed
//	0 : Everything
// #####################################
function queryListVendors($flag){
#       $query = "select upper(v_name) as upper, vs_id, v_id from vendor_vendor order by v_name asc;";
	if ($flag == 1){
        	$query = "select v_name, vs_id, v_id from vendor_vendor where vc_id = 1 order by v_name asc;";
	}else if ($flag == 2){
        	$query = "select v_name, vs_id, v_id from vendor_vendor where vc_id != 1 order by v_name asc;";
	}else if ($flag == 3){
        	$query = "select v_name, vs_id, v_id from vendor_vendor where vs_id = 1 order by v_name asc;";
	}else if ($flag == 4){
        	$query = "select v_name, vs_id, v_id from vendor_vendor where vs_id = 2 order by v_name asc;";
	}else{
        	$query = "select v_name, vs_id, v_id from vendor_vendor order by v_name asc;";
	}

	return $query;
}

function queryViewAllVendors(){
#      	$query = "select * from vendor_vendor vv, country_country cc, vendor_account va where vv.vc_id = cc.vc_id and vv.v_id = va.v_id and vv.vs_id = 1 order by v_name;";
#	$query = "select * from vendor_vendor vv, country_country cc where vv.vc_id = cc.vc_id and vv.vs_id = 1 order by v_name;";
	$query = "select * from vendor_vendor where vs_id = 1 order by v_name;";

	return $query;
}

// #####################################
// ### ADD VENDOR ###
// ###
function queryAddVendor($v_name, $v_dba, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$query = "insert into vendor_vendor (v_name, v_dba, v_street0, v_street1, v_street2, v_city, v_state, v_province, v_postal, vc_id) values (\"" . $v_name . "\", \"" . $v_dba . "\", \"" . $v_street0 . "\",\"" . $v_street1 . "\",\"" . $v_street2 . "\",\"" . $v_city . "\",\"" . $v_state . "\",\"" . $v_province . "\",\"" . $v_postal . "\"," . $vc_id . ");";

	return $query;
}

// #####################################
// ### ADD VENDOR ADDRESS ###
// ###
function queryAddVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$query = "update vendor_vendor set v_street0 = \"" . $v_street0 . "\", v_street1 = \"" . $v_street1 . "\", v_street2 = \"" . $v_street2 . "\", v_city = \"" . $v_city . "\", v_state = \"" . $v_state . "\", v_province = \"" . $v_province . "\", v_postal = \"" . $v_postal . "\", vc_id = " . $vc_id . " where v_id = " . $v_id . ";";

	return $query;
}

// #####################################
// ### ADD VENDOR ACCOUNT ###
// ###
function queryAddVendorAccount($v_id, $v_account){
	$query = "insert into vendor_account (v_id, v_account) values (". $v_id . ",\"" . $v_account . "\");";

	return $query;
}

// #####################################
// ### ADD VENDOR PHONE ###
// ###
function queryAddVendorPhone($v_id, $vc_id, $v_phone_num, $v_phone_ext, $p_id){ 
	$query = "insert into vendor_phone (v_id, vc_id, v_phone_num, v_phone_ext, p_id) values (" . $v_id . ",\"" . $vc_id . "\",\"" . $v_phone_num . "\",\"" . $v_phone_ext . "\", " . $p_id . ");";

	return $query;
}

// #####################################
// ### ADD VENDOR EMAIL ###
// ###
function queryAddVendorEmail($v_id, $v_email, $e_id){ 
	$query = "insert into vendor_email (v_id, v_email, e_id) values (" . $v_id . ",\"" . $v_email . "\"," . $e_id . ");";

	return $query;
}

// #####################################
// ### ADD VENDOR URL ###
// ###
function queryAddVendorURL($v_id, $v_url){
	$query = "insert into vendor_url (v_id, v_url) values (" . $v_id . ",\"" . $v_url . "\");";

	return $query;
}

// #####################################
// ### CHANGE VENDOR STATUS ###
// ###
function queryChangeVendorStatus($v_id, $vs_id){
	$query = "update vendor_vendor set vs_id = " . $vs_id . " where v_id = " . $v_id . ";";

	return $query;
}

function queryAddVendorProduct($v_id, $pr_id, $pr_type, $pr_cost, $pr_minimum){
	$query = "insert into vendor_product (v_id, pr_id, pr_cost, pr_minimum) values (" . $v_id . "," . $pr_id . "," . $pr_cost . "," . $pr_minimum . ");";

	return $query;
}

function queryInsertVendorProducts($vendorproducts_no, $vendorproducts_name, $v_id, $products_width_no, $products_content_no, $products_country_no){
	$query = "insert into vendor_products (vendorproducts_no, vendorproducts_name, v_id, products_width_no, products_content_no, products_country_no) values (\"" . $vendorproducts_no . "\",\"" . $vendorproducts_name . "\", " . $v_id . "," . $products_width_no . "," . $products_content_no . "," . $products_country_no . ");";

	return $query;
}

function queryInsertVendorProductsColors($vendorproducts_no, $color_no, $color_name){
	$query = "insert into products_color (vendorproducts_no, color_no, color_name) values (\"" . $vendorproducts_no . "\",\"" . $color_no . "\",\"" . $color_name . "\");";

	return $query;
}

function queryInsertProductsWidth($products_width_name){
	$query = "insert into products_width (products_width_name) values (\"" . $products_width_name . "\");";

	return $query;
}

function queryInsertProductsContent($products_content_name){
	$query = "insert into products_content (products_content_name) values (\"" . $products_content_name . "\");";

	return $query;
}

function queryInsertProductsCountry($products_coountry_name){
	$query = "insert into products_country (products_country_name) values (\"" . $products_country_name . "\");";

	return $query;
}

function queryAddProductProduct($pr_type){
	$query = "insert into product_product (pr_type) values (\"" . $pr_type . "\");";

	return $query;
}

function queryViewProductProduct(){
	$query = "select * from product_product order by pr_type asc;";

	return $query;
}

function queryViewVendorProducts($v_id){
	$query = "select * from vendor_products vp, products_width pw, products_content pc where vp.products_width_no = pw.products_width_no and vp.products_content_no = pc.products_content_no and vp.v_id = " . $v_id . ";";

	return $query;
}

function querySelectVendorProducts($vendorproducts_no){
	$query = "select * from vendor_products where vendorproducts_no = \"" . $vendorproducts_no . "\";";

	return $query;
}

function queryViewVendorProductsColors($vendorproducts_no){
	$query = "select * from vendor_products vp, products_color pc where vp.vendorproducts_no = pc.vendorproducts_no and vp.vendorproducts_no = \"" . $vendorproducts_no . "\";";

	return $query;
}

// #####################################
// ### ADD VENDOR COMMENTS ###
// ###
function queryAddVendorComments($v_id, $v_comments){
	$query = "insert into vendor_comments (v_id, v_comments, date) values (" . $v_id . ",\"" . $v_comments . "\", NOW());";

	return $query;
}

function queryAddContactContact($c_first, $c_last, $ct_id){
	$query = "insert into contact_contact (c_first, c_last, ct_id) values (\"" . $c_first . "\", \"" . $c_last . "\"," . $ct_id . ");";

	return $query;
}

// #####################################
// ### ADD VENDOR CONTACT ###
// ###
function queryAddVendorContact($v_id, $c_id){ 
	$query = "insert into vendor_contact (v_id, c_id) values (" . $v_id . "," . $c_id . ");";
		
	return $query;
}

// #####################################
// ### ADD CONTACT PHONE ###
// ###
function queryAddContactPhone($c_id, $vc_id, $c_phone_num, $c_phone_ext, $p_id){ 
        $query = "insert into contact_phone (c_id, vc_id, c_phone_num, c_phone_ext, p_id) values (" . $c_id . "," . $vc_id . ",\"" . $c_phone_num . "\",\"" . $c_phone_ext . "\", " . $p_id . ");";

	return $query;
}

// #####################################
// ### ADD CONTACT EMAIL ###
// ###
function queryAddContactEmail($c_id, $c_email, $e_id){ 
        $query = "insert into contact_email (c_id, c_email, e_id) values (" . $c_id . ",\"" . $c_email . "\"," . $e_id . ");";

	return $query;
}

function querySelectCountryCountry(){
	$query = "select * from country_country;";

	return $query;
}

function querySelectProductProduct(){
	$query = "select * from product_product order by pr_type;";

	return $query;
}

function querySelectProductsWidth(){
	$query = "select * from products_width order by products_width_name;";

	return $query;
}

function querySelectProductsContent(){
	$query = "select * from products_content order by products_content_name;";

	return $query;
}

function querySelectProductsCountry(){
	$query = "select * from products_country order by products_country_name;";

	return $query;
}

function querySelectProductsColor(){
	$query = "select * from products_color order by products_country_name;";

	return $query;
}

function querySelectVendorProductsNo($vendorproducts_no){
	$query = "select * from vendor_products where vendorproducts_no = \"" . $vendorproducts_no . "\";";

	return $query;
}

function querySelectVendorCountry($v_id){
	$query = "select vc_id from vendor_vendor where v_id = " . $v_id . ";";

	return $query;
}

function querySelectPhoneType(){
	$query = "select * from phone_type;";

	return $query;
}

function querySelectEmailType(){
	$query = "select * from email_type;";

	return $query;
}

function querySelectVendorStatus(){
	$query = "select * from vendor_status;";

	return $query;
}

function queryGetVendorStatusID($v_id){
	$query = "select vs_id from vendor_vendor where v_id = " . $v_id . ";";

	return $query;
}

function queryGetVendorPhone($v_id){
	$query = "select * from vendor_phone vp, phone_type pt where v_id = " . $v_id . " and vp.p_id = pt.p_id;";

	return $query;
}

function queryGetVendorEmail($v_id){
	$query = "select * from vendor_email where v_id = " . $v_id . ";";

	return $query;
}

function queryGetVendorURL($v_id){
	$query = "select * from vendor_url where v_id = " . $v_id . ";";

	return $query;
}

function queryGetVendorStatus($v_id){
	$query = "select * from vendor_vendor vv, vendor_status vs where vv.vs_id = vs.vs_id and v_id = " . $v_id . ";";

	return $query;
}

function queryGetVendorComments($v_id){
	$query = "select * from vendor_comments where v_id = " . $v_id . ";";

	return $query;
}

function queryGetAllVendorComments(){
	$query = "select * from vendor_comments;";

	return $query;
}

function queryGetVendorProducts($v_id){
	$query = "select * from vendor_product vp, product_product pp where vp.v_id = " . $v_id . " and pp.pr_id = vp.pr_id and vp.vp_status = 0;";
	
	return $query;
}

function queryGetVendorProductsName($vendorproducts_no){
	$query = "select vendorproducts_name from vendor_products where vendorproducts_no = \"" . $vendorproducts_no . "\";";

	return $query;
}

function querySelectContactType(){
	$query = "select * from contact_type order by ct_type asc;";

	return $query;
}

function queryGetVendorAccountNumber($v_id){
	$query = "select v_account from vendor_account where v_id = " . $v_id . ";";

	return $query;
}

function queryGetVendorDetails($v_id){
	$query = "select * from vendor_vendor vv, country_country cc where v_id = " . $v_id . " and vv.vc_id = cc.vc_id;";

	return $query;
}

function queryViewContactName($c_id){
	$query = "select * from contact_contact cc, contact_type ct where c_id = " . $c_id . " and cc.ct_id = ct.ct_id;";

	return $query;
}

function queryViewContactPhone($c_id){
	$query = "select * from contact_phone cp, phone_type pt where c_id = " . $c_id . " and cp.p_id = pt.p_id;";

	return $query;
}

function queryViewContactEmail($c_id){
	$query = "select * from contact_email where c_id = " . $c_id . ";";

	return $query;
}

function queryShowVendorContacts($v_id){
	$query = "select * from vendor_contact where v_id = " . $v_id . " and vc_status = 0;";

	return $query;
}

function queryListContacts($v_id){
	$query = "select * from contact_contact cc, vendor_contact vc, contact_type ct where vc.v_id = " . $v_id . " and vc.c_id = cc.c_id and cc.ct_id = ct.ct_id and vc.vc_status = 0;";

	return $query;
}

function queryEditVendorNameForm($v_id){
	$query = "select v_name, v_dba from vendor_vendor where v_id = " . $v_id . ";";

	return $query;
}

function queryEditVendorAddressForm($v_id){
	$query = "select v_street0, v_street1, v_street2, v_city, v_state, v_province, v_postal, vc_name, vv.vc_id from vendor_vendor vv, country_country cc where vv.vc_id = cc.vc_id and v_id = " . $v_id . ";";

	return $query;
}

function queryEditVendorPhoneForm($vp_id){
	$query = "select * from vendor_phone where vp_id = " . $vp_id . ";";

	return $query;
}

function queryEditVendorEmailForm($ve_id){
	$query = "select v_email, e_id from vendor_email where ve_id = " . $ve_id . ";";

	return $query;
}

function queryEditVendorURLForm($vu_id){
	$query = "select v_url from vendor_url where vu_id = " . $vu_id . ";";

	return $query;
}

function queryEditVendorCommentsForm($vco_id){
	$query = "select v_comments, date from vendor_comments where vendorcomment_id = " . $vco_id . ";";

	return $query;
}

function queryEditProductProductForm($pr_id){
	$query = "select * from product_product where pr_id = " . $pr_id . ";";

	return $query;
}

function queryEditVendorProductForm($vpro_id){
	$query = "select * from vendor_product vp, product_product pp where vp.pr_id = pp.pr_id and vpr_id = " . $vpro_id . ";";

	return $query;
}

function queryEditVendorContactForm($c_id){
	$query = "select c_first, c_last, ct_id from contact_contact where c_id = " . $c_id . ";";

	return $query;
}

function queryEditVendorContactPhoneForm($cp_id){
	$query = "select vc_id, c_phone_num, c_phone_ext, p_id, inactive from contact_phone where cp_id = " . $cp_id . ";";

	return $query;
}

function queryEditVendorContactEmailForm($ce_id){
	$query = "select c_email, e_id from contact_email where ce_id = " . $ce_id . ";";

	return $query;
}

function queryEditVendorAccount($v_id, $v_account){
	$query = "update vendor_account set v_account=" . $v_account . " where v_id = " . $v_id . ";";

	return $query;
}

function queryEditVendorName($v_id, $v_name, $v_dba){
	$query = "update vendor_vendor set v_name = \"" . $v_name . "\", v_dba = \"" . $v_dba . "\" where v_id = " . $v_id . ";";
	
	return $query;
}

function queryEditVendorAddress($v_id, $v_street0, $v_street1, $v_street2, $v_city, $v_state, $v_province, $v_postal, $vc_id){
	$query = "update vendor_vendor set v_street0 = \"" . $v_street0 . "\", v_street1 = \"" . $v_street1 . "\", v_street2 = \"" . $v_street2 . "\", v_city = \"" . $v_city . "\", v_state = \"" . $v_state . "\", v_province = \"" . $v_province . "\", v_postal = \"" . $v_postal . "\", vc_id = \"" . $vc_id . "\" where v_id = " . $v_id . ";";

	return $query;
}

function queryEditVendorPhone($vp_id, $v_phone_num, $v_phone_ext, $p_id, $vc_id){
	$query = "update vendor_phone set v_phone_num = \"" . $v_phone_num . "\", v_phone_ext = \"" . $v_phone_ext . "\", p_id = " . $p_id . ", vc_id = " . $vc_id . " where vp_id = " . $vp_id . ";";

	return $query;
}

function queryEditVendorEmail($ve_id, $v_email, $e_id){
	$query = "update vendor_email set v_email = \"" . $v_email . "\", e_id = " . $e_id . " where ve_id = " . $ve_id . ";";

	return $query;
}

function queryEditVendorURL($vu_id, $v_url){
	$query = "update vendor_url set v_url = \"" . $v_url . "\" where vu_id = " . $vu_id . ";";

	return $query;
}

function queryEditVendorComments($vendorcomment_id, $v_comments){
	$query = "update vendor_comments set v_comments = \"" . $v_comments . "\" where vendorcomment_id = " . $vendorcomment_id . ";";

	return $query;
}

function queryEditProductProduct($pr_id, $pr_type){
	$query = "update product_product set pr_type =\"" . $pr_type . "\" where pr_id = " . $pr_id . ";";

	return $query;
}

function queryEditVendorContact($c_id, $c_first, $c_last, $ct_id){
	$query = "update contact_contact set c_first = \"" . $c_first . "\", c_last = \"" . $c_last . "\", ct_id = \"" . $ct_id . "\" where c_id = " . $c_id . ";";

	return $query;
}

function queryEditVendorContactPhone($cp_id, $c_id, $c_phone_num, $c_phone_ext, $p_id, $vc_id){
	$query = "update contact_phone set c_phone_num = \"" . $c_phone_num . "\", c_phone_ext = \"" . $c_phone_ext . "\", p_id = " . $p_id . ", vc_id = " . $vc_id . " where cp_id = " . $cp_id . ";";

	return $query;
}

function queryEditVendorContactEmail($ce_id, $c_id, $c_email, $e_id){
	$query = "update contact_email set c_email = \"" . $c_email . "\", e_id = " . $e_id . " where ce_id = " . $ce_id . ";";

	return $query;
}

?>
